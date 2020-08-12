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

Route::redirect('/', '/en');
//Route::resource('/', 'HomeController');
Route::get('/construction', function (){
    return view('premiumtools');
});
Route::get('/url', 'ToolsController@loadssl');
Route::get('/{lang}','HomeController@index');

//Route::get('/test', function (){
//    return view('/tools/strikethrough');
//});

Route::get('/{lang}/strikethrough', 'ToolsController@strikethrough');
Route::get('/{lang}/json-ld-faq-schema-generator', 'ToolsController@FAQ');
Route::get('/{lang}/word-counter', 'ToolsController@wordcounter');
Route::get('/{lang}/page-title-meta-description-checker', 'ToolsController@metachecker');
Route::get('/{lang}/dummy-credit-card-generator', 'ToolsController@creditcard');
Route::get('/{lang}/symbol-and-text-generator', 'ToolsController@symbolandtext');
Route::get('/{lang}/page-speed', 'ToolsController@pagespeed');
Route::get('/{lang}/sitemap-generator', 'ToolsController@sitemap');
Route::get('/{lang}/mobile-test', 'ToolsController@mobiletest');
Route::get('/{lang}/ssl-checker', 'ToolsController@sslchecker');
Route::get('/{lang}/robotstxt-generator', 'ToolsController@robotgenerator');
Route::get('/en/version', 'ToolsController@englishVersion');
Route::get('/id/version', 'ToolsController@indonesiaVersion');

