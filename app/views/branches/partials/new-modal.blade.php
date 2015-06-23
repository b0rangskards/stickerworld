<div class="modal fade modal-form" id="newBranchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">New Branch</h4>
            </div>
            <div class="modal-body">
                {{-- branch name, contact_no, address, map(lat,lng) --}}
                        <div class="container-fluid">
                            <div class="row">

                            <div class="col-md-12">
                                <div class="col-md-6 reset-padding">
                                    <div class="pull-left">
                                        <div class="pulsate-map-marker" id="new-branch-map"></div>
                                        <span><i>Drag marker to set branch location</i></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    {{ Form::open(['route' => 'new_branch_path', 'id' => 'new-branch-form', 'role' => 'form']) }}

                                        <div class="form-group">
                                            {{ Form::label('name', 'Branch', ['class' => 'control-label']) }}
                                            {{ Form::text('name', null,
                                               ['class'      => 'form-control',
                                               'placeholder' => 'eg. Manila',
                                               'autofocus'   => 'autofocus',
                                               'required'    => 'required']) }}
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            {{ Form::label('address', 'Address', ['class' => 'control-label']) }}
                                            {{ Form::text('address', null,
                                               ['class'      => 'form-control',
                                               'placeholder' => 'eg. 167 - Samploc St. Manila',
                                               'required'    => 'required']) }}
                                             <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            {{ Form::label('contact_no', 'Contact No.', ['class' => 'control-label']) }}
                                            {{ Form::text('contact_no', null,
                                               ['class'      => 'form-control',
                                               'placeholder' => 'eg. +032 2330009',
                                               'required'    => 'required']) }}
                                            <p class="help-block"></p>
                                        </div>

                                        {{ Form::hidden('lat', null, ['id' => 'new-branch-lat-hidden']) }}
                                        {{ Form::hidden('lng', null, ['id' => 'new-branch-lng-hidden']) }}

                                    {{ Form::close() }}
                                </div>
                            </div>

                            </div>
                        </div>

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button class="btn btn-primary modalSubmitBtnForm" type="button">Save changes</button>
            </div>
        </div>
    </div>
</div>

