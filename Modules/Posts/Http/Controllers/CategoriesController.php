<?php

namespace Modules\Posts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Posts\Entities\Category as Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
      $categories = Category::simplePaginate(10);
      return view('posts::admin.cat.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('posts::admin.cat.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {


      $cat = new Category();
      $cat->name = $request['name'];
      $cat->description = $request['desc'];


      $cat->save();

      return redirect()->route('category.index')
          ->with('flash_message',
           'Category "'. $cat->name.'" added!');


    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
      $category = Category::findOrFail($id);
      return view('posts::admin.cat.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
      $category = Category::findOrFail($id);

      // VALIDATE!

      $input = $request->all();
      $category->fill($input)->save();

      return redirect()->route('category.index')
          ->with('flash_message',
           'Category "'. $category->name.'" updated!');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
      $category = Category::findOrFail($id);

      $category->delete();

      return redirect()->route('category.index')
          ->with('flash_message',
           'Category deleted!');
    }
}
