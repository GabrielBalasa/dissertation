<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 90%;">
    <span class="fs-4">Welcome, {{$user['firstname']}}!</span> {{-- User side menu --}}
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/user/dashboard" class="nav-link{{Request::is(['user/dashboard*', 'user/dashboard/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-solid fa-table"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="/user/personaldetails" class="nav-link{{Request::is(['user/personaldetails*', 'user/personaldetails/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-regular fa-user"></i> Personal Details
            </a>
        </li>
        <li>
            <a href="/user/exercises" class="nav-link{{Request::is(['user/exercises*', 'user/exercises/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-solid fa-person-walking"></i></i> Exercises
            </a>
        </li>
        <li>
            <a href="/user/trainer" class="nav-link{{Request::is(['user/trainer*', 'user/trainer/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-solid fa-book"></i> Trainer
            </a>
        </li>
        <li>
            <a href="/user/subscription" class="nav-link{{Request::is(['user/subscription*', 'user/subscription/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-solid fa-receipt"></i> Subscription
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