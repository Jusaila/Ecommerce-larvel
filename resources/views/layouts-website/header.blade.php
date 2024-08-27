
		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Fashion<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item {{ Request::is('/') ? 'active' : ''}}">
							<a class="nav-link " href="{{ url('/') }}">Home</a>
						</li>
						<li class="{{ Request::is('shop') ? 'active' : ''}}"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
						<li class="{{ Request::is('about') ? 'active' : ''}}"><a class="nav-link" href="{{ route('about')}}">About us</a></li>
						<li class="{{ Request::is('blog') ? 'active' : ''}}"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
						<li class="{{ Request::is('contact') ? 'active' : ''}}"><a class="nav-link" href="{{ route('contact')}}">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                        <!-- User Dropdown -->
                        {{-- <h5>Welcome {{ auth()->user()->name  }}</h5> --}}

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('assets/images/user.svg') }}" alt="User">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                                <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                                <li><a class="dropdown-item" href="">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>

                            </ul>
                        </li>

                        <!-- Cart Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart') }}">
                                <img src="{{ asset('assets/images/cart.svg') }}" alt="Cart">
                                <span class="badge badge-pill badge-danger">{{ $cartCount }}</span>
                            </a>
                        </li>

                    </ul>

				</div>
			</div>

		</nav>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            function updateCartCount() {
                $.ajax({
                    url: "{{ route('cart.count') }}",
                    method: "GET",
                    success: function(response) {
                        console.log('Cart count response:', response);
                        $('.badge').text(response); // Directly set the count from the plain response
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

        </script>
