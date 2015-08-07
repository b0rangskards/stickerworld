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
                            {{ Form::open(['route' => 'new_supplier_path',
                                           'class' => 'form-horizontal form-supplier',
                                           'role'  => 'form',
                                           'novalidate' => 'novalidate']) }}

                                 <div class="form-group {{!$errors->has('name') ?:'has-error'}}">
                                      {{ Form::label('name', 'Supplier', ['class' => 'control-label col-md-3']) }}
                                      <div class="col-md-6">
                                          {{ Form::text('name', null, ['class' => 'form-control']) }}
                                          <p class="help-block">{{DataHelper::arrayToString($errors->get('name'))}}</p>
                                      </div>
                                 </div>

                                 <div class="form-group {{!$errors->has('supplier_type') ?:'has-error'}}">
                                   {{ Form::label('supplier_type', 'Supplier Type', ['class' => 'control-label col-md-3']) }}
                                   <div class="col-md-6 {{!$errors->has('supplier_type') ?:'has-error'}}">
                                       <div class="btn-group" data-toggle="buttons">
                                           <select name="supplier_type" class="form-control">
                                               <option value="" disabled selected>-- Please Select Supplier Type --</option>
                                               @foreach($supplierTypes as $value => $type)
                                                  <option value="{{$value}}" {{Input::old('supplier_type')==$value?'selected':''}} >{{$type}}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('supplier_type'))}}</p>
                                   </div>
                                 </div>

                               <div class="form-group {{!$errors->has('address') ?:'has-error'}}">
                                    {{ Form::label('address', 'Address', ['class' => 'control-label col-md-3']) }}
                                    <div class="col-md-6">
                                        {{Form::textarea('address', null, [
                                        'class' => 'form-control',
                                        'required' => 'required',
                                        'rows'   => '3'
                                        ])}}
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('address'))}}</p>
                                    </div>
                               </div>

                               <div class="form-group {{!$errors->has('email') ?:'has-error'}}">
                                    {{ Form::label('myemail', 'Email', ['class' => 'control-label col-md-3']) }}
                                    <div class="col-md-6">
                                        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'myemail']) }}
                                        <p class="help-block">{{DataHelper::arrayToString($errors->get('email'))}}</p>
                                    </div>
                               </div>

                               <div class="form-group supplier-form-contacts-group">
                                    {{ Form::label('contact_no[]', 'Contact No.', ['class' => 'control-label col-md-3']) }}
                                    <div class="contact-group">
                                        <div class="col-md-4 contact-no-container {{!$errors->has('contact_no') ?:'has-error'}}">
                                            <input type="text" name="contact_no[]" class="form-control"/>
                                             <p class="help-block">{{DataHelper::arrayToString($errors->get('contact_no'))}}</p>
                                        </div>
                                        <div class="col-md-2 contact-type-container {{!$errors->has('contact_type') ?:'has-error'}}">
                                            <select name="contact_type[]" class="form-control contact-type-select">
                                                @foreach($contactTypes as $type)
                                                    <option value="{{$type}}">{{$type}}</option>
                                                @endforeach
                                            </select>
                                             <p class="help-block">{{DataHelper::arrayToString($errors->get('contact_type'))}}</p>
                                        </div>
                                        <p class="help-block"></p>
                                        <button class="btn btn-success btn-add-contact" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                               </div>

                               <hr/>

                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-6">
                                        {{ Form::submit('Add Supplier', ['class' => 'btn btn-primary', 'id' => 'btn-add-supplier']) }}
                                        {{ HTML::link(URL::route('suppliers_index_path'), 'Go Back', ['class' => 'btn btn-default']) }}
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