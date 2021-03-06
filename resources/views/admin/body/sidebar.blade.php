  @php
  $prefix =Request::route()->getPrefix();

  $route = Route::current()->getName();
  @endphp

  <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="{{asset('userbackend/img/logo/logo2.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>

        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage1" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Manage User</span>
        </a>
        <div id="collapsePage1" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
            <a class="collapse-item" href="{{route('view.user')}}">View User</a>
            <a class="collapse-item" href="{{route('users.add')}}">Add User</a>
            
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage2" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Manage Profile</span>
        </a>
        <div id="collapsePage2" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
            <a class="collapse-item" href="{{route('profile.view')}}">Your Profile </a>
            <a class="collapse-item" href="{{route('users.add')}}">Change Password</a>
            
          </div>
        </div>
      </li>
      <li class="nav-item {{($prefix =='/setup') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Setup Management</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{route('student.class.view')}}">Student Class</a>
            <a class="collapse-item" href="{{route('student.year.view')}}">Student Year View</a>
            <a class="collapse-item" href="{{route('student.group.view')}}">Student Group View</a>
            <a class="collapse-item" href="{{route('student.shift.view')}}">Student Shift View</a>
            <a class="collapse-item" href="{{route('fee.category.view')}}">Fee Category</a>
            <a class="collapse-item" href="{{route('fee.amount.view')}}">Fee Category Amount</a>

             <a class="collapse-item" href="{{route('exam.type.view')}}">Exam Type</a>
             <a class="collapse-item" href="{{route('school.subject.view')}}">School Subject </a>
             <a class="collapse-item" href="{{route('assign.subject.view')}}">Assign Subject </a>

              <a class="collapse-item" href="{{route('designation.view')}}">Designation</a>
          </div>
        </div>
      </li>

      <li class="nav-item {{($prefix =='/students') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap3"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Students Management</span>
        </a>
        <div id="collapseBootstrap3" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{route('student.registration.view')}}">Student registration</a>
            <a class="collapse-item" href="{{route('roll.generate.view')}}">Roll generator</a>

            <a class="collapse-item" href="{{route('registration.fee.view')}}">Registration view </a>
            <a class="collapse-item" href="{{route('monthly.fee.view')}}">Monthly fee view </a>
             <a class="collapse-item" href="{{route('exam.fee.view')}}">Exam fee view </a>
            
          </div>
        </div>
      </li>

       <li class="nav-item {{($prefix =='/employees') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Employee Management</span>
        </a>
        <div id="collapseBootstrap4" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
             <a class="collapse-item" href="{{route('employee.registration.view')}}">Employee registration</a>

            <a class="collapse-item" href="{{route('employee.salary.view')}}">Employee Salary</a>

            <a class="collapse-item" href="{{route('employee.leave.view')}}">Employee Leave</a>
            <a class="collapse-item" href="{{route('employee.attendance.view')}}">Employee Attendance</a>
             <a class="collapse-item" href="{{route('employee.monthly.salary')}}">Employee monthly salary</a>
           
            
          </div>
        </div>
      </li>

      <li class="nav-item {{($prefix =='/marks') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap44"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Marks Management</span>
        </a>
        <div id="collapseBootstrap44" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
             <a class="collapse-item {{($route =='marks.entry.add') ? 'active show' : ''}}" href="{{route('marks.entry.add')}}">Mark Entry</a>
            <a class="collapse-item" href="{{route('marks.entry.edit')}}">Mark Edit</a>

             <a class="collapse-item" href="{{route('marks.entry.grade')}}">Mark Grade</a>

           
            
          </div>
        </div>
      </li>


      <li class="nav-item {{($prefix =='/accounts') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap45"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Accounts Management</span>
        </a>
        <div id="collapseBootstrap45" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
             <a class="collapse-item {{($route =='student.fee.view') ? 'active show' : ''}}" href="{{route('student.fee.view')}}">Student Fee</a>

             <a class="collapse-item {{($route =='account.salary.view') ? 'active show' : ''}}" href="{{route('account.salary.view')}}">Employee Salary   view</a>

              <a class="collapse-item {{($route =='other.cost.view') ? 'active show' : ''}}" href="{{route('other.cost.view')}}">other Cost</a>
            
            
           
            
          </div>
        </div>
      </li>
     <!--  
      <li class="nav-item">
        <a class="nav-link" href="ui-colors.html">
          <i class="fas fa-fw fa-palette"></i>
          <span>UI Colors</span>
        </a>
      </li> -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Examples
      </div>
      <li class="nav-item {{($prefix =='/reports') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap48"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Report Management</span>
        </a>
        <div id="collapseBootstrap48" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
             <a class="collapse-item {{($route =='monthly.profit.view') ? 'active show' : ''}}" href="{{route('monthly.profit.view')}}">Monthly/yearly profit</a>

            
            
           
            
          </div>
        </div>
      </li>
      
      <hr class="sidebar-divider">
     
    </ul>
    <!-- Sidebar -->