<?php

namespace App\Http\Controllers;

use Hybridly\View\Factory;
use Spatie\RouteAttributes\Attributes\Get;

class HomeController extends Controller
{
    #[Get('/', name: 'home', middleware: 'auth')]
    public function index(): Factory
    {
        return hybridly('home');
    }
}
