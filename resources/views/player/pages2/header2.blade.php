


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
         
        </div>
        
                {{-- <li class="dropdown-item py-2">
                  <a href="{{route('player.profile')}}" class="text-body ms-0">
                    <i class="me-2 icon-md" data-feather="user"></i>
                    <span class="text-white">Profile</span>
                  </a>
                </li> --}}
                {{-- <li class="dropdown-item py-2">
                  <a href="{{ route('player.change.password') }}" class="text-body ms-0">
                    <i class="me-2 icon-md" data-feather="edit"></i>
                    <span class="text-white">Change Password</span>
                  </a>
                </li> --}}
                {{-- <li class="dropdown-item py-2">
                  <a href="javascript:;" class="text-body ms-0">
                    <i class="me-2 icon-md" data-feather="repeat"></i>
                    <span class="text-white">Switch User</span>
                  </a>
                </li> --}}
                <li class="dropdown-item py-2">
                  <a href="{{ url('/player/logout') }}" class="text-body ms-0" style="margin-left: auto;">
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