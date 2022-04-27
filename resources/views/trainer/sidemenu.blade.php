<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 90%;">
    <span class="fs-4">Welcome, {{$user['firstname']}}!</span> {{-- Trainer side menu --}}
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/trainer/dashboard" class="nav-link{{Request::is(['trainer/dashboard*', 'trainer/dashboard/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-solid fa-table"></i> Dashboard
            </a> 
        </li>
        <li>
            <a href="/trainer/personaldetails" class="nav-link{{Request::is(['trainer/personaldetails*', 'trainer/personaldetails/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-regular fa-user"></i> Personal Details
            </a>
        </li>
        <li>
            <a href="/trainer/clients" class="nav-link{{Request::is(['trainer/clients*', 'trainer/clients/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-regular fa-user"></i> Clients
            </a>
        </li>
        <li>
            <a href="/trainer/exercises" class="nav-link{{Request::is(['trainer/exercises*', 'trainer/exercises/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-solid fa-person-walking"></i></i> Exercises
            </a>
        </li>
        <li>
            <a href="/trainer/workouts" class="nav-link{{Request::is(['trainer/workouts*', 'trainer/workouts/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-solid fa-person-walking"></i></i> Workouts
            </a>
        </li>
        <li>
            <a href="/trainer/subscriptions" class="nav-link{{Request::is(['trainer/subscriptions*', 'trainer/subscriptions/*', 'trainer/settiers']) ? ' active' : ' link-dark'}}">
                <i class="fa-solid fa-book"></i> Subscriptions
            </a>
        </li>
    </ul>
    <hr>
    <div class="d-flex align-self-center">
        <a class="btn primary-btn text-light" href="/logout" role="button">
            <i class="fas fa-sign-out-alt"></i> Sign out
        </a>
    </div>
</div>