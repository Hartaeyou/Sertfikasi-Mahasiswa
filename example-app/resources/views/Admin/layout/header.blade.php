@use(Illuminate\Support\Facades\Auth)
<div id="viewport">
    <div id="sidebar">
        <header>
            <a href="#">Laptop Choice</a>
        </header>
        <ul class="nav">
            <li>
                <a href="{{ route('dashboardUser') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> Edit User
                </a>
            </li>

            <li>
                <a href="{{ route('tableRegister') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> Edit Pendaftaran
                </a>
            </li>

            <li class="logout">
                <a href="{{ route('logout') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <div id="content">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand">@yield('title')</a>
                <a type="button" class="modalButton" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                    {{ Auth::user()->name }}
                </a> 
            </div>
        </nav>
        @yield('content')
    </div>
</div>
