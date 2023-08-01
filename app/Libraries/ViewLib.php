<?php

namespace App\Libraries;

use App\Models\Blog;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use KubAT\PhpSimple\HtmlDomParser;

class ViewLib
{
    // convert shortcode in text
    public static function template($text = false)
    {
        $regex_blog = "#\{blog\:([\d]{1,})\}#s";
        $regex_blog_cmlabs = "#https\:\/\/cmlabs\.co\/([\w]{1,3})-([\w]{1,3})\/blog\/([\d\w\-]{1,})#s";
        $regex_preview = "#\{preview\:([\w\d\W\D]{1,})\}#s";
        $regex_code = "#\<\s*pre[^>]*><\s*code[^>]*>(.*?)<\s*\/*code><\s*\/*pre>#s";
        $regex_blockquote = "#\<\s*blockquote[^>]*>(.*?)<\s*\/*blockquote>#s";
        $regex_embed_youtube = '/<figure[^>]*><oembed[^>]*url="https:\/\/www\.youtube\.com\/watch\?v=([^"&]+)[^>]*><\/oembed><\/figure>/';

        if (preg_match_all($regex_code, $text, $matches)) {
            foreach ($matches[1] as $i => $match) {
                $code = View::make('widget.codebox', ['code' => $match]);
                $text = str_replace($matches[0][$i], $code, $text);
            }
        }

        if (preg_match_all($regex_blockquote, $text, $matches)) {
            foreach ($matches[1] as $i => $match) {
                $quote = View::make('widget.quotes', ['quote' => $match]);
                $text = str_replace($matches[0][$i], $quote, $text);
            }
        }

        if (preg_match_all($regex_blog, $text, $matches)) {
            foreach ($matches[1] as $i => $match) {
                $getBlog = Blog::select('id', 'title', 'slug', 'image', 'published_at', 'synopsis', 'description', 'created_by', 'language', 'region')
                    ->with(['author'])
                    ->isPublished()
                    ->where('id', $match)
                    ->first();
                $blog = $getBlog ? View::make('widget.blog', ['blog' => $getBlog]) : "";
                $text = str_replace($matches[0][$i], $blog, $text);
            }
        }

        if (preg_match_all($regex_preview, $text, $matches)) {
            foreach ($matches[1] as $i => $match) {
                // if (preg_match_all($regex_blog_cmlabs, $match, $matches_url)) {
                //     $getBlog = Blog::select('id', 'title', 'slug', 'image', 'published_at', 'synopsis', 'description', 'created_by', 'language', 'region')
                //         ->with(['author'])
                //         ->isPublished()
                //         ->where('language', $matches_url[1])
                //         ->where('region', $matches_url[2])
                //         ->where('slug', $matches_url[3])
                //         ->first();
                //     if ($getBlog) {
                //         $blog = $getBlog ? View::make('widget.blog', ['blog' => $getBlog]) : "";
                //         $text = str_replace($matches[0][$i], $blog, $text);
                //     }
                // } else {
                //     $getPreview = self::previewLink($match);
                //     $preview = $getBlog ? View::make('widget.preview', ['website' => $getPreview]) : "";
                //     $text = str_replace($matches[0][$i], $preview, $text);
                // }
                $getPreview = self::previewLink($match);
                $preview = $getBlog ? View::make('widget.preview', ['website' => $getPreview]) : "";
                $text = str_replace($matches[0][$i], $preview, $text);
            }
        }

        if (preg_match_all($regex_embed_youtube, $text, $matches)) {
            foreach ($matches[1] as $i => $match) {
                $replacement = '<iframe class="w-100" style="height: 320px" src="https://www.youtube.com/embed/$1" allowfullscreen></iframe>';
                $text = preg_replace($regex_embed_youtube, $replacement, $text);
            }
        }

        return $text;
    }

    // convert read time
    public static function readTimeMinute($read_time = 0)
    {
        if (!$read_time || $read_time <= 0)
            return 0;

        try {
            $minute = ceil($read_time / 60);
            return $minute;
        } catch (\Exception $e) {
            return 0;
        }
    }

    // preview link 
    public static function previewLink($url)
    {
        try {
            $seconds = 3600;
            $key = md5("preview-$url");
            return Cache::remember($key, $seconds, function () use ($url) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec($ch);
                curl_close($ch);

                $dom = HtmlDomParser::str_get_html($response);
                if (!$dom)
                    throw new \Exception("");

                $data['title'] = $dom->find('title', 0)->plaintext;

                $meta_og_title = $dom->find("meta[property='og:title']");
                $data['og:title'] = $meta_og_title ? $meta_og_title[0]->content : null;

                $meta_description = $dom->find("meta[name='description']");
                $data['description'] = $meta_description ? $meta_description[0]->content : null;

                $meta_og_description = $dom->find("meta[property='og:description']");
                $data['og:description'] = $meta_og_description ? $meta_og_description[0]->content : null;

                $meta_image = $dom->find("img");
                $data['image'] = $meta_image ? $meta_image[0]->src : null;

                $meta_og_image = $dom->find("meta[property='og:image']");
                $data['og:image'] = $meta_og_image ? $meta_og_image[0]->content : null;

                $parse_url = parse_url($url);
                $domain = isset($parse_url['host']) ? $parse_url['host'] : '';

                return [
                    'url' => $url,
                    'domain' => $domain,
                    'title' => $data['og:title'] ?: $data['title'],
                    'description' => $data['og:description'] ?: $data['description'],
                    'image' => $data['og:image'] ?: $data['image'],
                ];
            });
        } catch (\Exception $e) {
            return '';
        }
    }
}
