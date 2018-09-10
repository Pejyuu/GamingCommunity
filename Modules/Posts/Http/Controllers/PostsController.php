<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Posts\Entities\Post as Post;
use Modules\Posts\Entities\Category as Category;
use Modules\Posts\Entities\Tag as Tag;

use App\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
      $posts = Post::orderBy('created_at', 'desc')->with('author')->get();
      return view('posts::admin.index')->with('posts', $posts);
    }

    public function frontend()
    {
      $posts = Post::orderBy('created_at', 'desc')->with('author')->take(9)->get();
      return view('posts::index')->with('posts', $posts)->with('author')->with('comments');
    }
    public function archive()
    {
      {
        $posts = Post::orderBy('created_at', 'desc')->with('author')->paginate(10);
        return view('posts::archive')->with('posts', $posts)->with('author')->with('comments');
      }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
     public function display($slug)
     {

         $post = Post::where('slug', $slug)->with('author')->first();
         if(!$post){ abort(404); }


         return view('posts::display')->with( 'post', $post);
     }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
      $categories = Category::pluck('name', 'id');
      return view('posts::admin.create')->with('categories', $categories->toArray());
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
     public function store(Request $request)
     {
       //Validate name and permissions field

           // VALIDATE

           $author = $request['author'];
           $title = $request['title'];
           $content = $request['content'];
           $category_id = $request['category_id'];
           $lead = $request['lead'];
           $tags = $request['tags'];
           $img = $request['filepath'];
           $slug = str_slug($title, '-');
           $post = new Post();
           $post->user_id = $author;
           $post->title = $title;
           $post->content = $content;
           $post->category_id = $category_id;
           $post->tags = $tags;
           $post->slug = $slug;
           $post->filepath = $img;


           $post->save();

           return redirect()->route('post.index')
               ->with('flash_message',
                'Page "'. $post->title.'" added!');
     }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
      $post = Post::findOrFail($id);
      $categories = Category::pluck('name', 'id');
      return view('posts::admin.edit', compact('post'))->with('categories', $categories->toArray());
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
     public function update(Request $request, $id) {
         $post = Post::findOrFail($id);

         // VALIDATE!

         $input = $request->all();
         $post->fill($input)->save();

         return redirect()->route('post.index')
             ->with('flash_message',
              'Post "'. $post->name.'" updated!');

     }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
     public function destroy($id) 
     {
         $posts = Post::findOrFail($id);

         $posts->delete();

         return redirect()->route('post.index')
             ->with('flash_message',
              'Post deleted!');

     }
}
