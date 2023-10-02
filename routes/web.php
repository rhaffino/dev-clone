<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Middleware\EnsureUrlIsValid;
use App\Http\Middleware\ManualAuth;
use Illuminate\Support\Facades\Route;

Route::get('/login', 'Auth\LoginController@loginView');
Route::post('/validate','Auth\LoginController@validateLogin');
Route::get('/logout','Auth\LoginController@logout');

Route::middleware([ManualAuth::class])->group(function (){
    Route::redirect('/', '/en');
    
    Route::get('/analytics', function (){
        return view('premiumtools');
    });
    
    Route::get('/construction', function (){
        return redirect('/analytics');
    });
    
    Route::get('/url', 'ToolsController@loadssl');
    
    // Route::get('blog/data', 'HomeController@getBlogData');

    Route::middleware([EnsureUrlIsValid::class])->group(function (){
        Route::get('/{lang}','HomeController@index');
        // login
        Route::group(['as' => 'auth.'], function () {
            Route::get('/{lang}/login/google','AuthController@googleLogin')->name('login.google');
            Route::get('/{lang}/login/google/callback','AuthController@googleCallback')->name('login.google.callback');
            Route::get('/{lang}/logout','AuthController@logout');
        });
        Route::get('/{lang}/strikethrough', 'ToolsController@strikethrough');
        Route::get('/{lang}/json-ld-schema-generator', 'ToolsController@jsonld');
        Route::get('/{lang}/json-ld-faq-schema-generator', 'ToolsController@FAQ');
        Route::get('/{lang}/json-ld-breadcrumb-schema-generator', 'ToolsController@breadcrumb');
        Route::get('/{lang}/json-ld-how-to-schema-generator', 'ToolsController@howto');
        Route::get('/{lang}/json-ld-job-posting-schema-generator', 'ToolsController@jobposting');
        Route::get('/{lang}/json-ld-person-schema-generator', 'ToolsController@person');
        Route::get('/{lang}/json-ld-product-schema-generator', 'ToolsController@product');
        Route::get('/{lang}/json-ld-recipe-schema-generator', 'ToolsController@recipe');
        Route::get('/{lang}/word-counter', 'ToolsController@wordcounter');
        Route::get('/{lang}/page-title-meta-description-checker', 'ToolsController@metachecker');
        Route::get('/{lang}/dummy-credit-card-generator', 'ToolsController@creditcard');
        Route::get('/{lang}/symbol-and-text-generator', 'ToolsController@symbolandtext');
        Route::get('/{lang}/pagespeed-test', 'ToolsController@pagespeed');
        Route::get('/{lang}/sitemap-generator', 'ToolsController@sitemap');
        Route::get('/{lang}/mobile-friendly-test', 'ToolsController@mobiletest');
        Route::get('/{lang}/ssl-checker', 'ToolsController@sslchecker');
        Route::get('/{lang}/robotstxt-generator', 'ToolsController@robotgenerator');
        Route::get('/{lang}/technology-lookup', 'ToolsController@technologylookup');
        Route::get('/{lang}/redirect-checker', 'ToolsController@redirectchecker');
        Route::get('/{lang}/hreflang-checker', 'ToolsController@hreflangchecker');
        Route::get('/{lang}/link-analyzer', 'ToolsController@linkanalyzer');
        Route::get('/{lang}/keyword-research', 'ToolsController@keywordresearch');
        Route::get('/{lang}/keyword-permutation', 'ToolsController@keywordpermutation');
        Route::get('/{lang}/ping-tool', 'ToolsController@pingTool');
        Route::get('/{lang}/plagiarism-checker', 'ToolsController@plagiarismChecker');
        Route::get('/{lang}/download-plagiarism-check-logs/{type}', 'ToolsController@downloadPlagiarismCheckLogs');
        Route::get('/{lang}/http-header-checker', 'ToolsController@headerChecker');
        Route::get('/{lang}/json-ld-website-schema-generator', 'ToolsController@website');
        Route::get('/{lang}/json-ld-local-business-schema-generator', 'ToolsController@localBusiness');
        Route::get('/{lang}/json-ld-video-schema-generator', 'ToolsController@video');
        Route::get('/{lang}/json-ld-event-schema-generator', 'ToolsController@event');
        Route::get('/{lang}/json-ld-organization-schema-generator', 'ToolsController@organization');
        Route::get('/{lang}/robotstxt-checker', 'ToolsController@robotsChecker');
        Route::get('/{lang}/serp-simulator', 'ToolsController@serpSimulator');
    });
    Route::get('/en/version', 'ToolsController@englishVersion');
    Route::get('/id/version', 'ToolsController@indonesiaVersion');
});

Route::post('/api/cta', 'Tool\ApiController@ctaEmail')->name('api.cta-email');
Route::post('/api/count', 'Tool\ApiController@accessCount')->name('api.count');
Route::post('/api/limit', 'Tool\ApiController@accessLimit')->name('api.limit');
Route::get('/api/plagiarism-checker-logs', 'Tool\ApiController@plagiarismCheckLogs')->name('api.plagiarism-check-logs');
Route::get('/api/plagiarism-checker-calendar', 'Tool\ApiController@plagiarismCheckCalendarLogs')->name('api.plagiarism-check-calendar-logs');
