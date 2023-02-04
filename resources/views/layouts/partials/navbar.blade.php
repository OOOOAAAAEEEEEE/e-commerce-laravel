<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/store"> <i class="bi bi-bag-heart-fill"></i> e-commerce </a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('store*') ? 'active' : '' }}" href="/store" aria-current="page"><i class="bi bi-basket2"></i> Store <span class="visually-hidden">(current)</span></a>
                </ul>
            </li>
            <ul class="navbar-nav me-5 mt-2 mt-lg-0">
                <li class="nav-item">
                    @can('admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-three-dots"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="/store/create"><i class="bi bi-box-seam-fill"></i> Add Items </a>
                            <a class="dropdown-item" href="/admin/checkOrders"><i class="bi bi-box-seam-fill"></i> Check Orders </a>
                        </div>
                    </li>
                    @endcan
                    @if (auth()->user())
                    <form class="nav-item" action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-dark"> Log Out <i class="bi bi-box-arrow-right"> </i></button>
                    </form>
                    @else
                        <a class="btn btn-dark" href="/login"> <i class="bi bi-box-arrow-in-right"></i> Login </a>
                    @endif
                </li>
            </ul>
        </div>
  </div>
</nav>
