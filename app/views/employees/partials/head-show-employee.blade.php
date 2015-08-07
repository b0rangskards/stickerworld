     <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">
                {{-- Content here --}}
                <section class="panel">
                    <div class="panel-body profile-information">
                       <div class="col-md-3">
                           <div class="profile-pic text-center">
                               <img src="{{ !is_null($employee->picture)
                                            ? Config::get('constants.EMPLOYEE_PICTURE_URL').$employee->picture
                                            : Config::get('constants.DEFAULT_IMG_THUMBNAIL_URL')}}"
                                    alt="" />
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="profile-desk">
                               <h1>{{$employee->present()->fullName}} <small class="weight600"><i class="fa {{$employee->gender=='male'?'fa-mars flat-blue-font':'fa-venus flat-pink-font'}}"></i></small></h1>
                               <span class="text-muted">{{$employee->present()->designation}}</span>
                               <p>
                                   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porttitor vestibulum imperdiet. Ut auctor accumsan erat, a vulputate metus tristique non. Aliquam aliquam vel orci quis sagittis.
                               </p>
                               <a href="#" class="btn btn-primary">View Profile</a>
                           </div>
                       </div>
                       <div class="col-md-3">
                           <div class="profile-statistics">
                               <h1>1240</h1>
                               <p>This Week Sales</p>
                               <h1>$5,61,240</h1>
                               <p>This Week Earn</p>
                               <ul>
                                   <li>
                                       <a href="#">
                                           <i class="fa fa-facebook"></i>
                                       </a>
                                   </li>
                                   <li class="active">
                                       <a href="#">
                                           <i class="fa fa-twitter"></i>
                                       </a>
                                   </li>
                                   <li>
                                       <a href="#">
                                           <i class="fa fa-google-plus"></i>
                                       </a>
                                   </li>
                               </ul>
                           </div>
                       </div>
                    </div>
                </section>
                {{-- End Content here --}}
                </div>
            </section>
        </div>