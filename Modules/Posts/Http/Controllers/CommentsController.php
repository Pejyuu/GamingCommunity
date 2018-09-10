<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Posts\Entities\Comment as Comment;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('posts::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('posts::create');
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


           $comment = new Comment();
           $comment->post_id = $request['post_id'];
           $comment->user_id = $request['user_id'];
           $comment->comment = $request['comment'];
           $comment->moderation = 0;


           $comment->save();

           return redirect()->back()->with('success', ['your message,here']);
     }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('posts::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('posts::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */

      public function destroy($id) {
          $posts = Comment::findOrFail($id);

          $posts->delete();

          return redirect()->back()->with('success', ['Comment was deleted']);


    }
}
