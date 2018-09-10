<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Shop\Entities\Product as Product;
use Modules\Shop\Entities\Option as Option;

class ShopController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function frontend()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('shop::index')->with('products', $products);
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('shop::admin.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('shop::admin.create');
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



           $product = new Product();
           $product->name = $request['name'];
           $product->description = $request['description'];
           $product->colors = $request['colors'];
           $product->price = $request['price'];
           $product->sizes = $request['sizes'];
           $product->pic1 = $request['filepath'];


           $product->save();

           return redirect()->route('shop.index')
               ->with('flash_message',
                'Page "'. $product->name.'" added!');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
      $product = Product::where('id', $id)->first();
      if(!$product){ abort(404); }

      return view('shop::display')->with( 'product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('shop::admin.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
     public function update(Request $request, $id) {
         $product = Product::findOrFail($id);

         // VALIDATE!

         $input = $request->all();
         $product->fill($input)->save();

         return redirect()->route('shop.index')
             ->with('flash_message',
              'Product "'. $product->name.'" updated!');

     }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id) 
    {
         $product = Product::findOrFail($id);

         $product->delete();

         return redirect()->route('shop.index')
             ->with('flash_message',
              'Product Deleted!');

     }


    public function getOptions($id)
    {
      $options = Option::where('variant_id', $id );
    }
}
