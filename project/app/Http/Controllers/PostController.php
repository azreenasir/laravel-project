<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate(6),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        // *The first method to store* //
           
            // $post = new Post;
            // $post->title = $request->title;
            // $post->slug = \Str::slug($request->title);
            // $post->body = $request->body;
            // $post->save();
            // return redirect()->to('posts');


        // * second method to store * //

            // Post::create([
            //     'title'=> $request->title,
            //     'slug'=> \Str::slug($request->title),
            //     'body'=> $request->title,
            // ]);

            // return back();

        // * third method to store * //
            
            /*validate the field */ 
            $attr = request()->validate([
                'title' => 'required|min:3',
                'body' => 'required',
            ]);

            /* asssign title to the slug */
            $attr['slug'] = Str::slug(request('title'));

            /* create new post */
            Post::create($attr);

            /* flash message to alert that the post was success create or failed */
            session()->flash('success', 'The post was created');
            //session()->flash('error', 'The post was failed to create');


            /* return to posts page */
            return redirect()->to('posts');

    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));

    }

    public function update(Post $post)
    {
        /*validate the field */ 
        $attr = request()->validate([
            'title' => 'required|min:3',
            'body' => 'required',
        ]);

        /* update new post */
        $post->update($attr);

        /* flash message to alert that the post was success create or failed */
        session()->flash('success', 'The post was updated');
        //session()->flash('error', 'The post was failed to create');


        /* return to posts page */
        return redirect()->to('posts');

    }
}
