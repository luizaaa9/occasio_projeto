<?php
namespace App\Http\Controllers;

use App\Models\Anotacao;

class HomeController extends Controller
{
    public function index()
{
    $anotacoes = Anotacao::where('user_id', auth()->id())->latest()->get();

    return view('home', compact('anotacoes'));
}

}

