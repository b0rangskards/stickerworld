                 {{-- Invoice To --}}
                 <div class="row invoice-to">
                     <div class="col-md-5 col-sm-6 pull-left">
                         <div class="row">
                             <div class="form-group">
                                <div class="col-md-4 col-sm-5 inv-label">Client </div>
                                <div class="col-md-8 col-sm-7">
                                   <a href="#"
                                   id="project-client-field"
                                   data-type="select2"
                                   data-pk=""
                                   data-name="client"
                                   data-url="/project/new/validate"
                                   data-title="Select Client">{{ProjectService::getClient()}}</a>
                                   <p class="help-block"></p>
                                </div>
                             </div>
                         </div>
                         <br>
                         <div class="row">
                             <div class="form-group">
                                 <div class="col-md-4 col-sm-5 inv-label">Project</div>
                                 <div class="col-md-8 col-sm-7">
                                    <a href="#"
                                    id="project-name-field"
                                    data-type="text"
                                    data-pk=""
                                    data-name="name"
                                    data-url="/project/new/validate"
                                    data-title="Enter Project Name">{{ProjectService::getName()}}</a>
                                    <p class="help-block"></p>
                                 </div>
                             </div>
                         </div>
                         <br>
                         <div class="row">
                             <div class="form-group">
                                <div class="col-md-4 col-sm-5 inv-label">Location </div>
                                <div class="col-md-8 col-sm-7">
                                   <a href="#"
                                    id="project-location-field"
                                    data-type="textarea"
                                    data-url="/project/new/validate"
                                    data-name="location"
                                    data-pk=""
                                    data-title="Enter Location">{{ProjectService::getLocation()}}</a>
                                    <p class="help-block"></p>
                                </div>
                             </div>

                         </div>
                         <br>
                         <div class="row">
                             <div class="form-group">
                                <div class="col-md-4 col-sm-5 inv-label">Sales Rep</div>
                                <div class="col-md-8 col-sm-7">
                                   <a href="#"
                                   id="project-sales-rep-field"
                                   data-type="select2"
                                   data-name="salesrep"
                                   data-url="/project/new/validate"
                                   data-pk=""
                                   data-title="Select Sales Rep">{{ProjectService::getSalesRep()}}</a>
                                    <p class="help-block"></p>
                                </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-5 col-sm-6 pull-right">
                         <div class="row">
                             <div class="form-group">
                                 <div class="col-md-4 col-sm-5 inv-label">Date</div>
                                 <div class="col-md-8 col-sm-7">
                                     <a href="#"
                                     id="project-current-date-field"
                                     data-type="date"
                                     data-pk=""
                                     data-name="currentDate"
                                     data-url="/project/new/validate"
                                     data-title="Select Date">{{ empty(ProjectService::getCurrentDate()) ? date('j F Y') : ProjectService::getCurrentDate()}}</a>
                                      <p class="help-block"></p>
                                 </div>
                             </div>
                         </div>
                         <br>
                         <div class="row">
                             <div class="form-group">
                                 <div class="col-md-4 col-sm-5 inv-label">Deadline</div>
                                 <div class="col-md-8 col-sm-7">
                                      <a href="#"
                                      id="project-deadline-field"
                                      data-type="date"
                                      data-pk=""
                                      data-name="deadline"
                                      data-url="/project/new/validate"
                                      data-title="Select Date">{{ ProjectService::getDeadline() }}</a>
                                      <p class="help-block"></p>
                                 </div>
                             </div>
                         </div>
                         <br>
                         <div class="row">
                             <div class="form-group">
                                 <div class="col-md-4 col-sm-5 inv-label">Lead Time</div>
                                 <div class="col-md-8 col-sm-7">
                                    <a href="#"
                                    id="project-lead-time-field"
                                    data-type="number"
                                    data-name="leadTime"
                                    data-pk=""
                                    data-title="Enter Lead Time (No. of Days)">
                                    {{ProjectService::getLeadTime()}}
                                    </a>
                                    <p class="help-block"></p>
                                 </div>
                             </div>
                         </div>
                         <br>
                         <div class="row">
                            <div class="form-group">
                                <div class="col-md-4 col-sm-5 inv-label">Estimator</div>
                                <div class="col-md-8 col-sm-7">
                                    <a href="#"
                                    id="project-estimator-field"
                                    data-type="select2"
                                    data-name="estimator"
                                    data-url="/project/new/validate"
                                    data-pk=""
                                    data-title="Select Estimator">{{ProjectService::getEstimator()}}</a>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                         </div>
                     </div>
                 </div>
                 {{-- End Invoice To --}}