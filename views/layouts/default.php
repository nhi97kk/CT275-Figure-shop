<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?= $this->e($title) ?>
    </title>

    <!-- Styles -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/style.css" rel="stylesheet">

    <?= $this->section("page_specific_css") ?>

</head>

<body style="
    background-image: linear-gradient(180deg,#536b72,#0b3975a8); min-height: 100vh;
";>
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <a class="navbar-brand" href="/">
            <i class="fa-solid fa-motorcycle"></i>
            <b>
                <?= $this->e($title) ?>
            </b>
        </a>
        <?php if (!\App\SessionGuard::isUserLoggedIn() ||\App\SessionGuard::isUserLoggedIn() && \App\SessionGuard::user()->role === 0): ?>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/product">Products</a>
            </li>
        </ul>
        <?php endif ?>
        <ul class="navbar-nav ml-auto align-items-center">
                <!-- Authentication Links -->
                <?php if (!\App\SessionGuard::isUserLoggedIn()): ?>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                <?php else: ?>
                    <?php if (\App\SessionGuard::isUserLoggedIn() && \App\SessionGuard::user()->role === 0): ?>
                        <li class="nav-item">
                            <a href="/cart" class="nav-link mr-3"><i style="font-size: 1.5rem;"
                                    class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="/order" class="nav-link mr-3">Order</a>
                        </li>
                    <?php endif ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex flex-column align-items-center " href="#" role="button"
                            data-toggle="dropdown">
                            <i class="fa-solid fa-user"></i>
                            <?= $this->e(\App\SessionGuard::user()->username) ?>
                            <span class="caret"></span>

                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/logout"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" class="d-none" action="/logout" method="POST">
                            </form>
                        </div>
                    </li>
                <?php endif ?>
            </ul>
    </nav>

    <?= $this->section("page") ?>

    <footer class="footer mt-3 fixed-bottom" style="background-color: aliceblue;">
        <div class="container text-center">
            <p class="text-muted m-0">Contact with our --> <i class="fa-brands fa-facebook"></i>  <i class="fa-brands fa-instagram"></i></p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
        </script>

    <?= $this->section("page_specific_js") ?>
</body>

</html>