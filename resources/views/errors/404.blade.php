@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-center items-center" style="height: 600px">
            <div>
                {{ \Illuminate\Support\Str::title(str_replace('-', ' ', \Illuminate\Support\Facades\Request::segment(1))) }} was not found in the database!
            </div>
        </div>
    </div>
@endsection