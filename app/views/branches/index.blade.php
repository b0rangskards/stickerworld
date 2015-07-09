@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                  <div class="panel-body" style="background-color: #F1F2F7;">
                        {{-- Primary Buttons here--}}
                        <div class="clearfix">
                            <div class="pull-left">

                            {{ HTML::link('#newBranchModal', 'New Branch',
                                ['id' => 'new-branch-btn',
                                'class' => 'btn btn-primary',
                                'data-toggle' => 'modal']) }}

                            @include('branches.partials.new-modal')
                            @include('branches.partials.update-modal')
                            </div>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>



                        <div class="clearfix margin-top-10">
                                {{--<div class="pull-left">--}}
                                    {{--<div class="dataTables_length">--}}
                                            {{--<label style="display:inline-block;">--}}
                                            {{--<select class="form-control" size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" style="display:inline-block;">--}}
                                                {{--<option value="10" selected="selected">10</option>--}}
                                                {{--<option value="25">25</option>--}}
                                                {{--<option value="50">50</option>--}}
                                                {{--<option value="100">100</option>--}}
                                            {{--</select>records per page</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                             <div class="col-md-4 pull-right reset-padding">
                                <div class="form-group">
                                 {{Form::open(['route' => 'branches_index_path', 'method' => 'GET', 'class' => 'form-horizontal', 'id' => 'search-branch-form', 'role' => 'form'])}}
                                      {{ Form::label('searchBranch', 'Search: ',['class'=>'col-md-2 control-label']) }}
                                            <div class="col-md-10 reset-padding-right">
                                            {{ Form::input('search', 'qbranch', null, ['class' => 'form-control', 'id' => 'search-branch-input']) }}
                                            </div>
                                     {{ Form::submit('',['class' => 'hidden', 'id' => 'search-branch-submit-btn']) }}
                                 {{Form::close()}}
                                 </div>
                             </div>

                        </div>


                  </div>
            </section>
        </div>
    </div>

        <div class="row">
            <div class="container">
                <div class="container-fluid">
                    {{--<div class="column">--}}
                        <div class="row col-md-offset-1">
                        @if($branches->count())
                            @foreach($branches as $index => $branch)
                                @include('branches.partials.branch-thumbnail')
                            @endforeach
                        @else
                            <div class="centering col-md-6 col-md-offset-5">
                                <h4 class="gen-case">No matching records found</h4>
                            </div>
                        @endif
                        </div>
                    {{--</div>--}}
                </div>
                {{ $branches->links() }}
            </div>
        </div>





@stop