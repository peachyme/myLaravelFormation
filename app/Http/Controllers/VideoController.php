<?php

namespace App\Http\Controllers;
use App\Models\Video;
use App\Models\Coment;
use Illuminate\Http\Request;


class VideoController extends Controller
{
    public function display()
    {
        $videos = Video::all();

        return view('videos', compact('videos'));
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);

        return view('video', compact('video'));
    }

    public function storeComment(Request $request)
    {
        $video = Video::find($request->id);
        $comment = new Coment(['content' => $request->content]);
        $video->comments()->save($comment);
        return redirect()->route('video', ['id' => $video->id]);
    }
}




