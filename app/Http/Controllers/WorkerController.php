<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::paginate(20);
        $cities = City::all();

        return view('workers')->with('workers',$workers)->with('cities',$cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();

        return view('createWorkers')->with('cities',$cities);
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
            'personalNumber'=>'required|numeric|min:0',
            'city'=>'required',
            'phone'=>'required',
        ]);

        $worker = new Worker();
        $worker->nameW = $request->input('name');
        $worker->personalNumber = $request->input('personalNumber');
        $worker->ID_city = $request->input('city');
        $worker->phone = $request->input('phone');
        $worker->save();

        return redirect()->route('workers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker = Worker::where('id',$id)->first();
        $cities = City::all();

        return view('editWorkers')->with('cities',$cities)->with('worker',$worker);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'personalNumber'=>'required|numeric|min:0',
            'city'=>'required',
            'phone'=>'required',
        ]);

        $worker = Worker::where('id',$id)->first();
        $worker->nameW = $request->input('name');
        $worker->personalNumber = $request->input('personalNumber');
        $worker->ID_city = $request->input('city');
        $worker->phone = $request->input('phone');
        $worker->save();

        return redirect()->route('workers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::where('id',$id)->first();
        $worker->delete();
        return redirect(route('workers.index'));
    }
}
