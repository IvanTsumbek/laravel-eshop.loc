<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Page Title' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/libs/owlcarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/owlcarousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{asset('assets/libs/owlcarousel/owl.carousel.min.js')}}" defer></script>
    <script src="{{asset('assets/libs/toastr/toastr.min.js')}}" defer></script>
    <script src="{{asset('assets/js/main.js')}}" defer></script>
</head>

<body>

    <div class="wrapper">

        <header class="header">
            <div class="header-top py-1">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-sm-4">
                            <div class="header-top-phone d-flex align-items-center h-100">
                                <i class="fa-solid fa-mobile-screen"></i>
                                <a href="tel:+1234567890" class="ms-2">123-456-7890</a>
                            </div>
                        </div>

                        <div class="col-sm-4 d-none d-sm-block">
                            <ul class="social-icons d-flex justify-content-center">
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-4">
                            <div class="header-top-account d-flex justify-content-end">
                                <div class="btn-group me-2">
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Account
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#">Sign In</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">Sign Up</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- ./header-top-account -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./header-top -->

            <div class="header-middle bg-white py-4">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-sm-6">
                            <a wire:navigate href="{{route('home')}}" class="header-logo h1">E-Shop</a>
                        </div>

                        <div class="col-sm-6 mt-2 mt-md-0">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="s" placeholder="Searching..."
                                        aria-label="Searching..." aria-describedby="button-search">
                                    <button class="btn btn-outline-warning" type="submit" id="button-search">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
            <!-- ./header-middle -->
        </header>

        <div class="header-bottom sticky-top" id="header-nav">
            <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-start" id="offcanvasNavbar" tabindex="-1"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Catalog</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a wire:navigate class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a wire:navigate class="nav-link" href="{{route('category')}}">Category</a>
                                </li>
                                <li class="nav-item">
                                    <a wire:navigate class="nav-link" href="{{route('product')}}">Product</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false" data-bs-auto-close="outside">
                                        Catalog
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="category.html">Shoes</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="category.html">Jeans</a>
                                        </li>
                                        <li class="nav-item dropend">
                                            <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                                data-bs-auto-close="outside">Sportswear</a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="category.html">Men's Sportswear</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="category.html">Women's Sportswear</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="category.html">Baby's Sportswear</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="category.html">Coat</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="category.html">Shirts</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <livewire:cart.cart-icon-component />

                </div>
            </nav>
        </div>
        <!-- ./header-bottom -->

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasCartLabel">Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="table-responsive">
                    <table class="table offcanvasCart-table">
                        <tbody>
                            <tr>
                                <td class="product-img-td"><a href="#"><img src="assets/img/products/1.jpg" alt=""></a>
                                </td>
                                <td><a href="#">Product 1 Lorem ipsum dolor, sit amet consectetur adipisicing.</a></td>
                                <td>$65</td>
                                <td>&times;1</td>
                                <td><button class="btn btn-danger"><i class="fa-regular fa-circle-xmark"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img-td"><a href="#"><img src="assets/img/products/2.jpg" alt=""></a>
                                </td>
                                <td><a href="#">Product 2</a></td>
                                <td>$80</td>
                                <td>&times;2</td>
                                <td><button class="btn btn-danger"><i class="fa-regular fa-circle-xmark"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-img-td"><a href="#"><img src="assets/img/products/3.jpg" alt=""></a>
                                </td>
                                <td><a href="#">Product 3</a></td>
                                <td>$100</td>
                                <td>&times;1</td>
                                <td><button class="btn btn-danger"><i class="fa-regular fa-circle-xmark"></i></button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end">Total:</td>
                                <td>$325</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="text-end mt-3">
                    <a href="#" class="btn btn-outline-warning">Cart</a>
                    <a href="#" class="btn btn-outline-secondary">Checkout</a>
                </div>

            </div>
        </div>

        <main class="main">

            {{$slot}}

        </main>

        <footer class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <h4>Information</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('category')}}">Category</a></li>
                            <li><a href="{{route('product')}}">Product</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6">
                        <h4>Working hours</h4>
                        <ul class="list-unstyled">
                            <li>Paris, str. Bretan</li>
                            <li>mon-fri: 9:00 - 18:00</li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6">
                        <h4>Contacts</h4>
                        <ul class="list-unstyled">
                            <li><a href="tel:1234567890">123-456-7890</a></li>
                            <li><a href="tel:0987654321">098-765-4321</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6">
                        <h4>Follow us</h4>
                        <ul class="footer-icons">
                            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <button id="top">
        <i class="fa-solid fa-angles-up"></i>
    </button>

</body>

</html>