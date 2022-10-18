<?php

namespace App\Http\Controllers;

use App\Models\StaffInfromation;
use App\Models\Role;
use App\Models\Truck;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trucks=Truck::all();
        return view('dashboard.truck.index',compact('trucks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs=StaffInfromation::all();
        return view('dashboard.truck.create',compact('staffs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'truck'=>'required',
            'driver'=>'required',
        ]);
       $truck =Truck::create([
            'truck'=>$request->truck,
            'tier_information'=>$request->tier_information,
            'lubricant'=>$request->lubricant,
            'driver'=>$request->driver,
        ]);

        if ($request->hasFile('registation') ) {
            $request->validate([
                'registation'=>'image',
            ]);
            $registation= Carbon::now()->format('Y').rand(1,9999).".".$request->file('registation')->getClientOriginalExtension();
            $img = Image::make($request->file('registation'))->resize(600, 800);
            $img->save(base_path('public/uploads/truck/'.$registation), 80);
            Truck::find($truck->id)->update([
                'registation'=>$registation,
            ]);
        }
        if ($request->hasFile('tax_token') ) {
            $request->validate([
                'tax_token'=>'image',
            ]);
            $tax_token= Carbon::now()->format('Y').rand(1,9999).".".$request->file('tax_token')->getClientOriginalExtension();
            $img = Image::make($request->file('tax_token'))->resize(600, 800);
            $img->save(base_path('public/uploads/truck/'.$tax_token), 80);
            Truck::find($truck->id)->update([
                'tax_token'=>$tax_token,
            ]);
        }
        if ($request->hasFile('fitness') ) {
            $request->validate([
                'fitness'=>'image',
            ]);
            $fitness= Carbon::now()->format('Y').rand(1,9999).".".$request->file('fitness')->getClientOriginalExtension();
            $img = Image::make($request->file('fitness'))->resize(600, 800);
            $img->save(base_path('public/uploads/truck/'.$fitness), 80);
            Truck::find($truck->id)->update([
                'fitness'=>$fitness,
            ]);
        }
        if ($request->hasFile('route_permit') ) {
            $request->validate([
                'route_permit'=>'image',
            ]);
            $route_permit= Carbon::now()->format('Y').rand(1,9999).".".$request->file('route_permit')->getClientOriginalExtension();
            $img = Image::make($request->file('route_permit'))->resize(600, 800);
            $img->save(base_path('public/uploads/truck/'.$route_permit), 80);
            Truck::find($truck->id)->update([
                'route_permit'=>$route_permit,
            ]);
        }
        return redirect('truck')->with('success','Truck information Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver_dropdown=Truck::find($id)->driver;
        $edit_infos=Truck::findOrFail($id);
        $staffs= StaffInfromation::where('role','!=',$driver_dropdown)->get();
        return view('dashboard.truck.edit',compact('edit_infos','staffs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $truck =Truck::findOrFail($id)->update([
            'truck'=>$request->truck,
            'tier_information'=>$request->tier_information,
            'lubricant'=>$request->lubricant,
            'driver'=>$request->driver,
        ]);

        if ($request->hasFile('registation') ) {
            $request->validate([
                'registation'=>'image',
            ]);
            $registation= Carbon::now()->format('Y').rand(1,9999).".".$request->file('registation')->getClientOriginalExtension();
            $img = Image::make($request->file('registation'))->resize(600, 800);
            $img->save(base_path('public/uploads/truck/'.$registation), 80);
            Truck::find($id)->update([
                'registation'=>$registation,
            ]);
        }
        if ($request->hasFile('tax_token') ) {
            $request->validate([
                'tax_token'=>'image',
            ]);
            $tax_token= Carbon::now()->format('Y').rand(1,9999).".".$request->file('tax_token')->getClientOriginalExtension();
            $img = Image::make($request->file('tax_token'))->resize(600, 800);
            $img->save(base_path('public/uploads/truck/'.$tax_token), 80);
            Truck::find($id)->update([
                'tax_token'=>$tax_token,
            ]);
        }
        if ($request->hasFile('fitness') ) {
            $request->validate([
                'fitness'=>'image',
            ]);
            $fitness= Carbon::now()->format('Y').rand(1,9999).".".$request->file('fitness')->getClientOriginalExtension();
            $img = Image::make($request->file('fitness'))->resize(600, 800);
            $img->save(base_path('public/uploads/truck/'.$fitness), 80);
            Truck::find($id)->update([
                'fitness'=>$fitness,
            ]);
        }
        if ($request->hasFile('route_permit') ) {
            $request->validate([
                'route_permit'=>'image',
            ]);
            $route_permit= Carbon::now()->format('Y').rand(1,9999).".".$request->file('route_permit')->getClientOriginalExtension();
            $img = Image::make($request->file('route_permit'))->resize(600, 800);
            $img->save(base_path('public/uploads/truck/'.$route_permit), 80);
            Truck::find($id)->update([
                'route_permit'=>$route_permit,
            ]);
        }
        return redirect('truck')->with('success','Truck information Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Truck::findORFail($id)->delete();
        return redirect('truck')->with('success','Truck information Deleted Successfully!');
    }
}
