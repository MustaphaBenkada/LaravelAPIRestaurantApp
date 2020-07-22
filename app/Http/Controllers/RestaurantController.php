<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Resources\Restaurant as RestaurantResource;
use Illuminate\Http\UploadedFile;
class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::paginate(10);
       // dd($restaurant);
        return view('restaurant.index',['restaurants' => $restaurant]);
        //return RestaurantResource::collection(Restaurant::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Restaurant::create($request->all());
        return redirect()->route('restaurant.index')->with('success','Restaurant added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //$restaurant = Restaurant::all();
        
        return view('restaurant.edit',['restaurant' => $restaurant]);
       // return new RestaurantResource($restaurant);
    }

    public function getRestaurant(Restaurant $restaurant,$id)
    {
        return  RestaurantResource::collection(Restaurant::all()->where('type' , '=' , $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //dd("h");
        $restaurant->update($request->all());
        return redirect()->route('restaurant.index')->with('success','Restaurant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurant.index')->withErrors('Restaurant deleted successfully.');
    }

    public function getImageAttribute()
    {
       return $this->image;
    }
}
