    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                  <div class="panel-body">
                      <div class="adv-table">

                        {{-- Primary Buttons here--}}
                        <div class="clearfix">
                            <div class="btn-group">
                                <button type="button" data-toggle="modal" data-target="#newItemModal" class="btn btn-primary new-item">New Item</button>
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

                        <table class="display table table-striped table-condensed dynamic-table" id="item-table">
                            <thead>
                                <tr>
                                    @foreach($itemColumns as $column)
                                        {{ "<th class='col-md-{$column["width"]}'>". $column['column'] .'</th>' }}
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                                @foreach($items as $item)
                                <tr data-item-id="{{$item->id}}">
                                    <td>
                                        <a href="#viewItemModal" data-toggle="modal"></a>
                                        <img src="{{$item->present()->imageUrl}}" height="60" alt=""/>
                                    </td>
                                    <td>
                                        {{$item->present()->prettyName}}
                                    </td>
                                    <td>
                                        {{$item->present()->prettyDetails}}
                                    </td>
                                    <td>
                                        {{$item->present()->prettyType}}
                                    </td>
                                    <td>
                                        {{$item->present()->prettyUm}}
                                    </td>
                                    <td>
                                        {{$item->present()->prettyPrice}}
                                    </td>
                                    <td>
                                        {{$item->present()->prettyRemarks}}
                                    </td>
                                    <td class="rowlink-skip">

                                        {{-- Show Item --}}
                                        <button type="button"
                                        class="btn btn-success btn-xs"
                                        data-toggle="modal"
                                        data-target="#viewItemModal">
                                            <i class="fa fa-eye tooltips"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="View Detail"
                                            style="color:whitesmoke;"></i>
                                        </button>

                                        {{-- Update Item --}}
                                        <button class="btn btn-info btn-xs tooltips"
                                        data-toggle="modal"
                                        data-target="#updateItemModal">
                                            <i class="fa fa-pencil tooltips"
                                               data-toggle="modal"
                                               data-placement="top"
                                               data-original-title="Update Item information"
                                               style="color:whitesmoke;">
                                            </i>
                                        </button>

                                        {{-- Delete Item --}}
                                        {{ Form::open(['method' => 'DELETE',
                                        'route' => ['delete_item_path', $item->id],
                                        'class' => 'inline-block',
                                        'role' => 'form',
                                        'data-remote-delete-record']) }}
                                        {{ Form::button('<i class="fa fa-times"></i>', [
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs tooltips delete-item-btn',
                                        'data-placement' => 'top',
                                        'data-toggle' => 'tooltip',
                                        'title' => 'Delete Item',
                                        'data-confirm' => 'Are you sure you want to delete item?',
                                        'data-confirm-yes' => 'Yes, Delete Item!'
                                        ]) }}
                                        {{ Form::close() }}

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
