@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => 'Users', 'subTitle' => 'Management','currentPage' => 'Manage Users'))

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

                        <table class="display table table-bordered table-striped dynamic-table">
                            <thead>
                                <tr>
                                    @foreach($columns as $column)
                                        {{ "<th class='col-md-{$column["width"]}'>". $column['column'] .'</th>' }}
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                           <span class="weight600">{{$user->username}}</span>
                                        </td>
                                        <td>
                                            @if ($user->role->id === 1)
                                            {{
                                                '<span class="badge bg-info">',$user->role->name,'</span>'
                                            }}
                                            @elseif ($user->role->id === 2)
                                            {{
                                                '<span class="badge bg-success">',$user->role->name,'</span>'
                                            }}
                                            @elseif ($user->role->id === 3)
                                            {{
                                                '<span class="badge bg-warning">',$user->role->name,'</span>'
                                            }}
                                            @elseif ($user->role->id === 4)
                                            {{
                                                '<span class="badge bg-primary">',$user->role->name,'</span>'
                                            }}
                                            @endif
                                        </td>
                                        <td>
                                            <span class="text-muted">{{$user->present()->lastLoginHuman }}</span>
                                        </td>
                                        <td>{{
                                            $user->recstat === 'A' ?
                                                '<span class="badge bg-success">Yes</span>'
                                                :
                                                '<span class="badge bg-danger">No</span>'
                                            }}
                                        </td>
                                        <td class="action-btn">
                                            {{-- Shows when User is not activated --}}
                                            @unless( empty($user->activation_code))

                                                {{ Form::open(['data-remote-resendmail', 'route' => 'resend_email_user_path', 'class' => 'inline-block' ]) }}
                                                    {{ Form::hidden('user_id', $user->id) }}
                                                    {{ Form::button('<i class="fa fa-paper-plane-o"></i>', [
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-default btn-xs tooltips resend-email',
                                                        'data-placement' => 'top',
                                                        'data-toggle' => 'tooltip',
                                                        'title' => 'Resend Email'
                                                    ]) }}
                                                {{ Form::close() }}

                                            @endunless

                                            {{-- View Detail action --}}
                                            <a href="" class="btn btn-success btn-xs tooltips"
                                            data-toggle="tooltip" data-placement="top" title="View Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            {{-- Deactivate User action --}}
                                            @if( $user->recstat == 'A' && is_null($user->activation_code) )

                                                {{ Form::open(['data-remote-deactivate', 'method' => 'PUT',
                                                'route' => 'deactivate_user_path',
                                                'class' => 'inline-block' ]) }}
                                                    {{ Form::hidden('userId', $user->id) }}
                                                    {{ Form::button('<i class="fa fa-times"></i>', [
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs tooltips deactivate-user',
                                                        'data-placement' => 'top',
                                                        'data-toggle' => 'tooltip',
                                                        'title' => 'Deactivate User',
                                                        'data-confirm' => 'Are you sure?',
                                                        'data-confirm-yes' => 'Yes, deactivate it!'
                                                    ]) }}
                                                {{ Form::close() }}

                                            @elseif(  $user->recstat == 'I' && is_null($user->activation_code) )

                                                {{ Form::open(['data-remote-reactivate', 'method' => 'PUT',
                                                'route' => 'reactivate_user_path',
                                                'data-remote-success-message' => 'Account Re-Activated!',
                                                'class' => 'inline-block reactivate-user-form' ]) }}
                                                    {{ Form::hidden('userId', $user->id) }}
                                                    {{ Form::button('<i class="fa fa-power-off"></i>', [
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-info btn-xs tooltips reactivate-user',
                                                        'data-placement' => 'top',
                                                        'data-toggle' => 'tooltip',
                                                        'title' => 'Re-Activate User',
                                                        'data-confirm' => 'Are you sure?',
                                                        'data-confirm-yes' => 'Yes, reactivate it!'
                                                    ]) }}
                                                {{ Form::close() }}

                                            @endif

                                            {{-- Loader here --}}
                                            <div class="ui active small inline loader" style="display:none"></div>

                                            <span class="loader-label display-none">
                                                <span>Email Sent!</span>
                                            </span>
                                        </td>

                                    </tr>
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