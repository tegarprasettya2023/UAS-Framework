<aside
    class="sidebar navbar navbar-expand-lg d-flex flex-column gap-4 align-content-lg-center mx-2 my-2 rounded" style="background-color: #025464">
    <h5 class="navbar-brand">Kaosku</h5>
    {{-- <hr class="" style="color: white;font-weight:800"> --}}
    <div class="collapse navbar-collapse flex-grow-0" id="navbarNavDropdown">
        <ul class="navbar-nav flex-column gap-3 px-2">
            <li class="navbar-item rounded ">
                <a href="{{route('home')}}" class="text-white">
                    <div class="d-flex gap-3">
                        <span class="material-icons">dashboard</span>
                        <p class="m-0 p-0">Dashboard</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded ">
                <a href="{{route('katalog')}}" class="text-white">
                    <div class="d-flex gap-3">
                        <span class="material-icons">dashboard</span>
                        <p class="m-0 p-0">Katalog</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded">
                <a href="{{route('ProductCategories.index')}}" class="">
                    <div class="d-flex gap-3">
                        <span class="material-icons">inventory</span>
                        <p class="m-0 p-0">Product Category</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded ">
                <a href="{{route('Product.index')}}" class="">
                    <div class="d-flex gap-3">
                        <span class="material-icons">inventory</span>
                        <p class="m-0 p-0">Product</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded">
                <a href="{{route('Customer.index')}}" class="">
                    <div class="d-flex gap-3">
                        <span class="material-icons">people_alt</span>
                        <p class="m-0 p-0">Customer</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded">
                <a href="{{ route('transaction.create', AppHelper::transaction_code())}}" class="">
                    <div class="d-flex gap-3">
                        <span class="material-icons">people_alt</span>
                        <p class="m-0 p-0">Cashier</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item rounded">
                <a href="{{route('transaction.index')}}" class="">
                    <div class="d-flex gap-3">
                        <span class="material-icons">analytics</span>
                        <p class="m-0 p-0">Report</p>
                    </div>
                </a>
            </li>
            <li class="navbar-item">
                <a href="#" class="">
                    <div class="d-flex gap-3">
                        <span class="material-icons">logout</span>
                        <p class="m-0 p-0">Logout</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</aside>
