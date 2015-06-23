<div class="col-md-4 col-sm-12 branch-thumbnail">
    {{--<div class="panel panel-{{$headingColor[array_rand($headingColor)]}}">--}}
    <div class="panel panel-@if($index===0){{'info'}}@elseif($index===1){{'success'}}@elseif($index===2){{'danger'}}@endif">
        <div class="panel-heading">
            {{ $branch->name }}
            <span class="simple-tools pull-right">

                {{-- phone and address Tooltips --}}
                <a class="fa fa-phone tooltips" href="javascript:;" data-placement="top" data-toggle="tooltip" data-original-title="{{$branch->contact_no}}"></a>
                <a class="fa fa-map-marker tooltips" href="javascript:;" data-placement="top" data-toggle="tooltip" data-original-title="{{$branch->address}}"></a>

                {{-- Update Branch Button --}}
                <a class="update-branch-btn"
                   href="#updateBranchModal"
                   data-toggle="modal"
                   data-id="{{ $branch->id }}" >
                    <i class="fa fa-pencil tooltips"
                    data-toggle="modal"
                    data-placement="top"
                    data-original-title="Update branch information">
                    </i>
                </a>

                {{-- Delete Branch Button --}}
                {{ Form::open(['route' => ['close_branch_path', $branch->id], 'method' => 'DELETE', 'role' => 'form', 'data-remote-delete-record']) }}
                {{ Form::button('',
                    ['type' => 'submit',
                    'class' => 'fa fa-times tooltips',
                    'data-placement' => 'top',
                    'data-toggle' => 'tooltip',
                    'data-original-title' => 'Cancel Branch',
                    'data-confirm' => 'Are you sure?',
                    'data-confirm-yes' => 'Yes, close it!']
                    )}}
                {{ Form::close()}}
            </span>
        </div>

        <div class="panel-body branches-panel-map-grid pulsate-map-marker" data-lat='{{$branch->lat}}' data-lng='{{$branch->lng}}'>
        </div>
    </div>
</div>