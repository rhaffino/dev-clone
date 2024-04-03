<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\Exceptions\ReportToSpace;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        if (env('APP_ENV') == 'production') {
            try {
                // ignore 404 not found exception
                if ($exception->getStatusCode() == 404) {
                    return parent::render($request, $exception);
                }

                $code = $exception->getCode() == 0 ? '-' : $exception->getCode();
                $file = $exception->getFile() == '' ? '-' : $exception->getFile();
                $line = (string)$exception->getLine() ?? '-';
                $message = $exception->getMessage() == '' ? '-' : $exception->getMessage();
                $trace = $exception->getTraceAsString() == '' ? '-' : $exception->getTraceAsString();

                $params = [
                    'code' => $code,
                    'file' => $file,
                    'line' => $line,
                    'message' => $message,
                    // 'trace' => $trace,
                    'url' => $request->fullUrl(),
                    'ip' => $request->ip(),
                ];

                // session info
                Log::info('session');
                Log::error(session()->all());
                Log::info('==============================');

                // run webhook
                if (strtolower(env('EXCEPTION_PLATFORM')) == 'space') {
                    $report = new ReportToSpace();
                    $report
                        ->setURL('https://chat.googleapis.com/v1/spaces/' . env('EXCEPTION_CHANNEL') . '/messages?key=' . env('EXCEPTION_KEY') . '&token=' . env('EXCEPTION_TOKEN'))
                        ->setData($params)
                        ->send();
                }
            } catch (\Throwable $th) {
                Log::critical('exception itself even not working => ' . $th->getMessage());
            }
        }

        return parent::render($request, $exception);
    }
}
