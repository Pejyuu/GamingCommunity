<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class CoreController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    public function index()
    {
        return view('core::frontend.index');
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
