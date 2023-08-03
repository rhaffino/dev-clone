<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Models\Page;
use App\Models\BlogCategory;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        if ($lang==='en'){
            App::setLocale('en');
        }else{
            App::setLocale('id');
        }
        $dataID = $this->getBlogWordpressId();
        $dataEN = $this->getBlogWordpressEn();
        $data = json_decode(file_get_contents(base_path('resources/js/json/tools.json')),true);
        $local = App::getLocale();

        // Fetch Seo Term
        $seo_terms = Page::select('pages.id', 'pages.published_at', 'pages.title', 'pages.slug', 'pages.image', 'pages.created_by', DB::raw($lang == 'id' ? "'KAMUSSEO'" : "'SEOTERMS'" . " as 'type'"), DB::raw("'seo-terms' as 'link'"))
        ->join('page_categories', function ($join) use($lang) {
            $join->on('pages.page_category_id', '=', 'page_categories.id')
            ->where('page_categories.language', $lang)
            ->where('page_categories.slug', '=', 'seo-terms');
        })
        ->where('pages.language', $lang)
        ->where('pages.slug', '!=', 'about')
        ->where('pages.status', '1')
        ->orderBy('pages.created_at','DESC')
        ->first();

        $seo_terms->published_at = Carbon::parse($seo_terms->published_at)->format('d F Y');

        // Fetch Seo Guidelines
        $seo_guidelines = Page::select('pages.id', 'pages.published_at', 'pages.title', 'pages.slug', 'pages.image', 'pages.created_by', DB::raw($lang == 'id' ? "'PANDUANSEO'" : "'SEOGUIDELINES'" . " as 'type'"), DB::raw("'seo-guide' as 'link'"))
        ->join('page_categories', function ($join) use($lang) {
            $join->on('pages.page_category_id', '=', 'page_categories.id')
            ->where('page_categories.language', $lang)
            ->where('page_categories.slug', '=', 'seo-guide');
        })
        ->where('pages.language', $lang)
        ->where('pages.slug', '!=', 'about')
        ->orderBy('pages.created_at','DESC')
        ->where('pages.status', '1')->first();

        $seo_guidelines->published_at = Carbon::parse($seo_terms->published_at)->format('d F Y');

        // Fetch Blogs
        $blogCategories = BlogCategory::select('id', 'slug', 'name')
        ->where('language', $lang)
        ->where('slug', '!=', 'press-release')
        ->where('slug', '!=', 'promo-campaign')
        ->where('slug', '!=', 'event')
        ->isPublish()
        ->get();

        $blogs = Blog::select('id', 'published_at', 'title', 'slug', 'image', 'created_by', DB::raw($lang == 'id' ? "'BLOG'" : "'BLOGS'" . " as 'type'"), DB::raw("'blog' as 'link'"))
            ->where('language', $lang)
            ->where('status', '1')
            ->whereIn('blog_category_id', $blogCategories->pluck('id'))
            ->orderBy('published_at', 'desc')
            ->first();

        $blogs->published_at = Carbon::parse($seo_terms->published_at)->format('d F Y');

        return view('home', compact('data','local', 'dataID', 'dataEN', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getBlogWordpressId()
    {
        // TODO : Delete this
        return [];
        try{
          $client = new Client();
          $response = $client->get("https://cmlabs.co/wp-json/wp/v2/posts?per_page=4");
          $data = json_decode($response->getBody()->getContents(),true);
          $data_fix = [];
          foreach ($data as $datum){
              array_push($data_fix,[
                  "link" => $datum['link'],
                  "title" => str_replace('&#038;','&',$datum['title']['rendered']),
                  "date" => $this->parseDate($datum['date'])
              ]);
          }
          return $data_fix;
        }catch (RequestException $e){
            return json_decode(file_get_contents(base_path('resources/js/json/idBlog.json')),true);
        }

    }

    public function getBlogWordpressEn()
    {
        // TODO : Delete this
        return [];
        try {
          $client = new Client();
          $response = $client->get("https://cmlabs.co/en/wp-json/wp/v2/posts?per_page=4");
          $data = json_decode($response->getBody()->getContents(),true);
          $data_fix = [];
          foreach ($data as $datum){
              array_push($data_fix,[
                  "link" => $datum['link'],
                  "title" => str_replace('&#038;','&',$datum['title']['rendered']),
                  "date" => $this->parseDate($datum['date'])
              ]);
          }
          return $data_fix;
        }catch (RequestException $e){
            return json_decode(file_get_contents(base_path('resources/js/json/enBlog.json')),true);
        }
    }

    public function parseDate($date)
    {
        $date=date_create($date);
        if (App::getLocale() == 'en')
            return date_format($date,"M d, Y - H:i");
        else{
            $month = date_format($date,"m");
            $id = '';
            switch ($month){
                case 1:
                    $id = 'Jan';
                    break;
                case 2:
                    $id = 'Feb';
                    break;
                case 3:
                    $id = 'Mar';
                    break;
                case 4:
                    $id = 'Apr';
                    break;
                case 5:
                    $id = 'Mei';
                    break;
                case 6:
                    $id = 'Jun';
                    break;
                case 7:
                    $id = 'Jul';
                    break;
                case 8:
                    $id = 'Agu';
                    break;
                case 9:
                    $id = 'Sep';
                    break;
                case 10:
                    $id = 'Okt';
                    break;
                case 11:
                    $id = 'Nov';
                    break;
                case 12:
                    $id = 'Des';
                    break;
            }
            return $id." ".date_format($date,"d, Y - H:i");
        }
    }

    public function getBlogData() {
        $lang = App::getLocale();

        try {
            $client = new Client();
            $response = $client->get("http://cmlabs.co/en/wp-json/wp/v2/posts?per_page=3");

            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e){
            if ( $lang == 'id' ) {
                return json_decode(file_get_contents(base_path('resources/js/json/idBlog.json')), true);
            } else {
                return json_decode(file_get_contents(base_path('resources/js/json/enBlog.json')), true);
            }
        }
    }
}
