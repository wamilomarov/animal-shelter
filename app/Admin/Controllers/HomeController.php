<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;

class HomeController extends Controller
{
    public function index(Content $content): Content
    {
        return $content
            ->title('Dashboard')
            ->description("Welcome to admin");
    }
}
