<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function homepage() {
        $ourName = 'Brad';
        $animals = ['Meowsalot', 'Barksalot', 'Purrsloud'];
        return view('homepage', ['allAnimals' => $animals, 'name' => $ourName]);
    }

    public function aboutpage() {
        return view('single-post');
    }
}
