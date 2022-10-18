<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\StaffInfromation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff_details=StaffInfromation::latest()->get();
        return view('dashboard.staf_infromation.index',compact('staff_details'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('dashboard.staf_infromation.create',compact('roles'));
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
            'name'=>'required',
            'mobile_number'=>'required|min:11',
            'role'=>'required',
        ]);
        $staffInfromation=StaffInfromation::create([
            'name'=>$request->name,
            'mobile_number'=>$request->mobile_number,
            'role'=>$request->role,
            'address'=>$request->address,
            'joining_date'=>$request->joining_date,
            'exiting_date'=>$request->exiting_date,
        ]);
        if ($request->hasFile('photo') ) {
            $request->validate([
                'photo'=>'image',
            ]);
            $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('photo')->getClientOriginalExtension();
            $img = Image::make($request->file('photo'))->resize(300, 200);
            $img->save(base_path('public/uploads/staff/'.$photo), 60);
            StaffInfromation::find($staffInfromation->id)->update([
                'photo'=>$photo,
            ]);
        }
        if ($request->hasFile('nid_photo') ) {
            $request->validate([
                'nid_photo'=>'image',
            ]);
            $nid_name= Carbon::now()->format('Y').rand(1,9999).".".$request->file('nid_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('nid_photo'))->resize(300, 200);
            $img->save(base_path('public/uploads/staff/'.$nid_name), 60);
            StaffInfromation::find($staffInfromation->id)->update([
                'nid_photo'=>$nid_name,
            ]);
        }

        if ($request->hasFile('license_photo') ) {
            $request->validate([
                'license_photo'=>'image',
            ]);
            $license_photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('license_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('license_photo'))->resize(300, 200);
            $img->save(base_path('public/uploads/staff/'.$license_photo), 60);
            StaffInfromation::find($staffInfromation->id)->update([
                'license_photo'=>$license_photo,
            ]);
        }
        return redirect('staff')->with('success','Staff Information Added Successfylly!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff_role=StaffInfromation::findOrFail($id)->role;
        $staff_details=StaffInfromation::findOrFail($id);
        $roles=Role::where('id','!=',$staff_role)->get();
        return view('dashboard.staf_infromation.edit',compact('staff_details','roles','staff_role'));
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
            $request->validate([
                'mobile_number'=>'required|min:11',
            ]);
            StaffInfromation::find($id)->update([
                'name'=>$request->name,
                'mobile_number'=>$request->mobile_number,
                'role'=>$request->role,
                'address'=>$request->address,
                'joining_date'=>$request->joining_date,
                'exiting_date'=>$request->exiting_date,
            ]);
        if ($request->hasFile('photo') ) {
            $request->validate([
                'photo'=>'image',
            ]);
            $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('photo')->getClientOriginalExtension();
            $img = Image::make($request->file('photo'))->resize(300, 200);
            $img->save(base_path('public/uploads/staff/'.$photo), 60);
            StaffInfromation::find($id)->update([
                'photo'=>$photo,
            ]);
        }
        if ($request->hasFile('nid_photo') ) {
            $request->validate([
                'nid_photo'=>'image',
            ]);
            $nid_name= Carbon::now()->format('Y').rand(1,9999).".".$request->file('nid_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('nid_photo'))->resize(300, 200);
            $img->save(base_path('public/uploads/staff/'.$nid_name), 60);
            StaffInfromation::find($id)->update([
                'nid_photo'=>$nid_name,
            ]);
        }

        if ($request->hasFile('license_photo') ) {
            $request->validate([
                'license_photo'=>'image',
            ]);
            $license_photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('license_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('license_photo'))->resize(300, 200);
            $img->save(base_path('public/uploads/staff/'.$license_photo), 60);
            StaffInfromation::find($id)->update([
                'license_photo'=>$license_photo,
            ]);
        }
        return redirect('staff')->with('success','Staff Information Updated Successfylly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StaffInfromation::findOrFail($id)->delete();
        return back()->with('success','Staff Information Deleted Successfully!');
    }
}
