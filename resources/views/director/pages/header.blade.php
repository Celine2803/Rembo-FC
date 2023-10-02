


<header class="header">   
    <nav class="navbar navbar-expand-lg">
      <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
          <div class="close-btn">Close <i class="fa fa-close"></i></div>
          <form id="searchForm" action="#">
            <div class="form-group">
              <input type="search" name="search" placeholder="What are you searching for...">
              <button type="submit" class="submit">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="index.html" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Rembo</strong><strong>Football</strong><strong class="text-primary">Club</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">R</strong><strong>F</strong><strong class="text-primary">C</strong></div></a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>
        <div class="right-menu list-inline no-margin-bottom">    
          {{-- <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div> --}}
          
          <!-- Tasks-->
          
          <!-- Tasks end-->
          <!-- Megamenu-->
          

          
          <!-- Megamenu end     -->
          <!-- Languages dropdown    -->
          <div class="list-inline-item dropdown">
            <a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle">
          
              <span class="d-none d-sm-inline-block">Profile</span>
            </a>

            <div aria-labelledby="languages" class="dropdown-menu">
              <ul class="list-unstyled p-1">
                <li class="dropdown-item py-2">
                  <a href="{{route('director.profile')}}" class="text-body ms-0">
                    <i class="me-2 icon-md" data-feather="user"></i>
                    <span class="text-white">Profile</span>
                  </a>
                </li>
                <li class="dropdown-item py-2">
                  <a href="{{ route('director.change.password') }}" class="text-body ms-0">
                    <i class="me-2 icon-md" data-feather="edit"></i>
                    <span class="text-white">Change Password</span>
                  </a>
                </li>
                
                <li class="dropdown-item py-2">
                  <a href="{{route('director.logout')}}" class="text-body ms-0">
                    <i class="me-2 icon-md" data-feather="log-out"></i>
                    <span class="text-white">Log Out</span>
                  </a>
                </li>
              </ul>
              </div>
          </div>
         
        </div>
      </div>
    </nav>
  </header>