<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
          
    $validatedData = $request->validate([
        'name' => ['required'],
        'brand' => ['required'],
        'price' => ['required'],
        'quantity' => ['required'],
    ]);
          $product_obj = new Product;
    
          $product_obj->name = $request->name;
          $product_obj->brand = $request->brand;
          $product_obj->price = $request->price;
          $product_obj->quantity = $request->quantity;
          $product_obj->user_id = Auth::id();
          // save data
          $product_obj->save();

        return back()->with('success','Successfuly Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productList(){
        $productData = Product::all();
        return view('showProduct',['productDataList'=>$productData]);
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProduct($id)
    {
        $data =  Product::find($id);
         return view('updateProduct',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request)
    {
        $data = Product::find($request->id);
        $data->name = $request->name;
        $data->brand = $request->brand;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->user_id = Auth::id();
        
        $data->save();
        return back()->with('success', 'Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id)
      {
          $data = Product::find($id);
          $data->delete();
          return redirect('home')->with('success', 'Deleted Successfuly');
      }
}
