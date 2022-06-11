 <!--**********************************
            Sidebar start
        ***********************************-->
 <div class="deznav">
     <div class="deznav-scroll">
         <ul class="metismenu" id="menu">
             <li class="{{ 'admin/dashboard' ==request()->path() ? 'active' :'' }}"><a class="has-arrow ai-icon" href="{{ route('admin.admin.dashboard') }}" aria-expanded="false">
                     <i class="flaticon-381-networking"></i>
                     <span class="nav-text">Dashboard</span>
                 </a>
                 <ul aria-expanded="false">
                     <li ><a href="">Dashboard</a></li>
                     <li><a href="page-analytics.html">Analytics</a></li>
                     <li><a href="page-review.html">Review</a></li>
                     <li><a href="page-order.html">Order</a></li>
                     <li><a href="page-order-list.html">Order List</a></li>
                     <li><a href="page-general-customers.html">General Customers</a></li>
                 </ul>
             </li>

             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                 <i class="fa-solid fa-bars"></i>
                     <span class="nav-text">Menu</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('admin.product.create') }}">Add Menu Items</a></li>
                     <li><a href="{{ route('admin.category.create') }}">Add Menu  Category</a></li>

                 </ul>
             </li>

             {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-381-network"></i>
                     <span class="nav-text">Category</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="">Add Category</a></li>
                     <li><a href="{{ route('admin.category.index') }}">View Category </a></li>

                 </ul>
             </li> --}}

             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="fa-solid fa-calendar-days"></i>
                <span class="nav-text"> Daily Expensive</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('admin.expens.create') }}">Add Expensive</a></li>
                <li><a href="{{ route('admin.excates.create') }}">Add Expensive Categroy </a></li>

            </ul>
        </li>

        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="fa-solid fa-calendar-day"></i>
            <span class="nav-text"> Daily Sale</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('admin.daily.create') }}">Add Sale</a></li>
            <li><a href="">View Sale </a></li>

        </ul>
    </li>

             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-381-notepad"></i>
                     <span class="nav-text">Forms</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="./form-element.html">Form Elements</a></li>
                     <li><a href="./form-wizard.html">Wizard</a></li>
                     <li><a href="./form-ckeditor.html">Summernote</a></li>
                     <li><a href="form-pickers.html">Pickers</a></li>
                     <li><a href="form-validation-jquery.html">Jquery Validate</a></li>
                 </ul>
             </li>
             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-381-network"></i>
                     <span class="nav-text">Table</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                     <li><a href="table-datatable-basic.html">Datatable</a></li>
                 </ul>
             </li>
             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-381-layer-1"></i>
                     <span class="nav-text">Pages</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="./page-register.html">Register</a></li>
                     <li><a href="./page-login.html">Login</a></li>
                     <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                         <ul aria-expanded="false">
                             <li><a href="./page-error-400.html">Error 400</a></li>
                             <li><a href="./page-error-403.html">Error 403</a></li>
                             <li><a href="./page-error-404.html">Error 404</a></li>
                             <li><a href="./page-error-500.html">Error 500</a></li>
                             <li><a href="./page-error-503.html">Error 503</a></li>
                         </ul>
                     </li>
                     <li><a href="./page-lock-screen.html">Lock Screen</a></li>
                 </ul>
             </li>
         </ul>

     </div>
 </div>
 <!--**********************************
            Sidebar end
        ***********************************-->
