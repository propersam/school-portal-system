<?php

namespace App\Exceptions;

use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;

//use Illuminate\Auth\Access\AuthorizationException;
//use Illuminate\Database\Eloquent\ModelNotFoundException;

//use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthenticationException::class,
        //AuthorizationException::class,
        //HttpException::class,
        //ModelNotFoundException::class,
        TokenMismatchException::class,
        ValidationException::class,
    ];

    public function report(Exception $exception)
    {
        parent::report($exception);
        if ($this->shouldReport($exception)) {
            Bugsnag::notifyException($exception);
        }
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     *
     * @return \Illuminate\Http\Response | mixed
     */
    public function render($request, Exception $exception)
    {
        if (get_class($exception) == TokenMismatchException::class) {
            if ($request->wantsJson()) {
                return response()->json([
                    'status'   => false,
                    'message'  => "Expired Token! Refresh page to continue.",
                    'redirect' => redirect()->back()->getTargetUrl(),
                ])->setStatusCode(419);
            }

            redirect()->back();
        }

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Auth\AuthenticationException $exception
     *
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('auth.login'));
    }
}
