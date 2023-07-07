<?php

namespace App\Http\Controllers\Fruits;

use App\Http\Controllers\Controller;
use App\Models\Fruit;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $fruits = Fruit::all();
        return $fruits;
    }
}