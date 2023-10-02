
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
     <!-- Sidebar Header-->
     <div class="sidebar-header d-flex align-items-center">
       <div class="avatar"><img src="{{ (!empty($profileData->photo)) ? 
         url('upload/director_images/'.$profileData->photo) : url('https://images.pexels.com/photos/2379429/pexels-photo-2379429.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')}}" alt="..." class="img-fluid rounded-circle">
       </div>
       <div class="title">
         <h1 class="h5">Mark Stephen</h1>
         <p>Director</p>
       </div>
     </div>
     <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
     <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Players </a>
       <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
         <li><a href="{{ route('all.players')}}">All Players</a></li>
         <li><a href="{{ route('add.player')}}">Add Player</a></li>
         <li><a href="{{ route('player.trashed')}}">Deleted Players</a></li>
       </ul>
     </li>
       
 
     <ul class="list-unstyled">
             <li class="active"><a href="{{ route('director.dashboard') }}"> <i class="icon-home"></i>Home </a></li>
             <li><a href="{{ route('table1')}}"> <i class="icon-grid"></i>Tables </a></li>
             <li><a href="{{ route('line.chart')}}"> <i class="fa fa-bar-chart"></i> Performance Chart </a></li>
             <li><a href="{{ route('email.player')}}"> <i class="icon-writing-whiteboard"></i>Emails </a></li>
             <li><a href="{{ route('import.meetup')}}"> <i class="icon-grid"></i>Records </a></li>

             <div class="list-inline-item logout">
              <a id="logout" href="{{ route('profile.destroy')}}" class="nav-link">Delete Account <i class="icon-delete"></i>
              </a>
            </div>
             
             {{-- <li><a href="{{ route('pay.player', $item->id)}}"> <i class="icon-settings"></i> Make Payments </a></li> --}}
 
             {{-- <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
               <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                 <li><a href="#">Page</a></li>
                 <li><a href="#">Page</a></li>
                 <li><a href="#">Page</a></li>
               </ul>
             </li>
             <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>
     </ul><span class="heading">Extras</span>
     <ul class="list-unstyled">
       <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
       <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
       <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
     </ul>
     <div class="list-inline-item logout">
       <a id="logout" href="{{ route('director.logout')}}" class="nav-link">Logout <i class="icon-logout"></i>
       </a>
     </div>
  --}}
     {{-- <div class="list-inline-item logout">
       <a id="logout" href="{{ route('profile.destroy')}}" class="nav-link">Delete Account <i class="icon-delete"></i>
       </a>
     </div> --}}
   </nav>