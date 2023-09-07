<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Page;
use App\Models\PlagiarismCheckLog;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\HomeController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ToolsController extends Controller
{

    protected $HomeController;
    public function __construct(HomeController $HomeController)
    {
        $this->HomeController = $HomeController;
    }

    public function strikethrough()
    {
        return view('Tools/strikethrough');
    }

    public function sslchecker($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('ssl-checker', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/sslchecker', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function jsonld($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        return view('jsonldhome', compact('local', 'dataID', 'dataEN', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function FAQ($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('faq', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/faq', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function breadcrumb($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('breadcrumb', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/breadcrumb', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function howto($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();

        // currencies
        $path_currencies = public_path('json/currencies.json');
        $currencies = json_decode(file_get_contents($path_currencies), true);

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

        $is_maintenance = in_array('how-to', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/howto', compact('local', 'dataID', 'dataEN', 'currencies', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function jobposting($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();

        // country
        $path = public_path('json/regions.json');
        $region = json_decode(file_get_contents($path), true);

        // province
        $path_province = public_path('json/province-id.json');
        $province = json_decode(file_get_contents($path_province), true);

        // currencies
        $path_currencies = public_path('json/currencies.json');
        $currencies = json_decode(file_get_contents($path_currencies), true);

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

        $is_maintenance = in_array('job-posting', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/jobPosting', compact('local', 'dataID', 'dataEN','region','province','currencies', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function person($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('person', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

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

        return view('Tools/person', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function product($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();

        // currencies
        $path_currencies = public_path('json/currencies.json');
        $currencies = json_decode(file_get_contents($path_currencies), true);

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

        $is_maintenance = in_array('product', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/product', compact('local', 'dataID', 'dataEN', 'currencies', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function recipe($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('recipe', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/recipe', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function wordcounter($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('word-counter', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/wordcounter', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function creditcard($local)
    {
        App::setLocale($local);
        $lang = App::getLocale();
        return view('Tools/creditcard');
    }

    public function symbolandtext($local)
    {
        App::setLocale($local);
        $lang = App::getLocale();
        return view('Tools/symbolandtext');
    }

    public function metachecker($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('meta-checker', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/metachecker', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function pagespeed($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('page-speed', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/pagespeed', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function mobiletest($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('mobile-test', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/mobiletest', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function sitemap($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('sitemap-generator', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/sitemap', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function robotgenerator($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('robot-generator', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/robotgenerator', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function technologylookup($lang)
    {
        App::setLocale($lang);
        $dataID = [];
        $dataEN = [];
//        $dataID = $this->HomeController->getBlogWordpressId();
//        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('technology-lookup', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/technologylookup', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function redirectchecker($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('redirect-checker', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/redirectchecker', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function hreflangchecker($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('hreflang-checker', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/hreflangchecker', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function linkanalyzer($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('link-analyzer', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/linkanalyzer', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function keywordresearch($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('keyword-research', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/keywordresearch', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function keywordpermutation($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('keyword-permutation', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/keywordpermutation', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function headerChecker($lang)
    {
        App::setLocale($lang);
        $dataID = [];
        $dataEN = [];
//        $dataID = $this->HomeController->getBlogWordpressId();
//        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('header-checker', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/header-checker', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function plagiarismChecker($lang)
    {
        if (Auth::check()  && (Auth::check() ? Auth::user()->user_role_id == 3 : false)) {
            $data = [];
            App::setLocale($lang);
            $data['dataID'] = $this->HomeController->getBlogWordpressId();
            $data['dataEN'] = $this->HomeController->getBlogWordpressEn();
            $data['local'] = App::getLocale();
            $data['is_maintenance'] = in_array('plagiarism-checker', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';
            
            // Get user data
            $data['userId'] = Crypt::encrypt(Auth::user()->id . '-' . time());

            // Get user plagiarism check logs
            $data['userLogs'] = PlagiarismCheckLog::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'desc')
                ->get();
            $data['userSummaryLogs'] = PlagiarismCheckLog::selectRaw("COUNT(id) as 'user_requests', SUM(word_count) as 'total_words', SUM(cost) as 'total_cost'")
                ->where('user_id', Auth::user()->id)
                ->first();
            $data['cummulativeLogs'] = PlagiarismCheckLog::orderBy('created_at', 'desc')
                ->get();
            $data['cummulativeSummaryLogs'] = PlagiarismCheckLog::selectRaw("COUNT(id) as 'team_requests', COUNT(DISTINCT(user_id)) as 'total_users', SUM(word_count) as 'total_words', SUM(cost) as 'total_cost'")
                ->first();

            // Fetch Seo Term
            $seoTerms = Page::select('pages.id', 'pages.published_at', 'pages.title', 'pages.slug', 'pages.image', 'pages.created_by', DB::raw($lang == 'id' ? "'KAMUSSEO'" : "'SEOTERMS'" . " as 'type'"), DB::raw("'seo-terms' as 'link'"))
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

            $seoTerms->published_at = Carbon::parse($seoTerms->published_at)->format('d F Y');

            // Fetch Seo Guidelines
            $seoGuidelines = Page::select('pages.id', 'pages.published_at', 'pages.title', 'pages.slug', 'pages.image', 'pages.created_by', DB::raw($lang == 'id' ? "'PANDUANSEO'" : "'SEOGUIDELINES'" . " as 'type'"), DB::raw("'seo-guide' as 'link'"))
            ->join('page_categories', function ($join) use($lang) {
                $join->on('pages.page_category_id', '=', 'page_categories.id')
                ->where('page_categories.language', $lang)
                ->where('page_categories.slug', '=', 'seo-guide');
            })
            ->where('pages.language', $lang)
            ->where('pages.slug', '!=', 'about')
            ->orderBy('pages.created_at','DESC')
            ->where('pages.status', '1')->first();

            $seoGuidelines->published_at = Carbon::parse($seoTerms->published_at)->format('d F Y');

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

            $blogs->published_at = Carbon::parse($seoTerms->published_at)->format('d F Y');

            $data["seo_terms"] = $seoTerms;
            $data["seo_guidelines"] = $seoGuidelines;
            $data["blogs"] = $blogs;
            $data["lang"] = $lang;
            
            return view('Tools/plagiarism-checker/index', $data);
        } else {
            return redirect('/');
        }
    }

    public function downloadPlagiarismCheckLogs($lang, $type)
    {
        if (Auth::check()  && (Auth::check() ? Auth::user()->user_role_id == 3 : false)) {
            if ($type == 'all') {
                $logs = PlagiarismCheckLog::with('user')->get();
                // Preparing csv file
                $fileName = "plagiarism_check_logs-" . time() . ".xlsx";
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('A1', 'Content');
                $sheet->getColumnDimension('A')->setWidth(40);
                $sheet->setCellValue('B1', 'Word Count');
                $sheet->getColumnDimension('B')->setWidth(12);
                $sheet->setCellValue('C1', 'Cost');
                $sheet->setCellValue('D1', 'User Email');
                $sheet->getColumnDimension('D')->setWidth(30);
                $sheet->setCellValue('E1', 'Result URL');
                $sheet->getColumnDimension('E')->setWidth(45);
                $sheet->setCellValue('F1', 'Created at');
                // Insert data to csv
                $index = 2;
                foreach ($logs as $log) {
                    $sheet->setCellValue("A$index", $log->content);
                    $sheet->setCellValue("B$index", "$log->word_count words");
                    $sheet->setCellValue("C$index", "\$$log->cost");
                    $sheet->setCellValue("D$index", $log->user ? $log->user->email : '-');
                    $sheet->setCellValue("E$index", $log->url);
                    $sheet->setCellValue("F$index", date_format(date_add($log->created_at, date_interval_create_from_date_string('7 hours')), "l, d F Y H:i"));
                    $index++;
                }
            } else if($type == 'user') {
                $logs = PlagiarismCheckLog::where('user_id', Auth::user()->id)->get();
                $user = User::find(Auth::user()->id);
                // Preparing csv file
                $fileName = "plagiarism_check_logs-" . $user->name . "-" . time() . ".xlsx";
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('A1', 'Content');
                $sheet->getColumnDimension('A')->setWidth(40);
                $sheet->setCellValue('B1', 'Word Count');
                $sheet->getColumnDimension('B')->setWidth(12);
                $sheet->setCellValue('C1', 'Cost');
                $sheet->setCellValue('D1', 'Result URL');
                $sheet->getColumnDimension('D')->setWidth(45);
                $sheet->setCellValue('F1', 'Created at');
                // Insert data to csv
                $index = 2;
                foreach ($logs as $log) {
                    $sheet->setCellValue("A$index", $log->content);
                    $sheet->setCellValue("B$index", "$log->word_count words");
                    $sheet->setCellValue("C$index", "\$$log->cost");
                    $sheet->setCellValue("D$index", $log->url);
                    $sheet->setCellValue("F$index", date_format(date_add($log->created_at, date_interval_create_from_date_string('7 hours')), "l, d F Y H:i"));
                    $index++;
                }
            }

            $csv = new Xlsx($spreadsheet);
            $csv->save($fileName);
            return response()->download($fileName)->deleteFileAfterSend();
        } else {
            return redirect('/');
        }
    }
    
    public function pingTool($lang)
    {
        App::setLocale($lang);
        $dataID = [];
        $dataEN = [];
//        $dataID = $this->HomeController->getBlogWordpressId();
//        $dataEN = $this->HomeController->getBlogWordpressEn();
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
        
        $is_maintenance = in_array('ping-tool', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/ping', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function website($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        $is_maintenance = in_array('website', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/website', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }
    
    public function localBusiness($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        // Local Business
        $path = public_path('json/local-business.json');
        $listLocalBusiness = json_decode(file_get_contents($path), true);

        // country
        $path = public_path('json/regions.json');
        $country = json_decode(file_get_contents($path), true);

        // province
        $path_province = public_path('json/province-id.json');
        $province = json_decode(file_get_contents($path_province), true);


        $is_maintenance = in_array('local-business', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/localBusiness', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines', 'listLocalBusiness', 'country', 'province'));
    }

    public function video($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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


        $is_maintenance = in_array('video', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/video', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines'));
    }

    public function event($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

         // currencies
        $path_currencies = public_path('json/currencies.json');
        $currencies = json_decode(file_get_contents($path_currencies), true);

        // time zone
        $path_timezone = public_path('json/time-zone.json');
        $timezone = json_decode(file_get_contents($path_timezone), true);

        // country
        $path_country = public_path('json/regions.json');
        $country = json_decode(file_get_contents($path_country), true);
        
        // province
        $path_province = public_path('json/province-id.json');
        $province = json_decode(file_get_contents($path_province), true);

        $is_maintenance = in_array('event', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/event', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines', 'currencies', 'timezone', 'country', 'province'));
    }

    public function organization($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
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

        // Organization
        $path = public_path('json/organization.json');
        $listOrganization = json_decode(file_get_contents($path), true);

        // country
        $path = public_path('json/regions.json');
        $country = json_decode(file_get_contents($path), true);


        $is_maintenance = in_array('organization', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/organization', compact('local', 'dataID', 'dataEN', 'is_maintenance', 'lang', 'blogs', 'seo_terms', 'seo_guidelines', 'listOrganization', 'country'));
    }

    public function englishVersion()
    {
        $previous = url()->previous();
        $link = substr($previous, strrpos($previous,'/')+1);
        App::setLocale('en');
        session()->put('local','en');
        session()->save();
        if ($link === 'en' || $link === 'id') {
          return \redirect('/en');
        }else {
            return \redirect('/en/'.$link);
        }
    }

    public function indonesiaVersion()
    {
        $previous = url()->previous();
        $link = substr($previous, strrpos($previous,'/')+1);
        App::setLocale('id');
        session()->put('local','id');
        session()->save();
        if ($link === 'en' || $link === 'id') {
          return \redirect('/id');
        }else {
            return \redirect('/id/'.$link);
        }
    }

    public function loadssl()
    {
        $url = $_GET['host'];
        $client = new Client();
        $request = $client->get('https://api.cmlabs.co/ssl/?url='.$url);
        $response = $request->getBody()->getContents();
        echo $response;
    }
}
