<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\{Category,Post,Tag};
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
        return view('posts.create',[
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function store(PostRequest $request)
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
            
            /*validate the field *using function method* */ 
            $attr = $request->all();

            /* asssign title to the slug */
            $attr['slug'] = Str::slug(request('title'));
            $attr['category_id'] = request('category');

            /* create new post */
            $post = Post::create($attr);

            $post->tags()->attach(request('tags'));

            /* flash message to alert that the post was success create or failed */
            session()->flash('success', 'The post was created');
            //session()->flash('error', 'The post was failed to create');


            /* return to posts page */
            return redirect()->to('posts');

    }

    public function edit(Post $post)
    {
        return view('posts.edit', [

            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);

    }

    public function update( PostRequest $request, Post $post)
    {
        /*validate the field  *using PostRequest method* */ 
        $attr = $request->all();

        /* update new post */
        $attr['category_id'] = request('category');
        $post->update($attr);
        $post->tags()->sync(request('tags'));

        /* flash message to alert that the post was success create or failed */
        session()->flash('success', 'The post was updated');
        //session()->flash('error', 'The post was failed to create');


        /* return to posts page */
        return redirect()->to('posts');

    }

    public function validateRequest(){

        return request()->validate([
            'title' => 'required|min:3',
            'body' => 'required',
        ]);
    }

    public function destroy(Post $post)
    {
        
        $post->tags()->detach();
        $post->delete();
        
        session()->flash('success', 'The post was deleted');

        return redirect('posts');

    }
}
