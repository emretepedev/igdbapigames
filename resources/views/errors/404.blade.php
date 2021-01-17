@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-center items-center" style="height: 750px">
            <div>
                {{ Str::title(str_replace('-', ' ', Request::segment(!Request::segment(2) ? 1 : 2))) }} was not found in the database!
            </div>
        </div>
    </div>
@endsection