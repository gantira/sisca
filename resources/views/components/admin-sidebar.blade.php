<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{ asset('vendor/img/profile_small.jpg') }}"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{ auth()->user()->name }}</span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                        <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();getElementById('logout').submit();">Logout</a></li>

                        <form action="{{ route('logout') }}" method="post" id="logout">
                            @csrf
                        </form>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <x-nav-link route="{{ route('dashboard') }}" icon="fa fa-dashboard" :active="request()->routeIs('dashboard')" >
                Dashboard
            </x-nav-link>

            <x-nav-link route="{{ route('admin.categories.index') }}" icon="fa fa-cube" :active="request()->routeIs('admin.categories.*')" >
                Category
            </x-nav-link>

            <x-nav-link route="{{ route('admin.posts.index') }}" icon="fa fa-tags" :active="request()->routeIs('admin.posts.*')" >
                Post
            </x-nav-link>

            <x-nav-link route="{{ route('admin.tags.index') }}" icon="fa fa-tags" :active="request()->routeIs('admin.tags.*')" >
                Tag
            </x-nav-link>

            <x-nav-link route="{{ route('admin.teams.index') }}" icon="fa fa-building" :active="request()->routeIs('admin.teams.*')" >
                Team
            </x-nav-link>

        </ul>

    </div>
</nav>
