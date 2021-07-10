<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container container_navbar">
        <a class="navbar-brand d-flex" href="{{ url('/') }}">
            <div><img src="https://mynobe.com/wp-content/uploads/2019/05/car.jpg" style="max-height: 25px; border-right: 1px solid #23272b" class="pr-3"></div>
            <div class="pl-3">American book of rides</div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('rides.create')}}">Create</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('repairs.index')}}">Repairs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cars.index')}}">Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('workers.index')}}">Workers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/charts')}}">Charts</a>
                </li>
                <li>
                    <form class="form-inline my-2 my-lg-0" type="get" action="{{url('/search')}}">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>

            </ul>
            <!-- Right Side Of Navbar -->

        </div>
    </div>
</nav>
