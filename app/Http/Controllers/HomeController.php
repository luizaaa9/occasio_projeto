<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class HomeController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('home', compact('areas'));
    }
}
