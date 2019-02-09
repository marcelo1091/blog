<?php

namespace App\Http\Controllers;

use App\Post;
use App\Services\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostControler extends Controller
{
    public function __construct(FileUploader $fileUploader)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->fileUploader = $fileUploader;
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(7);
        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'body'        => 'required',
            'cover_image' => 'image|nullable|max:1999',
        ]);

        if ($request->hasFile('cover_image')) {
            $fileNameToStore = $this->fileUploader->upload($request->file('cover_image'), 'public/cover_images');
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $post              = new Post;
        $post->title       = $request->input('title');
        $post->body        = $request->input('body');
        $post->user_id     = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        return redirect('/posts')->with('success', 'Wpis Dodany');
    }

    public function show(int $id): View
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    public function edit(int $id): View
    {
        $post = Post::find($id);

        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Nie Możesz Edytować Tego Wpisu');
        }

        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
        ]);

        if ($request->hasFile('cover_image')) {
            $fileNameToStore = $this->fileUploader->upload($request->file('cover_image'), 'public/cover_images');
        }

        $post        = Post::find($id);
        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success', 'Zaktualizowano Wpis');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Nie Możesz Usunąć Tego Wpisu');
        }

        if ($post->cover_image != 'noimage.jpg') {
            Storage::delete('public/cover_images/' . $post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Wpis Usunięty');
    }
}
