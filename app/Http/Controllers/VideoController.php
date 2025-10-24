<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Conteudo;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index(Conteudo $conteudo)
    {
        $videos = Video::where('conteudo_id', $conteudo->id)->get();
        return view('videos.index', compact('videos', 'conteudo'));
    }

    public function create(Conteudo $conteudo)
    {
        return view('videos.create', compact('conteudo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'conteudo_id' => 'required|exists:conteudos,id',
            'link' => 'nullable|url',
            'video' => 'nullable|file|mimes:mp4,mov,avi'
        ]);

        $video = new Video();
        $video->titulo = $request->titulo;
        $video->conteudo_id = $request->conteudo_id;
        $video->descricao = $request->descricao;

        if($request->hasFile('video')){
            $path = $request->file('video')->store('videos', 'public');
            $video->video = $path;
        }

        $video->link = $request->link;
        $video->save();

        return redirect()->route('conteudos.videos', $video->conteudo_id)
            ->with('success', 'Vídeo salvo com sucesso!');
    }
}
