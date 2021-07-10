<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Brick\Math\Exception\NegativeNumberException;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(20);
        return view('cars')->with('cars',$cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createCar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'tankVolume'=>'required|numeric|min:0',
            'year'=>'required|numeric|min:0',
            'color'=>'required',
            'consumption'=>'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $car = new Car();
        $car->name = $request->input('name');
        $car->tankVolume = $request->input('tankVolume');
        $car->productionYear = $request->input('year');
        $car->color = $request->input('color');
        $car->consumption = $request->input('consumption');

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $car->image = $imageName;
        $car->save();

        return redirect()->route('cars.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::where('id',$id)->first();
        return view('showCar')->with('car',$car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::where('id',$id)->first();
        return view('editCar')->with('car',$car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'tankVolume'=>'required|numeric|min:0',
            'year'=>'required|numeric|min:0',
            'color'=>'required',
            'consumption'=>'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $car = Car::where('id',$id)->first();
        $car->name = $request->input('name');
        $car->tankVolume = $request->input('tankVolume');
        $car->productionYear = $request->input('year');
        $car->color = $request->input('color');
        $car->consumption = $request->input('consumption');


        if ($car->image != 'bb.jpg'){
            unlink(public_path('\images/'.$car->image));
        }

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $car->image = $imageName;
        $car->save();

        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::where('id',$id)->first();
        if ($car->image != 'bb.jpg'){
            unlink(public_path('\images/'.$car->image));
        }
        $car->delete();
        return redirect(route('cars.index'));
    }
}
