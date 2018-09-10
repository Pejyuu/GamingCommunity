<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Posts\Entities\Post as Post;

class CoreController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    public function index()
    {
      //$posts = Post::limit(4)->orderBy('created_at', 'desc')->with('author')->get();
      $posts = Post::limit(4)->orderBy('created_at', 'desc')->with('author')->get();
      return view('core::frontend.index')->with('posts', $posts)->with('author');
    }

    public function dashboard()
    {
        return view('core::admin.index');
    }

    public function gallery()
    {
        return view('core::admin.gallery');
    }

    public function filemanager()
    {
        return view('core::admin.filemanager');
    }
}
