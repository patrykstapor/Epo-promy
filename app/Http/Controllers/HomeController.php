<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredRoutes = [
            ['from' => 'Gdańsk', 'to' => 'Karlskrona', 'duration' => '10h', 'price' => 289],
            ['from' => 'Świnoujście', 'to' => 'Ystad', 'duration' => '7h', 'price' => 249],
            ['from' => 'Gdynia', 'to' => 'Helsinki', 'duration' => '18h', 'price' => 399],
        ];

        return view('home', compact('featuredRoutes'));
    }
}
