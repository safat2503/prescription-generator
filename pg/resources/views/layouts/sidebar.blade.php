<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image'">
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class = "{{  $page == 'dashboard'? 'active': ''}}">
              <a href="{{ route('main.dashboard')}}">
                <i class="fa fa-th"></i> <span>Dashboard</span> 
              </a>
            </li>
            
            
            
            <li class="treeview {{ collect(['patient_registration', 'new_prescription', 'patient_medication_history'])->contains($page)? 'active': '' }}">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Patients</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class = "{{ $page == 'patient_registration'? 'active': ''}}"><a href=" {{ route('register.patient')}}"><i class="fa fa-circle-o"></i> Patient Registration</a></li>
                <li class = "{{ $page == 'new_prescription'? 'active' : ''}}"><a href="{{route('prescription.patient') }}"><i class="fa fa-circle-o"></i> New Prescription</a></li>
                <li class = "{{ $page == 'patient_medication_history'? 'active': ''}}"><a href="{{ route('medication.patient') }}"><i class="fa fa-circle-o"></i> Patient Medication History</a></li>
              </ul>
            </li>

            <li class="treeview {{ collect(['add_medicine', 'medicine_details'])->contains($page)? 'active' : '' }}">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Medicines</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class= "{{ $page == 'add_medicine'? 'active': '' }}"><a href="{{ route('medicine.medicines') }}"><i class="fa fa-circle-o"></i> Add Medicines</a></li>
                <li class= "{{ $page == 'medicine_details'? 'active': '' }}"><a href=" {{ route('medicine_details.medicines') }}"><i class="fa fa-circle-o"></i> Medicine Details</a></li>
              </ul>
            </li>

            <li class="treeview {{ collect(['disease', 'reports', 'users'])->contains($page)? 'active' : '' }}">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Miscellaneous</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="{{ $page == 'disease'? 'active': '' }}"><a href=" {{ route('disease.miscellaneous') }}"><i class="fa fa-circle-o"></i> Disease</a></li>

                 <li class="{{ $page == 'lab_test'? 'active': '' }}"><a href=" {{ route('lab.test.index') }}"><i class="fa fa-circle-o"></i> Lab Tests</a></li>
                <li class="{{ $page == 'reports'? 'active': '' }}"><a href=" {{ route('report.miscellaneous') }}"><i class="fa fa-circle-o"></i> Reports</a></li>
                <li class= "{{ $page == 'users'? 'active': '' }}"><a href=" {{ route('user.miscellaneous') }}"><i class="fa fa-circle-o"></i> Users</a></li>
              </ul>
            </li>

       
         
    
            
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Logout</span></a></li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>