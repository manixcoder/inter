<?php 
   $sessionId =  Session::get('gorgID');
   $users = DB::table('users')->where('id', $sessionId)->first();
?>

<link href="{{ asset('public/assets/css/page_css/home.css') }}" rel="stylesheet" type="text/css" />
<!-- Start content -->
<div class="content">
   <div class="container-fluid">
      <div class="">
         <div class="">
            <!-- Page-Title -->
            <div class="row">
               <div class="col-sm-12">
                  <h4 class="pull-left page-title">Welcome, {{ $users->name }} !</h4>
                  <ol class="breadcrumb pull-right">
                     <li><a href="#">Admin</a></li>
                     <li class="active">Dashboard</li>
                  </ol>
               </div>
            </div>
            <div class="row">

               @if(Session::get('userRole') == 1)
               
               <div class="col-md-6 col-xl-4">
                  <a href="{{url::to('users')}}">
                     <div class="mini-stat clearfix bg-primary bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter">{{ $executivedata ?? ''}}</span>
                           Total Executive
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Executive <span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>

               <div class="col-md-6 col-xl-4">
                  <a href="{{url::to('users')}}">
                     <div class="mini-stat clearfix bg-dark bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter">{{ $customerdata ?? ''}}</span>
                           Total Customers
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Customers <span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               @endif
               <div class="col-md-6 col-xl-4">
                  <a href="{{url::to('brand')}}">
                     <div class="mini-stat clearfix bg-success bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-list-alt"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter">{{ $branddata ?? ''}}</span>
                           Total Brands
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Brands <span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-6 col-xl-4">
                  <a href="{{url::to('category')}}">
                     <div class="mini-stat clearfix bg-warning bx-shadow">
                        <span class="mini-stat-icon"><i class="fas fa-sitemap"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter">{{ $categorydata ?? ''}}</span>
                           Total Categories
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Categories <span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-6 col-xl-4">
                  <a href="{{url::to('product')}}">
                     <div class="mini-stat clearfix bg-danger bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-shopping-cart"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter">{{ $productsdata ?? ''}}</span>
                           Total Products
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Products <span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
                  <!-- <div class="col-md-6 col-xl-4">
                  <a href="{{ url::to('card_activity') }}">
                     <div class="mini-stat clearfix bg-danger bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-window-maximize"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter">10</span>
                           Total Sale
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Sale<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>

               <div class="col-md-6 col-xl-4">
                  <a href="{{ url::to('commission')}}">
                     <div class="mini-stat clearfix bg-info bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-tint"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter">30</span>
                           Total Inventory
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Inventory<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>   

               <div class="col-md-6 col-xl-4">
                  <a href="{{ url::to('card_activity') }}">
                     <div class="mini-stat clearfix bg-success  bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-window-maximize"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter">15</span>
                           Total Accounting
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Accounting <span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>

               <div class="col-md-6 col-xl-4">
                  <a href="{{ url::to('card_activity') }}">
                     <div class="mini-stat clearfix bg-warning bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-window-maximize"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter">10</span>
                           Total Report
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Report<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div> -->
               <!-- <div class="col-md-6 col-xl-4">
                  <a href="{{ url::to('card_activity') }}">
                     <div class="mini-stat clearfix bg-primary bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-window-maximize"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter">10</span>
                           Total Preorder
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Preorder<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div> -->   

               
              

               
               <!--  -->
            </div>
            <!-- Start Widget -->
            <!--Widget-4 -->
            <!-- End row-->
            <!-- <div class="row">
               <div class="col-xl-8">
                  <div class="portlet">
                     <div class="portlet-heading">
                        <h4 class="portlet-title text-dark text-uppercase">
                           Website Stats
                        </h3>
                        <div class="portlet-widgets">
                           <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                           <span class="divider"></span>
                           <a data-toggle="collapse" href="#portlet1"><i class="ion-minus-round"></i></a>
                           <span class="divider"></span>
                           <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div id="portlet1" class="panel-collapse collapse show">
                        <div class="portlet-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <div id="website-stats" style="position: relative;height: 320px"></div>
                                 <div class="row text-center m-t-30">
                                    <div class="col-sm-4">
                                       <h4 class="counter">0</h4>
                                       <small class="text-muted"> Weekly Report</small>
                                    </div>
                                    <div class="col-sm-4">
                                       <h4 class="counter">0</h4>
                                       <small class="text-muted">Monthly Report</small>
                                    </div>
                                    <div class="col-sm-4">
                                       <h4 class="counter">0</h4>
                                       <small class="text-muted">Yearly Report</small>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> -->
                  <!-- /Portlet -->
               </div>
               <!-- end col -->
               <!-- <div class="col-xl-4">
                  <div class="portlet">
                     <div class="portlet-heading">
                        <h3 class="portlet-title text-dark text-uppercase">
                           Website Stats
                        </h3>
                        <div class="portlet-widgets">
                           <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                           <span class="divider"></span>
                           <a data-toggle="collapse" href="#portlet2"><i class="ion-minus-round"></i></a>
                           <span class="divider"></span>
                           <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div id="portlet2" class="panel-collapse collapse show">
                        <div class="portlet-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <div id="pie-chart">
                                    <div id="pie-chart-container" class="flot-chart" style="height: 320px">
                                    </div>
                                 </div>
                                 <div class="row text-center m-t-30">
                                    <div class="col-sm-6">
                                       <h4 class="counter">86,956</h4>
                                       <small class="text-muted"> Weekly Report</small>
                                    </div>
                                    <div class="col-sm-6">
                                       <h4 class="counter">86,69</h4>
                                       <small class="text-muted">Monthly Report</small>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> -->
                  <!-- /Portlet -->
               </div>
               <!-- end col -->
            </div>
            <!-- End row -->
            <!-- end row -->
         </div>
      </div>
   </div>
</div>
</div> <!-- container -->
</div> <!-- content -->