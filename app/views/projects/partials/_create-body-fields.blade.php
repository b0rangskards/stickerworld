    {{-- Invoice Table --}}
    <table class="table table-invoice">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Item Description</th>
            <th class="text-center">QTY</th>
            <th class="text-center">Unit</th>
            <th class="text-center">Size / Color</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Total</th>
            <th class="text-center"></th>
        </tr>
        </thead>
        <tbody class="material-cost-body">
        <tr>
            <td colspan="8" class="row-header">Material Cost</td>
        </tr>
        @foreach(CartMaterials::getOrdinaryMaterials() as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td class="text-center">
                <span>
                    <input data-id="{{$item->id}}" type="number" min="0" value="{{$item->quantity}}" class="material-qty-input form-control"/>
                </span>
            </td>
            <td class="text-center">{{$item->unit}}</td>
            <td class="text-center">{{$item->remarks}}</td>
            <td class="text-center">PHP {{number_format($item->price, 2)}}</td>
            <td class="text-center">PHP <span class="line-total-label">{{number_format($item->total(false),2)}}</span></td>
            <td class="text-center">
                {{Form::open(['route'  => ['cancel_project_material_path', $item->id],
                'method' => 'DELETE',
                'class' => 'inline-block',
                'role' => 'form',
                'data-remote-delete-record'])
                }}
                {{ Form::button('<i class="fa fa-times"></i>', [
                'type' => 'submit',
                'data-confirm' => 'Are you sure you want to remove material?',
                'data-confirm-yes' => 'Yes, Remove Material!'
                ]) }}
                {{Form::close()}}
            </td>
        </tr>
        @endforeach
        </tbody>
        <tbody class="standard-materials-body">
            <tr>
                <td colspan="8" class="row-header">Standard Materials</td>
            </tr>
            @foreach(CartMaterials::getStandardMaterials() as $material)
                <tr>
                    <td>{{$material->id}}</td>
                    <td>{{$material->name}}</td>
                    <td class="text-center">
                        <span>
                            <input data-id="{{$material->id}}" type="number" min="0" value="{{$material->quantity}}" class="material-qty-input form-control"/>
                        </span>
                    </td>
                    <td class="text-center">{{$material->unit}}</td>
                    <td class="text-center">{{$material->remarks}}</td>
                    <td class="text-center">PHP {{number_format($material->price, 2)}}</td>
                    <td class="text-center">PHP <span class="line-total-label">{{number_format($material->total(false),2)}}</span></td>
                    <td class="text-center">
                        {{Form::open(['route'  => ['cancel_project_material_path', $material->id],
                        'method' => 'DELETE',
                        'class' => 'inline-block',
                        'role' => 'form',
                        'data-remote-delete-record'])
                        }}
                        {{ Form::button('<i class="fa fa-times"></i>', [
                        'type' => 'submit',
                        'data-confirm' => 'Are you sure you want to remove material?',
                        'data-confirm-yes' => 'Yes, Remove Material!'
                        ]) }}
                        {{Form::close()}}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tbody class="labor-cost-body">
        <tr>
           <td colspan="8" class="row-header">Labor Cost</td>
        </tr>
        <tr class="second-header">
            <th>S/N</th>
            <th>Labor</th>
            <th>No. of Employees</th>
            <th>No. of Days</th>
            <th>Unit</th>
            <th>Rate</th>
            <th>Total</th>
            <th></th>
        </tr>
        @foreach(CartMaterials::getLabors() as $labor)
              <tr>
                  <td>{{$labor->id}}</td>
                  <td>{{$labor->name}}</td>
                  <td>
                      <span>
                          <input data-id="{{$labor->id}}" type="number" min="0" value="{{$labor->noOfEmp}}" class="no-of-emp-qty form-control"/>
                      </span>
                  </td>
                  <td>
                    <span>
                          <input data-id="{{$labor->id}}" type="number" min="0" value="{{$labor->noOfDays}}" class="no-of-days-qty form-control"/>
                    </span>
                  </td>
                  <td>{{$labor->unit}}</td>
                  <td>PHP {{number_format($labor->price, 2)}}</td>
                  <td>PHP <span class="line-total-label">{{number_format($labor->total(false),2)}}</span></td>
                  <td>
                      {{Form::open(['route'  => ['cancel_project_material_path', $labor->id],
                      'method' => 'DELETE',
                      'class' => 'inline-block',
                      'role' => 'form',
                      'data-remote-delete-record'])
                      }}
                      {{ Form::button('<i class="fa fa-times"></i>', [
                      'type' => 'submit',
                      'data-confirm' => 'Are you sure you want to remove labor cost?',
                      'data-confirm-yes' => 'Yes, Remove Labor Cost!'
                      ]) }}
                      {{Form::close()}}
                  </td>
              </tr>
        @endforeach
        </tbody>
        <tbody class="logistics-body">
        <tr>
            <td colspan="8" class="row-header">Mobilization, Freight and Handling</td>
        </tr>
        @foreach(CartMaterials::getLogistics() as $labor)
              <tr>
                  <td>{{$labor->id}}</td>
                  <td colspan="2">{{$labor->name}}</td>
                  <td >
                    <span>
                    <i class="fa fa-truck"></i>
                          <input data-id="{{$labor->id}}" type="number" min="0" value="{{$labor->quantity}}" class="logistics-qty-input form-control"/>
                    </span>
                  </td>
                  <td>{{$labor->unit}}</td>
                  <td>PHP {{number_format($labor->price, 2)}}</td>
                  <td>PHP <span class="line-total-label">{{number_format($labor->total(false),2)}}</span></td>
                  <td>
                      {{Form::open(['route'  => ['cancel_project_material_path', $labor->id],
                      'method' => 'DELETE',
                      'class' => 'inline-block',
                      'role' => 'form',
                      'data-remote-delete-record'])
                      }}
                      {{ Form::button('<i class="fa fa-times"></i>', [
                      'type' => 'submit',
                      'data-confirm' => 'Are you sure you want to remove labor cost?',
                      'data-confirm-yes' => 'Yes, Remove Labor Cost!'
                      ]) }}
                      {{Form::close()}}
                  </td>
              </tr>
        @endforeach
        </tbody>
    </table>
    {{-- End Invoice Table--}}

    {{-- Payment Method --}}
    <div class="row">
        <div class="col-md-5 col-xs-6 payment-method">
            <h4>Note: </h4>

            <p>Upon submission on the form. <br> Accountant will receive a copy of this and needs approval.</p>
        </div>
        <div class="col-md-5 col-xs-6 invoice-block pull-right">
            <ul class="unstyled amounts">
                <li>Sub - Total amount : PHP <span class="pull-right" id="sub-total-amount">{{number_format(CartMaterials::getTotalCost(false), 2)}}</span></li>
                <li>Contingencies({{Config::get('constants.CONTINGENCIES')}}%) : PHP <span class="pull-right" id="contingencies-amount">{{number_format(CartMaterials::getTotalCost()-CartMaterials::getTotalCost(false), 2)}}</span></li>
                <li class="grand-total">Total Cost : PHP <span class="pull-right" id="total-cost-amount">{{number_format(CartMaterials::getTotalCost(), 2)}}</span></li>

                <li class="total-cost">Total Standard Cost : PHP <span class="pull-right" id="standard-cost-amount">{{number_format(CartMaterials::getStandardTotalCost(), 2)}}</span></li>
            </ul>
        </div>
    </div>
    {{-- End Payment Method --}}

    <div id="bottom-loader" class="spinner hidden">
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>

    <div id="cost-generated-container" class="row hidden">
        <div class="col-md-5 col-xs-6  pull-right">
         <section id="cost-generated-section">
         </section>
        </div>
    </div>
    {{-- Invoice Buttons --}}
    <div class="text-center invoice-btn">
        <button type="button" id="submit-estimate-btn" class="btn btn-success btn-lg"><i class="fa fa-check"></i> Submit Estimation</button>
        <button type="button" class="btn btn-default btn-lg" id="generate-cost-estimates-btn">Generate Cost Estimates</button>
        <a href="invoice_print.html" target="_blank" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Print </a>
    </div>
{{-- End Invoice Buttons --}}
</div>