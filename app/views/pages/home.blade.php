@extends('layouts.master')

@section('content')

    @include('flash::message')

    <div class="jumbotron text-center">
        <h2>Welcome to Stickerworld!</h2>
        <h1>{{ !is_null($currentUser->employee) ? $currentUser->employee->firstname : $currentUser->present()->prettyUsername }}</h1>
    </div>

@stop
