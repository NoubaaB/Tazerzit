<?php

namespace App\Http\Controllers;

use App\Activitie;
use App\Hostel;
use App\Image;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hostels=Hostel::with('activities','images')->get();
        return $hostels;
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

        $data=$request->validate([
            'nom'=>'required',
            'description'=>'required',
            'image'=>'required|image',
            'prix'=>'required',
            'day'=>'required',
        ]);
        $hostel = Hostel::create($data);
        if (Request()->has('image')) {
            $hostel->update([
                'image' => Request()->image->store('images', 'public'),
            ]);
        }
        foreach ($request->activities as $value ) {
            Activitie::create([
                'article'=>$value,
                'hostel_id'=>$hostel->id,
            ]);
        }
        foreach ($request->images as $value ) {
            $image=Image::create([
                'image'=>"test",
                'hostel_id'=>$hostel->id,
            ]);
            $image->update([
                'image' => $value->store('images', 'public'),
            ]);
         
        }
        $hostel->activities=Activitie::where('hostel_id',$hostel->id)->get();
        $hostel->images=Image::where('hostel_id',$hostel->id)->get();
        return $hostel;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function show(Hostel $hostel)
    {
        return view("tazerzit.showhostel",["hostel"=>$hostel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hostel $hostel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hostel $hostel)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hostel $hostel)
    {
        $hostel->delete();
        return "Deleted";
    }
    public function updatealt()
    {
        $data=Request()->validate([
            'id'=>'required',
            'nom'=>'required',
            'description'=>'required',
            'prix'=>'required',
            'day'=>'required',
        ]);
        $hostel = Hostel::find($data['id']);
        $hostel->update($data);
        if (Request()->has('image')) {
            $hostel->update([
                'image' => Request()->image->store('images', 'public'),
            ]);
        }
        if (Request()->has('activities')) {
            foreach (Request()->activities as  $key => $value ) {
                if ($key==0) {
                    # code...
                    Activitie::create([
                        'article'=>$value,
                        'hostel_id'=>$hostel->id,
                    ]);
                }else {
                    # code...
                    Activitie::find($key)->update([
                        'article'=>$value,
                    ]);
                }
            }
        }
       if (Request()->has('images')) {
        foreach (Request()->images as $value ) {
            $image=Image::create([
                'image'=>"test",
                'hostel_id'=>$hostel->id,
            ]);
            $image->update([
                'image' => $value->store('images', 'public'),
            ]);
         
        }
       }
        $hostel->activities=Hostel::find($data['id'])->activities;
        // $hostel->images=Hostel::find($data['id'])->images;
        return $hostel;
    }
}
