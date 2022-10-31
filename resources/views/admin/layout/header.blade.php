<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-white fs-4 me-3" style="fill:#fff;" id="menu-toggle" viewBox="0 0 24 24" width="20" height="20"><path d="M.88,14.09,4.75,18a1,1,0,0,0,1.42,0h0a1,1,0,0,0,0-1.42L2.61,13H23a1,1,0,0,0,1-1h0a1,1,0,0,0-1-1H2.55L6.17,7.38A1,1,0,0,0,6.17,6h0A1,1,0,0,0,4.75,6L.88,9.85A3,3,0,0,0,.88,14.09Z"/></svg>
                    </div>
                </li>
            </ul>

            {{-- <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
            </form> --}}

            <ul class="d-flex" style="margin-bottom: 0;"> 
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle second-text fw-bold text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16" role="img" viewBox="0 0 512 512" style="width: 20px;"><path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"/></svg>
                    </a>
                    {{-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul> --}}

                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle second-text fw-bold text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 898.266 1026.587" style="fill:#fff;">
                            <path id="bell-regular" d="M881,726.411c-38.738-41.625-111.22-104.243-111.22-309.36,0-155.793-109.235-280.507-256.527-311.1V64.162a64.122,64.122,0,1,0-128.243,0v41.785c-147.291,30.6-256.526,155.311-256.526,311.1,0,205.117-72.483,267.735-111.22,309.36A62.645,62.645,0,0,0,0,769.94C.221,802.823,26.026,834.1,64.363,834.1H833.9c38.337,0,64.162-31.279,64.362-64.162A62.612,62.612,0,0,0,881,726.41ZM135.4,737.859c42.547-56.081,89.064-149.036,89.285-319.645,0-.4-.12-.762-.12-1.163,0-124.033,100.533-224.566,224.566-224.566S673.7,293.018,673.7,417.051c0,.4-.12.762-.12,1.163.221,170.63,46.738,263.584,89.285,319.645Zm313.731,288.728A128.3,128.3,0,0,0,577.4,898.263H320.869A128.3,128.3,0,0,0,449.133,1026.587Z" transform="translate(0.001)"/></svg>
                    </a>
                    {{-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul> --}}

                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle second-text fw-bold text-white" href="#" id="navbarDropdown"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('assets/images/prof.png')}}" style="width: 30px; height: 30px;">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">{{ Auth::guard('admin')->user()->name}}</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ url('/admin/logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-switch2"></i>Logout
                            </a>
    
                            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST"
                                style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                       
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</nav>