@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', [
'headerTitle' => $headerTitle,
'subTitle' => $subTitle,
'currentPage' => $currentPage
])
    <div class="row">

        {{-- Head Content --}}
        @include('employees.partials.head-show-employee')

        {{-- Body Content --}}
        @include('employees.partials.body-show-employee')

    </div>
@stop