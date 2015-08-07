<div class="row center-block branch-thumbnail">
    <div class="prf-contacts-container col-xs-12 col-md-10 text-center">
        <div class="col-xs-4 col-md-5">
             <div class="prf-contacts">
                <h2> <span><i class="fa fa-building"></i></span> branch</h2>
                <div class="location-info">
                    <p><b>{{$branch->present()->prettyName}}</b></p>
                </div>
                 <h2> <span><i class="fa fa-map-marker"></i></span> location</h2>
                 <div class="location-info">
                     <p>{{$branch->present()->prettyAddress}}</p>
                 </div>
                 <h2> <span><i class="fa fa-phone"></i></span> contacts</h2>
                 <div class="location-info">
                     <p>Phone	: {{$branch->contact_no}}</p>
                 </div>
             </div>
             <div class="prf-buttons text-center">
                 {{-- Update Branch Button --}}
                 <span class="col-xs-6 col-sm-5 col-md-4 col-lg-3 col-lg-offset-3">
                     <a class="update-branch-btn btn btn-primary"
                        href="#updateBranchModal"
                        data-toggle="modal"
                        data-id="{{ $branch->id }}" >
                         Update
                     </a>
                  </span>
                 {{-- Delete Branch Button --}}
                 <span class="col-xs-6  col-sm-5 col-md-4 col-lg-3">
                 {{ Form::open(['route' => ['close_branch_path', $branch->id], 'method' => 'DELETE', 'class' => 'inline-block', 'role' => 'form', 'data-remote-delete-record']) }}
                 {{ Form::button('Close Branch',
                     ['type' => 'submit',
                     'class' => 'btn btn-white',
                     'data-confirm' => 'Are you sure?',
                     'data-confirm-yes' => 'Yes, close it!']
                     )}}
                 {{ Form::close()}}
                 </span>
             </div>
        </div>
        <div class="col-xs-4 col-md-3 col-md-offset-1">
             <div class="branches-panel-map-grid pulsate-map-marker" data-lat='{{$branch->lat}}' data-lng='{{$branch->lng}}'></div>
        </div>
     </div>
</div>