<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class ToolsController extends Controller
{
    public function strikethrough()
    {
        return view('Tools/strikethrough');
    }

    public function FAQ($lang)
    {
        App::setLocale($lang);
        $local = App::getLocale();
        return view('Tools/faq', compact('local'));
    }

    public function wordcounter($lang)
    {
        App::setLocale($lang);
        $local = App::getLocale();
        return view('Tools/wordcounter', compact('local'));
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
        $local = App::getLocale();
        return view('Tools/metachecker', compact('local'));
    }

    public function pagespeed($lang)
    {
        App::setLocale($lang);
        $local = App::getLocale();
        return view('Tools/pagespeed', compact('local'));
    }

    public function englishVersion()
    {
        $previous = url()->previous();
        $link = substr($previous, strrpos($previous,'/')+1);
        return \redirect('/en/'.$link);
    }

    public function indonesiaVersion()
    {
        $previous = url()->previous();
        $link = substr($previous, strrpos($previous,'/')+1);
        return \redirect('/id/'.$link);
    }
}
