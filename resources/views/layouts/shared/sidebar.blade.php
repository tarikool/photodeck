{{--Admin sidebar--}}
@if(auth()->user()->isAdmin())
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ $sidebar == 'dashboard' ? 'active' : '' }}">
                        <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-item-has-children dropdown {{ $head == 'profile' ? 'show active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-table"></i>
                            Profile
                        </a>
                        <ul class="sub-menu children dropdown-menu {{ $head == 'profile' ? 'show' : '' }}">
                            <li>
                                <i class="fa fa-table"></i>
                                <a href="#" class="{{ $sidebar == 'show' ? 'blue' : '' }}">
                                    Show Profile
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i>
                                <a href="#" class="{{ $sidebar == 'update' ? 'blue' : '' }}">
                                    Update Profile
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i>
                                <a href="#" class="{{ $sidebar == 'change' ? 'blue' : '' }}">
                                    Change Password
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
@endif




{{-- User Sidebar --}}
@if(! auth()->user()->isAdmin())
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ $sidebar == 'dashboard' ? 'active' : '' }}">
                        <a href="#"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-item-has-children dropdown {{ $head == 'profile' ? 'show active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-table"></i>
                            Profile
                        </a>
                        <ul class="sub-menu children dropdown-menu {{ $head == 'profile' ? 'show' : '' }}">
                            <li>
                                <i class="fa fa-table"></i>
                                <a href="{{ url('profile') }}" class="{{ $sidebar == 'show' ? 'blue' : '' }}">
                                    Show Profile
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i>
                                <a href="#" class="{{ $sidebar == 'update' ? 'blue' : '' }}">
                                    Update Profile
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i>
                                <a href="#" class="{{ $sidebar == 'change' ? 'blue' : '' }}">
                                    Change Password
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown {{ $head == 'story' ? 'show active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-table"></i>
                            Stories
                        </a>
                        <ul class="sub-menu children dropdown-menu {{ $head == 'story' ? 'show' : '' }}">
                            <li>
                                <i class="fa fa-table"></i>
                                <a href="{{ url('stories') }}" class="{{ $sidebar == 'all_stories' ? 'blue' : '' }}">
                                    All stories
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i>
                                <a href="{{ url('stories?story=own') }}" class="{{ $sidebar == 'your_stories' ? 'blue' : '' }}">
                                    Your stories
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i>
                                <a href="{{ url('stories/create') }}" class="{{ $sidebar == 'create_story' ? 'blue' : '' }}">
                                    Create story
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
@endif

