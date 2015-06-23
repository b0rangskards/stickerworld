@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))

    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                  <div class="panel-body">
                      <div class="adv-table">

                        {{-- Primary Buttons here--}}
                        <div class="clearfix">
                            <div class="btn-group">

                            {{ HTML::linkRoute('register_path', 'Register User', null, ['class' => 'btn btn-primary']) }}

                            </div>
                            <div class="btn-group pull-right">
                                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#">Print</a></li>
                                    <li><a href="#">Save as PDF</a></li>
                                    <li><a href="#">Export to Excel</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="space15"></div>

                        <table class="display table table-bordered table-striped dynamic-table users-table">
                            <thead>
                                <tr>
                                    @foreach($columns as $column)
                                        {{ "<th class='col-md-{$column["width"]}'>". $column['column'] .'</th>' }}
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $user)
                                    @include('users.partials.table-row')
                                @endforeach
                            </tbody>

                        </table>
                      </div>
                  </div>

            </section>
        </div>
    </div>


    {{--<h2>Users</h2>--}}

    {{--{{ HTML::linkRoute('register_path', 'Register User', null, ['class' => 'btn btn-default']) }}--}}

    {{--<ul>--}}
    {{--@foreach($users as $user)--}}
        {{--<li>{{$user->username}}</li>--}}
    {{--@endforeach--}}
    {{--</ul>--}}

@stop