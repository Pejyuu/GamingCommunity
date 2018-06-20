<?php

namespace Modules\Pages\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Pages\Entities\Page as Page;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource in the dashboard.
     * @return Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('pages::admin.index')->with('pages', $pages);
    }
    /**
     * Display a specific resource, based on slug.
     * @return Response
     */
    public function display($slug)
    {

        $page = Page::where('slug', $slug)->first();
        if(!$page){ abort(404); }



        return view('pages::frontend.index')->with( 'page', $page);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('pages::admin.create');
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
          $slug = $request['slug'];
          $page = new Page();
          $page->title = $title;
          $page->author_id = $author;
          $page->content = $content;
          $page->slug = $slug;


          $page->save();

          return redirect()->route('page.index')
              ->with('flash_message',
               'Page "'. $page->title.'" added!');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
     public function edit($id) {
         $page = Page::findOrFail($id);

         return view('pages::admin.edit', compact('page'));
     }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
     public function update(Request $request, $id) {
         $page = Page::findOrFail($id);

         // VALIDATE!

         $input = $request->all();
         $page->fill($input)->save();

         return redirect()->route('page.index')
             ->with('flash_message',
              'Page "'. $page->name.'" updated!');

     }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
     public function destroy($id) {
         $page = Page::findOrFail($id);

         $page->delete();

         return redirect()->route('page.index')
             ->with('flash_message',
              'Page deleted!');

     }
}
