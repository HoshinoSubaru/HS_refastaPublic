<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use \App\Models\error_reporting;

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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        if ($this->shouldReport($exception) && app()->bound('sentry')) {
            app('sentry')->captureException($exception);
        }
        
        // $error_reporting = error_reporting::db_save($exception);
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
      //csrfエラー
        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
        // $msg = "csrfトークンエラー";
        // $option = array("dir" => __DIR__, "file" => __FILE__, "line" => __LINE__, "class" => __CLASS__, "function" => __FUNCTION__);
        // PushChatwork::error_push($msg, $option);
            $url = $request->url();


            if(env("APP_DEBUG", false) != "true"){
                if (str_contains($url , 'delivery')) {
                    return redirect()->away('/delivery/');
                } elseif (str_contains($url , 'info')) {
                    // TODO refasta_publicなしでいいかも。本番時　refasta　削除
                    return redirect()->away('/info/');
                };
            }

        };

        return parent::render($request, $exception);
    }


    /**
     * 共通エラーページ
     */
    protected function renderHttpException(\Symfony\Component\HttpKernel\Exception\HttpException $e)
    {
        if(env("APP_DEBUG", false) != "true"){
            $status = $e->getStatusCode();
            return response()->view("errors.default", ['exception' => $e], $status);

        }else{
            $status = $e->getStatusCode();

            $paths = collect(config('view.paths'));

            view()->replaceNamespace('errors', $paths->map(function ($path) {
                return "{$path}/errors";
            })->push(__DIR__.'/views')->all());

            if (view()->exists($view = "errors::{$status}")) {
                return response()->view($view, ['exception' => $e], $status, $e->getHeaders());
            }

            return $this->convertExceptionToResponse($e);

        }
    }
}
