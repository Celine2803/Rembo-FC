
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
     <!-- Sidebar Header-->
     <div class="sidebar-header d-flex align-items-center">
       <div class="avatar"><img src="{{ (!empty($profileData->photo)) ? 
         url('upload/coach_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="..." class="img-fluid rounded-circle">
       </div>
       <div class="title">
         <h1 class="h5">Coaches</h1>
         <p>Team Management</p>
 
       
       </div>
     </div>
     <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
 
     
       
 
     <ul class="list-unstyled">
             <li class="active"><a href="{{ route('coach.dashboard') }}"> <i class="icon-home"></i>Home </a></li>
             <li><a href="tables.html"> <i class="icon-grid"></i>Tables </a></li>
             <li><a href="{{ route('line.chart')}}"> <i class="fa fa-bar-chart"></i> Performance Chart </a></li>
             <li><a href="{{ route('calendar.index')}}"> <i class="icon-padnote"></i>Calendar</a></li>
             {{-- <li><a href="forms.html"> <i class="icon-writing-whiteboard"></i>Email</a></li> --}}
             {{-- <li><a href="forms.html"> <i class="icon-settings"></i>Payments</a></li> --}}
 
             {{-- <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
               <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                 <li><a href="#">Page</a></li>
                 <li><a href="#">Page</a></li>
                 <li><a href="#">Page</a></li>
               </ul>
             </li> --}}
             
     {{-- </ul><span class="heading">Extras</span>
     <ul class="list-unstyled">
       <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
       <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
       <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
     </ul>
     <div class="list-inline-item logout">
       <a id="logout" href="{{ route('coach.logout')}}" class="nav-link">Logout <i class="icon-logout"></i>
       </a>
     </div> --}}
 
     <div class="list-inline-item logout">
       <a id="logout" href="{{ route('profile.destroy')}}" class="nav-link">Delete Account <i class="icon-delete"></i>
       </a>
     </div>
   </nav>