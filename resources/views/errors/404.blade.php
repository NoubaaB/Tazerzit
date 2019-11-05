@extends('layouts.main')

@section('title',"Page Not Found | 404")
@section('content')

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404 pb-5">
            <h1>4<span>0</span>4</h1>
        </div>
        <p class="pt-5">
            <div class="pt-5">
                The page you are looking for might have been removed had its name changed or is temporarily unavailable.
            </div>
        </p>
        <a class="mt-5" href="{{route('home')}}">home page</a>
    </div>
</div>
@endsection