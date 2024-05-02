<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        $http = [
            422 => "Unprocessable Entity",
            404 => "Not Found"
        ];

        if ($e instanceof ValidationException) {
            return response()->json([
                'status' => "Validation Error",
                "message" => "Failed to validate your request",
                "errors" => $e->validator->errors()->all()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        else if ($e instanceof AuthenticationException) {
            return response()->json([
                'status' => "Unauthorized",
                "message" => $e->getMessage(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        else if ($e instanceof UniqueConstraintViolationException) {
            return response()->json([
                'status' => "Conflict",
                "message" => $e->getMessage(),
            ], Response::HTTP_CONFLICT);
        }
        else {
            return response()->json([
                'status' => !empty($http[$e->getCode()]) ? $http[$e->getCode()] : "Internal Server Error",
                "message" => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return parent::render($request, $e);
    }
}
