 <!--**********************************
            Sidebar start
        ***********************************-->
 <div class="deznav">
     <div class="deznav-scroll">
         <ul class="metismenu" id="menu">
             <li class="{{ 'admin/dashboard' == request()->path() ? 'active' : '' }}"><a class="has-arrow ai-icon"
                     href="{{ route('admin.admin.dashboard') }}" aria-expanded="false">
                     <i class="flaticon-381-networking"></i>
                     <span class="nav-text">Dashboard</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="">Dashboard</a></li>
                     <li><a href="page-analytics.html">Analytics</a></li>
                     <li><a href="page-review.html">Review</a></li>
                     <li><a href="{{ route('admin.admin.details') }}">Order</a></li>
                     <li><a href="{{ route('admin.orders.index') }}">Order List</a></li>
                     <li><a href="page-general-customers.html">General Customers</a></li>
                 </ul>
             </li>

             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="fa-solid fa-bars"></i>
                     <span class="nav-text">Menu</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('admin.product.create') }}">Add Menu Items</a></li>
                     <li><a href="{{ route('admin.category.create') }}">Add Menu Category</a></li>

                 </ul>
             </li>
             

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

                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
                    <i class="fa-solid fa-calendar-day"></i>
                    <span class="nav-text">Employees Details</span>
                </a>
                <ul aria-expanded="true">
                    <li><a href="{{ route('admin.employees.index') }}">Add Employee</a></li>                    
                    <li><a href="{{ route('admin.advance-type.create') }}">Add Advance Type </a></li>
                    <li><a href="">Employee Analytics </a></li>
                    <li><a href="{{ route('admin.payment-setting.create') }}">Payments  Setting </a></li>

                </ul>
                </li>          
            
             
         </ul>

     </div>
 </div>
 <!--**********************************
            Sidebar end
        ***********************************-->
