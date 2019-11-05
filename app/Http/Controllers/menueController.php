<?php

namespace App\Http\Controllers;

use App\Dessert;
use App\Drink;
use App\Maindish;
use App\Starter;
use Illuminate\Http\Request;

class menueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index',"getMenu", 'getAllMenu']]);
    }
    public function index()
    {
        $data=[];
        $data['Desserts']=Dessert::all();
        $data['Drinks']=Drink::all();
        $data['Maindishs']=Maindish::all();
        $data['Starters']=Starter::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=Request()->validate([
            'nom'=>'required',
            'prix'=>'required',
            'description'=>'required',
            'display'=>'required',
        ]);
        $model=null;
        switch (Request()->type) {
            case 'STARTER':
            $model=Starter::create($data);
            break;
            case 'MAIN DISH':
            $model=Maindish::create($data);
            break;
            case 'DESSERT':
            $model=Dessert::create($data);
            break;
            case 'DRINK':
            $model=Drink::create($data);
            break;
        }
        if (Request()->has('image')) {
            $model->update([
                'image' => Request()->image->store('images', 'public'),
            ]);
        }

        return $model;
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
        //
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        switch (Request()->source['type']) {
            case 'STARTERS':
                Starter::find(Request()->source['id'])->delete();
            break;
            case 'MAIN DISHS':
                Maindish::find(Request()->source['id'])->delete();
            break;
            case 'DESSERTS':
                Dessert::find(Request()->source['id'])->delete();
            break;
            case 'DRINKS':
                Drink::find(Request()->source['id'])->delete();
            break;
        }
        return "success";
        
    }
    public function updatealt()
    {
        $model=null;
        $data=Request()->validate([
            'nom'=>'required',
            'prix'=>'required',
            'description'=>'required',
            'display'=>'required',
        ]);
        switch (Request()->type) {
            case 'STARTER':
            $model=    Starter::find(Request()->id);
            break;
            case 'MAIN DISH':
            $model=    Maindish::find(Request()->id);
            break;
            case 'DESSERT':
            $model=    Dessert::find(Request()->id);
            break;
            case 'DRINK':
            $model=    Drink::find(Request()->id);
            break;
        }
        $model->update($data);
        if (Request()->has('image')) {
            $model->update([
                'image' => Request()->image->store('images', 'public'),
            ]);
        }

        return $model;
    }

    public function getMenu($type)
    {
        $model=null;
        switch ($type) {
            case 'STARTER':
            $model=    Starter::where('display',1)->get()->take(4);
            break;
            case 'MAIN DISH':
            $model=    Maindish::where('display',1)->get()->take(4);
            break;
            case 'DESSERT':
            $model=    Dessert::where('display',1)->get()->take(4);
            break;
            case 'DRINK':
            $model=    Drink::where('display',1)->get()->take(4);
            break;
        }
        return $model;
    }

    public function getAllMenu($many)
    {
        $data = [];
        $data['Desserts'] = Dessert::where('display',1)->get()->take($many);
        $data['Drinks'] = Drink::where('display',1)->get()->take($many);
        $data['Maindishs'] = Maindish::where('display',1)->get()->take($many);
        $data['Starters'] = Starter::where('display',1)->get()->take($many);
        return $data;
    }

    
}
