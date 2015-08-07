@extends('layouts.master')

@section('content')

@include('layouts.partials.breadcrumbs', array('headerTitle' => $headerTitle, 'subTitle' => $subTitle, 'currentPage' => $currentPage))

    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">

                {{-- Show Flash Message here --}}
                @include('flash::message')

                    <div>
                        {{-- Display Errors Here --}}
                        {{--@include('layouts.partials.errors')--}}

                        <div class="form">
                            {{ Form::model($item, ['route' => 'update_item_index_path',
                                           'method' => 'PUT',
                                           'files'  => true,
                                           'class'  => 'form-horizontal',
                                           'role'   => 'form']) }}

                            {{Form::hidden('id')}}

                            {{-- Item Photo --}}
                            <div class="form-group col-md-4 col-md-offset-1">
                                 <div class="col-md-8 col-md-offset-3">
                                       <div class="fileupload fileinput-new margin-bottom-10 upload-item-photo-group" data-provides="fileinput">
                                           <div class="fileinput-new thumbnail">
                                               <img src="/images/no_img.png" alt=""/>
                                           </div>
                                           <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                           <div class="col-md-offset-1 upload-btns">
                                                      <span class="btn btn-round btn-white btn-file">
                                                          <span class="fileinput-new">Upload Item Photo</span>
                                                          <span class="fileinput-exists"><i class="fa fa-paperclip"></i></span>
                                                          {{Form::file('image', ['class' => 'default'])}}
                                                      </span>
                                                <a href="#" class="btn btn-round btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i></a>
                                           </div>
                                       </div>
                                 </div>
                            </div>


                               <div class="col-md-7">

                                    {{-- Supplier --}}
                                     <div class="form-group {{!$errors->has('supplier_id') ?:'has-error'}}">
                                       {{ Form::label('supplier_id', 'Supplier', ['class' => 'control-label col-md-3']) }}
                                       <div class="col-md-6 {{!$errors->has('supplier_id') ?:'has-error'}}">
                                              {{ Form::select('supplier_id', $suppliers, null,
                                                 ['class'      => 'form-control',
                                                 'required'    => 'required']) }}
                                            <p class="help-block">{{DataHelper::arrayToString($errors->get('supplier_id'))}}</p>
                                       </div>
                                     </div>

                                    {{--Item Name--}}
                                     <div class="form-group {{!$errors->has('name') ?:'has-error'}}">
                                          {{ Form::label('name', 'Item Name', ['class' => 'control-label col-md-3']) }}
                                          <div class="col-md-6">
                                              {{ Form::text('name', null,
                                              ['class' => 'form-control',
                                              'required' => 'required']) }}
                                              <p class="help-block">{{DataHelper::arrayToString($errors->get('name'))}}</p>
                                          </div>
                                     </div>

                                    {{-- Item Type --}}
                                     <div class="form-group {{!$errors->has('type') ?:'has-error'}}">
                                       {{ Form::label('type', 'Type', ['class' => 'control-label col-md-3']) }}
                                       <div class="col-md-6 {{!$errors->has('type') ?:'has-error'}}">
                                              {{ Form::select('type', $itemTypes, null,
                                                 ['class'      => 'form-control',
                                                 'id'          => 'select-item-type',
                                                 'required'    => 'required']) }}
                                            <p class="help-block">{{DataHelper::arrayToString($errors->get('type'))}}</p>
                                       </div>
                                     </div>

                                     {{-- Unit of Measure --}}
                                     <div class="form-group {{!$errors->has('unit_of_measure') ?:'has-error'}}">
                                         {{ Form::label('unit_of_measure', 'Unit Of Measure', ['class' => 'col-md-3 control-label']) }}
                                         <div class="col-md-6 {{!$errors->has('unit_of_measure') ?:'has-error'}}">
                                             {{ Form::select('unit_of_measure', $unitOfMeasures, null,
                                                ['class'      => 'form-control',
                                                'id'          => 'select-item-um',
                                                'required'    => 'required']) }}
                                              <p class="help-block">{{DataHelper::arrayToString($errors->get('unit_of_measure'))}}</p>
                                         </div>
                                     </div>

                                    {{-- Unit Price --}}
                                     <div class="form-group {{!$errors->has('unit_price') ?:'has-error'}}">
                                        {{ Form::label('unit_price', 'Unit Price', ['class' => 'col-md-3 control-label']) }}
                                            <div class="col-md-6 {{!$errors->has('unit_price') ?:'has-error'}}">
                                            {{ Form::text('unit_price', null,
                                               ['class'      => 'form-control',
                                               'required'    => 'required']) }}
                                               <p class="help-block">{{DataHelper::arrayToString($errors->get('unit_price'))}}</p>
                                        </div>
                                    </div>

                                    {{-- Details --}}
                                    <div class="form-group {{!$errors->has('details') ?:'has-error'}}">
                                        {{ Form::label('details', 'Details', ['class' => 'col-md-3 control-label']) }}
                                        <div class="col-md-6 {{!$errors->has('details') ?:'has-error'}}">
                                            {{ Form::textarea('details', null,
                                               ['class'  => 'form-control',
                                               'placeholder' => 'Optional',
                                               'rows'    => '2']) }}
                                             <p class="help-block">{{DataHelper::arrayToString($errors->get('details'))}}</p>
                                        </div>
                                    </div>

                                {{-- Remarks --}}
                                <div class="form-group {{!$errors->has('remarks') ?:'has-error'}}">
                                    {{ Form::label('remarks', 'Remarks', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-6 {{!$errors->has('remarks') ?:'has-error'}}">
                                        {{ Form::textarea('remarks', null,
                                           ['class'      => 'form-control',
                                           'placeholder' => 'You can add other details here such as Size, Color, etc. Optional.',
                                           'rows'    => '2']) }}
                                         <p class="help-block">{{DataHelper::arrayToString($errors->get('remarks'))}}</p>
                                    </div>
                                </div>

                            </div>

                            <hr class="col-md-11">

                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-6">
                                    {{ Form::submit('Update Item', ['class' => 'btn btn-primary']) }}
                                    {{ HTML::link(URL::route('items_index_path'), 'Go Back', ['class' => 'btn btn-default']) }}
                                </div>
                            </div>

                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>




@stop