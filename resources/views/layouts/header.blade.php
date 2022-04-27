<div class="container-fluid bg-dark"> {{-- Application header included in app layout --}}
    <div class="container">
      <div class="row">
        <div class="col-12 text-end pe-4 pt-2">
          <a class="px-2"><i class="fas fa-search text-light"></i></a>
          <a class="px-2"><i class="fas fa-bell text-light"></i></a>
          <a class="px-2"><i class="fas fa-user text-light"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid navigation bg-dark">
    <div class="container">
      <nav class="navbar navbar-expand-md navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><i class="fas fa-dumbbell logo"></i></a>
          <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse text-center justify-content-center" id="menu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center">
              <li class="nav-item">
                <a class="nav-link  text-light" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  text-light" href="/trainers">Trainers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  text-light" href="/about">About us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  text-light" href="/contact">Contact us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  text-light" href="/joinus">Become a trainer</a>
              </li>
            </ul>
            @if($user)
              @if ($user['role'] == 'user')
                <a class="btn primary-btn text-light" href="/user/dashboard" role="button">
                  Account <i class="fas fa-user text-light"></i>
                </a>
              @elseif ($user['role'] == 'trainer')
                <a class="btn primary-btn text-light" href="/trainer/dashboard" role="button">
                  Account <i class="fas fa-user text-light"></i>
                </a>
              @elseif ($user['role'] == 'admin')
                <a class="btn primary-btn text-light" href="/admin/dashboard" role="button">
                  Account <i class="fas fa-user text-light"></i>
                </a>
              @endif
            @else
              <a class="btn primary-btn text-light" href="/login" role="button">
                Login <i class="fas fa-sign-in-alt"></i>
              </a>
            @endif
          </div>
        </div>
      </nav>
    </div>
  </div>