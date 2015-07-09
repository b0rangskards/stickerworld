@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))

    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                  <div class="panel-body">

                    @include('access_control.partials.content')

                  </div>

            </section>
        </div>
    </div>

@stop