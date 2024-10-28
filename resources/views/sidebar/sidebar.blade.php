<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar bg-primary text-white p-3 vh-100 position-fixed">
        <h4>Your Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active text-white" href="{{ url('/home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('employees.index') }}">Employees</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('/tasks') }}">Tasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('/departments') }}">Departments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="main-content flex-grow-1 p-4 ml-5" style="margin-left: 250px;">
        @yield('main-content')
    </div>
</div>
