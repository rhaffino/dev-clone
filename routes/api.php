<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/analyze-technology', 'Tool\ApiController@analyzeTechnology')->name('api.analyze-technology');
Route::post('/analyze-hreflang', 'Tool\ApiController@analyzeHreflang')->name('api.analyze-hreflang');
Route::post('/analyze-link', 'Tool\ApiController@analyzeLink')->name('api.analyze-link');
Route::post('/analyze-redirect-chain', 'Tool\ApiController@analyzeRedirectChain')->name('api.analyze-redirect-chain');
Route::post('/analyze-ssl', 'Tool\ApiController@analyzeSsl')->name('api.analyze-ssl');
Route::post('/analyze-meta', 'Tool\ApiController@analyzeMeta')->name('api.analyze-meta');
Route::post('/ping-tool', 'Tool\ApiController@pingTool')->name('api.ping-tool');
Route::post('/plagiarism-check', 'Tool\ApiController@plagiarismCheck')->name('api.plagiarism-check');
Route::post('/header-checker', 'Tool\ApiController@headerChecker')->name('api.header-checker');
Route::post('/record-activity', 'Tool\ApiController@recordUserActivity')->name('api.record-activity');
