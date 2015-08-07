                 {{-- Invoice To --}}
                 <div class="row invoice-to">
                     <div class="col-md-5 col-sm-6 pull-left">
                         <div class="row">
                             <div class="form-group">
                                <div class="col-md-4 col-sm-5 inv-label">Client</div>
                                <div class="col-md-8 col-sm-7">
                                   <span>{{$project->client->present()->prettyName}}</span>
                                </div>
                             </div>
                         </div>
                         <br>
                         <div class="row">
                             <div class="form-group">
                                 <div class="col-md-4 col-sm-5 inv-label">Project</div>
                                 <div class="col-md-8 col-sm-7">
                                    <span>{{$project->present()->prettyName}}</span>
                                 </div>
                             </div>
                         </div>
                         <br>
                         <div class="row">
                             <div class="form-group">
                                <div class="col-md-4 col-sm-5 inv-label">Location </div>
                                <div class="col-md-8 col-sm-7">
                                    <span>{{$project->present()->prettyLocation}}</span>
                                </div>
                             </div>

                         </div>
                         <br>
                         <div class="row">
                             <div class="form-group">
                                <div class="col-md-4 col-sm-5 inv-label">Sales Rep</div>
                                <div class="col-md-8 col-sm-7">
                                    <span>{{$project->salesrep->present()->shortFullName}}</span>
                                </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-5 col-sm-6 pull-right">
                         <div class="row">
                             <div class="form-group">
                                 <div class="col-md-4 col-sm-5 inv-label">Date</div>
                                 <div class="col-md-8 col-sm-7">
                                    <span>{{$project->present()->prettyProjectDate}}</span>
                                 </div>
                             </div>
                         </div>
                         <br>
                         <div class="row">
                             <div class="form-group">
                                 <div class="col-md-4 col-sm-5 inv-label">Deadline</div>
                                 <div class="col-md-8 col-sm-7">
                                    <span>{{$project->present()->prettyDeadline}}</span>
                                 </div>
                             </div>
                         </div>
                         <br>
                         <div class="row">
                             <div class="form-group">
                                 <div class="col-md-4 col-sm-5 inv-label">Lead Time</div>
                                 <div class="col-md-8 col-sm-7">
                                    <span>{{$project->present()->prettyLeadTime}}</span>
                                 </div>
                             </div>
                         </div>
                         <br>
                         <div class="row">
                            <div class="form-group">
                                <div class="col-md-4 col-sm-5 inv-label">Estimator</div>
                                <div class="col-md-8 col-sm-7">
                                    <span>{{$project->estimator->present()->shortFullName}}</span>
                                </div>
                            </div>
                         </div>
                     </div>
                 </div>
                 {{-- End Invoice To --}}


                <hr/>

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
                         </tr>
                         </thead>
                         <tbody class="material-cost-body">
                         <tr>
                             <td colspan="8" class="row-header">Material Cost</td>
                         </tr>
                         @foreach($projectItems as $projectItem)
                         <tr>
                             <td>{{$projectItem->item->id}}</td>
                             <td>{{$projectItem->item->present()->prettyName}}</td>
                             <td>{{$projectItem->quantity}}</td>
                             <td>{{$projectItem->item->present()->prettyUm}}</td>
                             <td>{{$projectItem->item->present()->prettyRemarks}}</td>
                             <td>{{$projectItem->present()->prettyPrice}}</td>
                             <td>{{$projectItem->present()->prettyLineTotal}}</td>
                         </tr>
                         @endforeach
                         </tbody>
                         <tbody class="standard-materials-body">
                             <tr>
                                 <td colspan="8" class="row-header">Standard Materials</td>
                             </tr>
                             @foreach($standardMaterials as $material)
                                 <tr>
                                     <td>{{$material->item->id}}</td>
                                     <td>{{$material->item->present()->prettyName}}</td>
                                     <td>{{$material->quantity}}</td>
                                     <td>{{$material->item->present()->prettyUm}}</td>
                                     <td>{{$material->item->present()->prettyRemarks}}</td>
                                     <td>{{$material->present()->prettyPrice}}</td>
                                     <td>{{$material->present()->prettyLineTotal}}</td>
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
                         </tr>
                         @foreach($projectLabors as $labor)
                               <tr>
                                   <td>{{$labor->id}}</td>
                                   <td>{{$labor->utility->present()->prettyType}}</td>
                                   <td>{{$labor->no_of_emp}}</td>
                                   <td>{{$labor->no_of_days}}</td>
                                   <td>STAFF</td>
                                   <td>{{$labor->present()->prettyRate}}</td>
                                   <td>{{$labor->present()->prettyLineTotal}}</td>
                               </tr>
                         @endforeach
                         </tbody>
                         <tbody class="logistics-body">
                         <tr>
                             <td colspan="8" class="row-header">Mobilization, Freight and Handling</td>
                         </tr>
                         @foreach($projectLogistics as $logistics)
                               <tr>
                                   <td>{{$logistics->id}}</td>
                                   <td colspan="2">{{$logistics->utility->present()->prettyType}}</td>
                                   <td>{{$logistics->no_of_deliveries}}</td>
                                   <td>LOT</td>
                                   <td>{{$logistics->present()->prettyRate}}</td>
                                   <td>{{$logistics->present()->prettyLineTotal}}</td>
                               </tr>
                         @endforeach
                         </tbody>
                     </table>
                     {{-- End Invoice Table--}}

                     {{-- Payment Method --}}
                     <div class="row">
                         <div class="col-md-5 col-xs-6 invoice-block pull-right">
                             <ul class="unstyled amounts">
                                 <li>Sub - Total amount : PHP <span class="pull-right">{{$subTotalCost}}</span></li>
                                 <li>Contingencies({{$contingencies}}%) : PHP <span class="pull-right">{{$contingenciesAmount}}</span></li>
                                 <li class="total-cost">Total Cost : PHP <span class="pull-right">{{$totalCost}}</span></li>

                                 <li class="total-cost">Total Standard Cost : PHP <span class="pull-right">{{$standardMaterialsCost}}</span></li>
                             </ul>
                         </div>
                     </div>


                         <div class="row">
                             <div class="col-md-8 invoice-block pull-right">
                                <ul class="unstyled amounts">
                                     <li class="grand-total">Grand Total Cost : <span style="color:grey">TOTAL COST X {{$costMultiplier}} + SC + VAT</span> PHP <span class="pull-right">{{$grandTotalCost}}</span></li>
                                </ul>
                             </div>
                         </div>

                     {{-- End Payment Method --}}
