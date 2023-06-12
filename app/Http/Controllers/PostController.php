<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\Coment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        /*
        update a post :
        $post = Post::find(11);
        $post->update(['title'=> 'Edited title']);
        */

        /*
        delete a post :
        $post = Post::find(12);
        $post->delete();
        */

        /*
        $title = 'My first super title';
        $title2 = 'My second super title';

        return view('articles', ['title' => $title , 'title2' => $title2]);
        another way to do it :
        return view('articles')->with('title', $title);
        another way to do it :
        return view('articles', compact('title','title2'));
        */

        //a better way to do it

        $posts = Post::paginate(2);
        //dd($posts); : to see the detail of the type of ur data and all ...

        return view('articles', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        //dd($post);

        //where clause :
        //$post = Post::where('title', '=', 'Et cum dolorum maxime voluptas vel qui.')->firstOrFail();

        return view('article', ['post' => $post]);
    }

    public function create()
    {
        return view('creationForm');
    }

    public function store(Request $request)
    {
        //$name = Storage::disk('local')->put('avatars', $request->file('photo')); store a file locally

        //dd(Storage::get($name)); //recuperer l'image de la bd for ex

        //dd(Storage::disk('local')->exists($name)); //check if a file exists

        //return Storage::download($name); //to download the file obv

        //dd(Storage::url($name)); //le chemin reel de l image

        //dd(Storage::put('avatarsTest', $request->photo)); //another way to store

        //dd($request->photo->store('avatarsTest')); //another way to store using request

        //$file_name = time() . '.' . $request->photo->extension(); //generate a name for the file
        //dd($file_name);

        //dd($request->photo->storeAs('avatarsTest' , $file_name)); //personnalize the name

        $request->validate(
            [
                'title' => 'required|min:5',
                'content' => 'required'
            ]
            );

        //store an image for each post

        $file_name = time() . '.' . $request->photo->extension();
        $path = $request->photo->storeAs('images' , $file_name , 'public');

        $post = Post::create(['title' => $request->title , 'content' => $request->content]);

        $image = new Image();
        $image->path = $path;
        $post->image()->save($image);

        dd("Post created !");

        /*
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        dd("Post created !");
        */

        //a better way to do it :

        // Post::create(['title' => $request->title , 'content' => $request->content]);
        // dd("Post created !");
    }

    public function storeComment(Request $request)
    {
        $post = Post::find($request->id);
        $comment = new Coment(['content' => $request->content]);
        $post->comments()->save($comment);
        return redirect()->route('article', ['id' => $post->id]);
    }

    public function contact()
    {
        return view('contact');
    }
}
