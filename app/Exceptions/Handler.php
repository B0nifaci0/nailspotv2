<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        $response = $this->handleException($request, $exception);

        return $response;
    }

    public function handleException($request, Exception $exception)
    {
        if ($exception instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }

        if ($exception instanceof ModelNotFoundException) {
            $model = strtolower(class_basename($exception->getModel()));

            return response()->json([
                'error' => "No {$model} found with the specified ID.",
            ], 404);
        }

        if ($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request, $exception);
        }

        if ($exception instanceof AuthorizationException) {
            return back()->with('error', 'You are not authorized to perform this action.');
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'error' => 'The requested URL was not found.',
            ], 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'error' => 'The requested method is not allowed.',
            ], 405);
        }

        if ($exception instanceof HttpException) {
            return response()->json([
                'error' => $exception->getMessage(),
            ], $exception->getStatusCode());
        }

        if ($exception instanceof QueryException) {
            $errorCode = $exception->errorInfo[1];

            if ($errorCode == 1451) {
                return response()->json([
                    'error' => 'Cannot remove this resource permanently. It is related with another resource.',
                ], 409);
            }
        }

        if (config('app.debug')) {
            return parent::render($request, $exception);
        }

        return response()->json([
            'error' => 'Whoops, looks like something went wrong.',
        ], 500);
    }
}
