<?php

namespace App\Http\Controllers;

use App\Info;
use App\Header;
use App\Social;
use App\Mail\newMail;
use App\Rules\Captcha;
use App\Mail\sendEmail;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Session\Session;

class TazerzitController extends Controller
{
    public function __construct()
    { }
    public function hostel()
    {
        self::clearFlash();
        Request()->session()->flash('hostel', 'active');
        return view("tazerzit.hostel");
    }
    public function home()
    {
        self::clearFlash();
        Request()->session()->flash('home', 'active');
        $headers = Header::all();
        return view("tazerzit.index", ['headers' => $headers]);
    }
    public function menu()
    {
        self::clearFlash();
        Request()->session()->flash('menu', 'active');
        return view("tazerzit.menu");
    }
    public function about()
    {
        self::clearFlash();
        Request()->session()->flash('about', 'active');
        return view("tazerzit.about");
    }
    public function services()
    {
        self::clearFlash();
        Request()->session()->flash('services', 'active');
        return view("tazerzit.services");
    }
    public function contact()
    {
        self::clearFlash();
        Request()->session()->flash('contact', 'active');
        return view("tazerzit.contact");
    }

    public function getHeadears()
    {
        $headers = Header::all();
        return $headers;
    }
    public function addHeader()
    {
        // dd(Request()->all());

        $data = $this->validateHeader();
        // dd($data);
        $header = Header::create($data);
        Request()->image ? $this->updateImage($header) : '';

        return $header;
    }
    public function updateHeader(Request $request)
    {
        $data = $this->validateHeader();
        $header = Header::find(Request()->id);
        $header->update([
            'subheading' => $data['subheading'],
            'body' => $data['body'],
            'footer' => $data['footer'],
        ]);
        if (Request()->hasFile('image')) {
            $this->updateImage($header);
        }
        if ($header) {
            return $header;
        } else {
            return "fail";
        }
    }

    public function deleteHeader()
    {
        $id = json_decode(Request()->getContent(), true);
        Header::find($id)->delete();
        return $id;
    }

    public function updateImage($header)
    {
        if (Request()->hasFile('image')) {
            $header->update([
                'image' => Request()->image->store('images', 'public'),
            ]);
        }
    }
    public function validateHeader()
    {
        $data = Request()->validate([
            'subheading' => 'required',
            'body' => 'required',
            'footer' => 'required',
        ]);
        if (Request()->hasFile('image')) {
            Request()->validate([
                'image' => 'file|image'
            ]);
        }
        return $data;
    }

    public function validation()
    {
        return Request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
    }

    public static function clearFlash()
    {
        Request()->session()->remove('hostel');
        Request()->session()->remove('home');
        Request()->session()->remove('menu');
        Request()->session()->remove('about');
        Request()->session()->remove('services');
        Request()->session()->remove('contact');
        Request()->session()->remove('Reservation');
    }

    public static function sendSMS($data)
    {
        $basic  = new \Nexmo\Client\Credentials\Basic('54b7dce6', 'MF0jDEVKszEmbEeZ');
        $client = new \Nexmo\Client($basic);
        $txt = 'Hello Mr : '.  $data['nom'] . ' Thank You for Your booking, We are ready to serve you at anytime, We Wish You a Good Day With Good Thought';
        $phone= $data['phone'];
        $phone= str_split($phone);
        unset($phone[0]);
        $phone= '121'.implode($phone);
        $message = $client->message()->send([
            'to' => '212622643924',
            'from' => 'Restaurant '.env('APP_NAME'),
            'text' => $txt
        ]);
    }

    public function social()
    {
        $data = Social::all();
        return $data;
    }
    public function socialUpdate()
    {
        // dd(Request()->all());
        $data = Request()->validate([
            'nom' => 'required',
            'link' => 'required',
        ]);
        $social = Social::find(Request()->id);
        $social->update($data);
        return $social;
    }
    public function email()
    {
        $data = Request()->validate([
            'nom' => "required",
            'subject' => "required",
            'message' => "required",
            'email' => "required|email",
            'g-recaptcha-response' => new Captcha(),
        ]);
        Mail::send(new sendEmail($data));
        Mail::send(new newMail($data));

        return "Thank you for Sending Your Message";
    }

    public function getInfos()
    {
        $info = Info::first();
        return $info;
    }
    public function setInfos(Request $request, $id)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'location' => 'required',
            'story' => 'required',
            'menu' => 'required',
            'about' => 'required',
            'openDays' => 'required',
            'time' => 'required',
            'phoneText' => 'required',
            'adress' => 'required',
        ]);
        $info = Info::first();
        $info->update($data);
        return $info;
    }
}
