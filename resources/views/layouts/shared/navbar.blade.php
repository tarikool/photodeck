<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="./">Photodeck</a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="{{ auth()->user()->image }}" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="{{ url('profile') }}"><i class="fa fa- user"></i>My Profile</a>

                        <a class="nav-link" href="#" onclick="event.preventDefault();$('#logout-form').submit();">
                            <i class="fa fa-power -off"></i>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('logout') }}" method="POST">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>
</header>