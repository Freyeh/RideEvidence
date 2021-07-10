<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\City;
use App\Models\Purpose;
use App\Models\Repair;
use App\Models\Ride;
use App\Models\State;
use App\Models\Worker;
use Barryvdh\DomPDF\Facade as PDF;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use PHPUnit\Util\Xml as XMLAlias;
use SebastianBergmann\Diff\Output\StrictUnifiedDiffOutputBuilder;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\ColumnSortableServiceProvider;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;



class RideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cars = Car::all();
        $cities = City::all();
        $purposes = Purpose::all();
        $workers = Worker::all();
        $rides = Ride::sortable()->paginate(20);
        return view('welcome')->with('cars',$cars)->with('cities',$cities)->with('purposes',$purposes)->with('workers',$workers)->with('rides',$rides);
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
        $purposes = Purpose::all();
        $workers = Worker::all();
        $states = State::all();
        return view('create')->with('cars',$cars)->with('purposes',$purposes)->with('workers',$workers)->with('cities',$cities)->with('states',$states);
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
            'cityfrom'=>'required',
            'cityto'=>'required',
            'worker'=>'required',
            'purpose'=>'required',
            'car'=>'required',
            'fuelused'=>'required|numeric|min:0',
            'cost'=>'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $ride = new Ride;
        $ride->ID_cityFrom = $request->input('cityfrom');
        $ride->ID_cityTo = $request->input('cityto');
        $ride->ID_worker = $request->input('worker');
        $ride->ID_purpose = $request->input('purpose');
        $ride->ID_car = $request->input('car');
        $ride->fuelUsed = $request->input('fuelused');
        $ride->cost = $request->input('cost');


        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $ride->image = $imageName;

        $ride->save();

        return redirect()->route('rides.index');
    }


    public function show($id)
    {
        $ride = Ride::find($id);
        $cars = Car::all();
        $cities = City::all();
        $workers = Worker::all();
        $purposes = Purpose::all();
        $states = State::all();

        return view('show')->with('cars',$cars)->with('cities',$cities)->with('purposes',$purposes)->with('workers',$workers)->with('ride',$ride)->with('states',$states);
    }


    public function edit($id)
    {
        $ride = Ride::where('id',$id)->first();
        $cars = Car::all();
        $cities = City::all();
        $purposes = Purpose::all();
        $workers = Worker::all();
        $states = State::all();
        return view('edit')->with('cars',$cars)->with('purposes',$purposes)->with('workers',$workers)->with('cities',$cities)->with('ride',$ride)->with('states',$states);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'cityfrom'=>'required',
            'cityto'=>'required',
            'worker'=>'required',
            'purpose'=>'required',
            'car'=>'required',
            'fuelused'=>'required|numeric|min:0',
            'cost'=>'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $ride = Ride::where('id',$id)->first();

        $ride->ID_cityFrom = $request->input('cityfrom');
        $ride->ID_cityTo = $request->input('cityto');
        $ride->ID_worker = $request->input('worker');
        $ride->ID_purpose = $request->input('purpose');
        $ride->ID_car = $request->input('car');
        $ride->fuelUsed = $request->input('fuelused');
        $ride->cost = $request->input('cost');

        if ($ride->image != 'aa.jpg'){
            unlink(public_path('\images/'.$ride->image));
        }

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $ride->image = $imageName;

        $ride->save();

        return redirect()->route('rides.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ride $ride)
    {
        if ($ride->image != 'aa.jpg'){
            unlink(public_path('\images/'.$ride->image));
        }
        $ride->delete();
        return redirect()->route('rides.index');
    }

    public function search(Request $request){

        $q = $request->input('search');

        $cities = City::all();
        $states = State::all();
        $cars = Car::all();
        $workers = Worker::all();
        $rides = Ride::all();
        $purposes = Purpose::all();
        $repairs = Repair::all();

        $shows = Ride::join('cities','cities.id','rides.ID_cityFrom')->
            join('states','states.id','cities.ID_state')->
            join('cars','cars.id','rides.ID_car')->
            join('workers','workers.id','rides.ID_worker')->
                where('cities.name','LIKE','%'.$q.'%')->
                orWhere('states.name','LIKE','%'.$q.'%')->
                orWhere('cars.name','LIKE','%'.$q.'%')->
                orWhere('cars.productionYear','LIKE','%'.$q.'%')->
                orWhere('cars.color','LIKE','%'.$q.'%')->
                orWhere('workers.nameW','LIKE','%'.$q.'%')->
                orWhere('workers.personalNumber','LIKE','%'.$q.'%')
            ->get();

        //dd($show);
        //echo $show;

        return view('search')->with('shows',$shows)->with('cities',$cities)->with('states',$states)->with('cars',$cars)->with('workers',$workers)->
            with('rides',$rides)->with('purposes',$purposes)->with('repairs',$repairs);
    }

    public function charts(){

        $data = DB::table('rides')->join('cars','rides.ID_car','cars.id')->
        select(
            DB::raw('name as name'),
            DB::raw('count(*) as number'))->groupBy('name')->get();
        $array[] = ['name','Number'];
        foreach ($data as $key=>$value){
            $array[++$key] = [$value->name, $value->number];
        }

        $data2 = DB::table('rides')->join('purposes','rides.ID_purpose','purposes.id')->
        select(
            DB::raw('type as type'),
            DB::raw('count(*) as number2'))->groupBy('type')->get();
        $array2[] = ['type','Number2'];
        foreach ($data2 as $key=>$value){
            $array2[++$key] = [$value->type, $value->number2];
        }

        $rides = Ride::all();
        $repairs = Repair::all();


        return view('chart')->with('name',json_encode($array))->with('type',json_encode($array2))->with('rides',$rides)->with('repairs',$repairs);
    }

    public function downloadPDF(){
        $rides = Ride::all();
        $cars = Car::all();
        $cities = City::all();
        $workers = Worker::all();
        $purposes = Purpose::all();
        $states = State::all();

        $pdf = PDF::loadView('download',compact('rides','cars','cities','workers','purposes','states'));
        return $pdf->download('pdf.pdf');


    }

    public function exportData(){
        return Excel::download(new DataExport,'rides.xlsx');
    }



}
class DataExport implements FromCollection{
    function collection(){
        return Ride::all();
    }
}
