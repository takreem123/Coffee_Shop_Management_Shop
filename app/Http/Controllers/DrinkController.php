<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;
use Auth;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('drink');
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
        'price' => ['required'],
        'picture' => ['required'],
    ]);
          $drink_obj = new Drink;
    
          $drink_obj->name = $request->name;
          $drink_obj->price = $request->price;
          $path = $request->file('picture')->store('avatars', 'public');
          $drink_obj->picture = $path;
          $drink_obj->user_id = Auth::id();
          // save data
          $drink_obj->save();

        return back()->with('success','Successfuly Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function drinkList(){
        $drinkData = Drink::all();
        return view('showDrink',['drinkDataList'=>$drinkData]);
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDrink($id)
    {
        $data =  Drink::find($id);
         return view('updateDrink',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDrink(Request $request)
    {
        $data = Drink::find($request->id);
        $data->name = $request->name;
        $data->price = $request->price;
        $path = $request->file('picture')->store('avatars', 'public');
        $data->picture = $path;
        $data->user_id = Auth::id();
        $data->save();
        return redirect('home')->with('success', 'Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteDrink($id)
      {
          $data = Drink::find($id);
          $data->delete();
          return redirect('home')->with('success', 'Deleted Successfuly');
      }
}
