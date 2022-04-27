<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 90%;">
    <span class="fs-4">Welcome, {{$user['firstname']}}!</span> {{-- Admin side menu --}}
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link{{Request::is(['admin/dashboard*', 'admin/dashboard/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-solid fa-table"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="/admin/users" class="nav-link{{Request::is(['admin/users*', 'admin/users/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-regular fa-user"></i> Users
            </a>
        </li>
        <li>
            <a href="/admin/waitinglist" class="nav-link{{Request::is(['admin/waitinglist*', 'admin/waitinglist/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-solid fa-list-check"></i> Waiting List
            </a>
        </li>
        <li>
            <a href="/admin/comingsoon" class="nav-link{{Request::is(['admin/comingsoon*', 'admin/comingsoon/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-solid fa-screwdriver-wrench"></i> Coming Soon
            </a>
        </li>
        <li>
            <a href="/admin/comingsoon" class="nav-link{{Request::is(['admin/comingsoon*', 'admin/comingsoon/*']) ? ' active' : ' link-dark'}}">
                <i class="fa-solid fa-screwdriver-wrench"></i> Coming Soon
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