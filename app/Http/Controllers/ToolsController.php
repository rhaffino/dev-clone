<?php

namespace App\Http\Controllers;

use App\Models\PlagiarismCheckLog;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\HomeController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Style\Border;

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

        $is_maintenance = in_array('ssl-checker', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/sslchecker', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
    }

    public function jsonld($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();
        return view('jsonldhome', compact('local', 'dataID', 'dataEN'));
    }

    public function FAQ($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('faq', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/faq', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
    }

    public function breadcrumb($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('breadcrumb', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/breadcrumb', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
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

        $is_maintenance = in_array('how-to', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/howto', compact('local', 'dataID', 'dataEN', 'currencies', 'is_maintenance'));
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

        $is_maintenance = in_array('job-posting', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/jobPosting', compact('local', 'dataID', 'dataEN','region','province','currencies', 'is_maintenance'));
    }

    public function person($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('person', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/person', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
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

        $is_maintenance = in_array('product', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/product', compact('local', 'dataID', 'dataEN', 'currencies', 'is_maintenance'));
    }

    public function recipe($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('recipe', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/recipe', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
    }

    public function wordcounter($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('word-counter', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/wordcounter', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
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

        $is_maintenance = in_array('meta-checker', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/metachecker', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
    }

    public function pagespeed($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('page-speed', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/pagespeed', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
    }

    public function mobiletest($lang)
    {
      App::setLocale($lang);
      $dataID = $this->HomeController->getBlogWordpressId();
      $dataEN = $this->HomeController->getBlogWordpressEn();
      $local = App::getLocale();

      $is_maintenance = in_array('mobile-test', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

      return view('Tools/mobiletest', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
    }

    public function sitemap($lang)
    {
      App::setLocale($lang);
      $dataID = $this->HomeController->getBlogWordpressId();
      $dataEN = $this->HomeController->getBlogWordpressEn();
      $local = App::getLocale();

      $is_maintenance = in_array('sitemap-generator', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

      return view('Tools/sitemap', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
    }

    public function robotgenerator($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('robot-generator', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/robotgenerator', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
    }

    public function technologylookup($lang)
    {
        App::setLocale($lang);
        $dataID = [];
        $dataEN = [];
//        $dataID = $this->HomeController->getBlogWordpressId();
//        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('technology-lookup', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/technologylookup', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
    }

    public function redirectchecker($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('redirect-checker', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/redirectchecker', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
    }

    public function hreflangchecker($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('hreflang-checker', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/hreflangchecker', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
    }

    public function linkanalyzer($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('link-analyzer', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/linkanalyzer', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
    }

    public function keywordresearch($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('keyword-research', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/keywordresearch', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
    }

    public function keywordpermutation($lang)
    {
        App::setLocale($lang);
        $dataID = $this->HomeController->getBlogWordpressId();
        $dataEN = $this->HomeController->getBlogWordpressEn();
        $local = App::getLocale();

        $is_maintenance = in_array('keyword-permutation', explode(',', env('TOOLS_MAINTENANCE'))) && env('APP_ENV') === 'production';

        return view('Tools/keywordpermutation', compact('local', 'dataID', 'dataEN', 'is_maintenance'));
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
                ->get();
            $data['userSummaryLogs'] = PlagiarismCheckLog::selectRaw("COUNT(id) as 'user_requests', SUM(word_count) as 'total_words', SUM(cost) as 'total_cost'")
                ->where('user_id', Auth::user()->id)
                ->first();
            $data['cummulativeLogs'] = PlagiarismCheckLog::get();
            $data['cummulativeSummaryLogs'] = PlagiarismCheckLog::selectRaw("COUNT(id) as 'team_requests', COUNT(DISTINCT(user_id)) as 'total_users', SUM(word_count) as 'total_words', SUM(cost) as 'total_cost'")
                ->first();

            return view('Tools/plagiarism-checker/index', $data);
        } else {
            return redirect('/');
        }
    }

    public function downloadPlagiarismCheckLogs($lang)
    {
        if (Auth::check()  && (Auth::check() ? Auth::user()->user_role_id == 3 : false)) {
            $logs = PlagiarismCheckLog::get();
            // Preparing csv file
            $fileName = "plagiarism-check-logs-" . time() . ".csv";
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Content');
            $sheet->setCellValue('B1', 'Word Count');
            $sheet->setCellValue('C1', 'Cost');
            $sheet->setCellValue('D1', 'Result URL');
            $sheet->setCellValue('E1', 'Created at');

            // Insert data to csv
            $index = 2;
            foreach ($logs as $log) {
                $sheet->setCellValue("A$index", $log->content);
                $sheet->setCellValue("B$index", "$log->word_count words");
                $sheet->setCellValue("C$index", "\$$log->cost");
                $sheet->setCellValue("D$index", $log->url);
                $sheet->setCellValue("E$index", date_format(date_add($log->created_at, date_interval_create_from_date_string('7 hours')), "l, d F Y H:i"));
                $index++;
            }

            $csv = new Csv($spreadsheet);
            $csv->save($fileName);
            return response()->download($fileName)->deleteFileAfterSend();
        } else {
            return redirect('/');
        }
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
