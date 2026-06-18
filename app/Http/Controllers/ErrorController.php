<?php

namespace App\Http\Controllers;

class ErrorController extends Controller
{
    public function index($code)
    {
        $messages = [
            '401' => ['title' => 'Unauthorised', 'message' => 'You do not have permission to view this page.'],
            '403' => ['title' => 'Forbidden', 'message' => 'Access denied.'],
            '404' => ['title' => 'Page Not Found', 'message' => 'The page you are looking for does not exist.'],
            '500' => ['title' => 'Server Error', 'message' => 'Something went wrong on our end.'],
        ];

        $error = $messages[$code] ?? $messages['404'];
        $view = view()->exists("errors.{$code}") ? "errors.{$code}" : 'errors.404';

        return response()->view($view, compact('error'), (int) $code);
    }
}
