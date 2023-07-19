<nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #025464">
    <div class="container">
        <a class="navbar-brand" href="#">Kaosku</a>
        <div class="card-header m-auto" style="border-radius:5px;">
            <img src="{{asset('assets/images/logokaosku.png')}}" alt="baju 1" style="width: 10%;">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end gap-4" id="navbarSupportedContent">
            <ul class="navbar-nav gap-4">
                <li class="nav-item">
                    <a class="nav-link {{Request::path() == '/' ? 'active' : '';}}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::path() == 'shop' ? 'active' : '';}}" href="/shop">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::path() == 'contact' ? 'active' : '';}}" href="/contact">Contact Us</a>
                </li>
            </ul>
            <div class="d-flex gap-4 align-items-center justify-content-end">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Login | Register</button>
                <div class="notif">
                    <a href="/transaksi" class="fs-5">
                        <i class="fa-solid icon-nav fa-bag-shopping"></i>
                    </a>
                    {{-- <div class="circle">10</div> --}}
                </div>
            </div>
        </div>
    </div>
</nav>
