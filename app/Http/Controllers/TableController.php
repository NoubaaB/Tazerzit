<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\TazerzitController;
use Symfony\Component\HttpFoundation\Session\Session;

class TableController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth',['except' => ['reserve']]);
    }

    public function index()
    {
        TazerzitController::clearFlash();
        Request()->session()->flash('Reservation', 'active');
        $data=Table::all();
        return view("tazerzit.table",$data);
    }
    public function destroy($id)
    {
        Table::find(Request()->source)->delete();
        return "success";
    }

    public function dataTables()
    {
        $data=Table::all();
        return $data;
    }

    public function reserve()
    {
        $data=Request()->validate([
            "lname"=>'required',
            "fname"=>'required',
            "date"=>'required',
            "time"=>'required',
            "phone"=>'required',
            "message"=>'required',
        ]);
        $table = Table::create([
            "lname"=>$data['lname'],
            "fname"=>$data['fname'],
            "date"=>$data['date'],
            "time"=>$data['time'],
            "phone"=>$data['phone'],
            "message"=>$data['message'],
        ]);
        $preData=[
            'nom'=> $data['lname'] . " " . $data['fname'],
            'phone'=> $data['phone'],
        ];
        TazerzitController::sendSMS($preData);
        return $table;
    }

}
