<div class="modal fade" id="updateItemModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Item</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                     <div class="col-md-12">
                        {{ Form::open(['route' => ['update_item_path', $supplier->id],
                          'class'   => 'form-horizontal',
                          'files'   => true,
                          'role'    => 'form',
                          'data-form-files-remote']) }}

                          {{Form::hidden('id')}}

                            {{-- Item Name --}}
                            <div class="form-group">
                                {{ Form::label('name', 'Item Name', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-8">
                                    {{ Form::text('name', null,
                                       ['class'      => 'form-control',
                                       'autofocus'   => 'autofocus',
                                       'required'    => 'required']) }}
                                     <p class="help-block"></p>
                                </div>
                            </div>

                            {{-- Item Type --}}
                            <div class="form-group">
                                {{ Form::label('type', 'Type', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-8">
                                    {{ Form::select('type', $itemTypes, null,
                                       ['class'      => 'form-control',
                                       'id'          => 'select-item-type',
                                       'required'    => 'required']) }}
                                     <p class="help-block"></p>
                                </div>
                            </div>

                            {{-- Unit of Measure --}}
                            <div class="form-group">
                                {{ Form::label('unit_of_measure', 'Unit Of Measure', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-8">
                                    {{ Form::select('unit_of_measure', $unitOfMeasures, null,
                                       ['class'      => 'form-control',
                                       'id'          => 'select-item-um',
                                       'required'    => 'required']) }}
                                     <p class="help-block"></p>
                                </div>
                            </div>

                            {{-- Unit Price --}}
                            <div class="form-group">
                                {{ Form::label('unit_price', 'Unit Price', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-8">
                                    {{ Form::text('unit_price', null,
                                       ['class'      => 'form-control',
                                       'required'    => 'required']) }}
                                     <p class="help-block"></p>
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="form-group">
                                {{ Form::label('details', 'Details', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-8">
                                    {{ Form::textarea('details', null,
                                       ['class'  => 'form-control',
                                       'placeholder' => 'Optional',
                                       'rows'    => '2']) }}
                                     <p class="help-block"></p>
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="form-group">
                                {{ Form::label('remarks', 'Remarks', ['class' => 'col-md-3 control-label']) }}
                                <div class="col-md-8">
                                    {{ Form::textarea('remarks', null,
                                       ['class'      => 'form-control',
                                       'placeholder' => 'You can add other details here such as Size, Color, etc. Optional.',
                                       'rows'    => '2']) }}
                                     <p class="help-block"></p>
                                </div>
                            </div>

                            {{-- Item Photo --}}
                            <div class="form-group">
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

                        {{ Form::close() }}
                     </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button class="btn btn-primary modalSubmitBtnForm" type="button">Save</button>
            </div>
        </div>
    </div>
</div>

