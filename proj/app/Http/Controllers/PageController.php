<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function show(string $page)
    {
        $selected = "pages.{$page}";

        if (!View::exists($selected)) {
            abort(404);
        }

        return view($selected);
    }
}
