<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\City;
use App\Models\Repair;
use App\Models\State;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repairs = Repair::sortable()->paginate(20);
        $cities = City::all();
        $cars = Car::all();
        return view('repairs')->with('repairs',$repairs)->with('cities',$cities)->with('cars',$cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        $cities = City::all();
        $states = State::all();
        return view('createRepair')->with('cars',$cars)->with('cities',$cities)->with('states',$states);
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
            'city'=>'required',
            'car'=>'required',
            'reason'=>'required',
            'cost'=>'required|numeric|min:0',
        ]);

        $repair = new Repair;
        $repair->reason = $request->input('reason');
        $repair->ID_car = $request->input('car');
        $repair->costEuro = $request->input('cost');
        $repair->ID_city = $request->input('city');
        $repair->save();


        return redirect()->route('repairs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function show(Repair $repair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repair
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repair =Repair::where('id',$id)->first();
        $cars = Car::all();
        $cities = City::all();
        $states = State::all();
        return view('editRepair')->with('cars',$cars)->with('cities',$cities)->with('states',$states)->with('repair',$repair);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'city'=>'required',
            'car'=>'required',
            'reason'=>'required',
            'cost'=>'required|numeric|min:0',
        ]);

        $repair = Repair::where('id',$id)->first();
        $repair->reason = $request->input('reason');
        $repair->ID_car = $request->input('car');
        $repair->costEuro = $request->input('cost');
        $repair->ID_city = $request->input('city');
        $repair->save();


        return redirect()->route('repairs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repair $repair)
    {
        $repair->delete();
        return redirect()->route('repairs.index');
    }


}
