<?php
session_start();
?>
<!DOCTYPE html>
<!-- jQuery -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/validator.min.js"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript" src="js/form-scripts.js"></script>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recipes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/animate.css">
    <style>
        html,
        body,
        header,
        .carousel {
            height: 60vh;
        }

        @media (max-width: 740px) {
            html,
            body,
            header,
            .carousel {
                height: 100%;
            }

            @media (min-width: 800px) and (max-width: 850px) {
                html,
                body,
                header,
                .carousel {
                    height: 100%;
                }
            }
        }
    </style>
</head>
<body>


<nav class="navbar fixed top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">
        <a href="#" class="navbar-brand waves-effect">
            <strong class blue-text>Recipes</strong>
        </a>
        <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <li class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto">
                <!--             <li class="nav-item active">
                                 <a href="#" class="nav-link waves-effect">Home</a>
                             </li>
                             <li class="nav-item">
                                 <a href="#" class="nav-link waves-effect">Product</a>
                             </li>
                             <li class="nav-item">
                                 <a href="#" class="nav-link waves-effect">About us</a>
                             </li>
                             <li class="nav-item">
                                 <a href="#" class="nav-link waves-effect">Blog</a>
                             </li>
                             -->
                <?php
                if (isset($_SESSION['username'])) {
                    ?>
                    <li class="nav-item navbar-brand waves-effect">
                        <strong class blue-text><?php echo $_SESSION['username']; ?></strong>
                    </li>
                    <button id="logout_button" type="button" class="btn btn-danger">Logout</button>


                    <?php
                } else {
                    ?>
                    <!-- Button trigger modal -->
                    <button id="modalActivate" type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#ModalLoginForm">
                        Sign in/up
                    </button>
                    <?php
                }
                ?>
            </ul>

            <!-- Modal -->

            <div class="modal fade right shake" id="ModalLoginForm" tabindex="-1" role="form"
                 aria-labelledby="ModalLoginFormLabel" aria-hidden="true" data-toggle="validator">
                <form role="dialog" id="loginForm" data-toggle="validator" class="shake">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLoginFormLabel">Sign in or up</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group col-sm-6">
                                    <label>Username</label>

                                    <input type="text" class="form-control" name="username" id="username"
                                           placeholder="Enter name"
                                           required>
                                    <div class="help-block with-errors"></div>
                                    <br/>
                                    <label>Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                           placeholder="Enter password"
                                           required/>
                                    <div class="help-block with-errors"></div>
                                    <br/>
                                </div>
                                <div class="modal-footer d-flex justify-content-left">
                                    <button type="button" name="login_button" id="login_button" class="btn btn-warning">
                                        Login
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>


            <!-- Modal -->


            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a href="#" class="nav-link waves-effect">
                        <span class="badge red z-depth-1 mr-1">13</span>
                        <i class="fa fa-shopping-cart"></i>
                        <span class="clearfix d-none d-sm-inline-block">Cart</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link waves-effect">
                        <i class="fab fa-facebook"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link waves-effect">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link border border-light rounded waves-effect">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
    </div>
    </div>
</nav>

<!-- Слайдер
<div id="carousel-ex" class="carousel slide carousel-fade pt4" data-ride="carousel">
    <ol class="carousel-indicators">
        <li class="active" data-target="#carosel-ex" data-slide-to="0"></li>
        <li data-target="#carousel-ex" data-slide-to="1"></li>
        <li data-target="#carousel-ex" data-slide-to="2"></li>
        <li data-target="#carousel-ex" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" role="" listbox>

        <div class="carousel-item active">
            <div class="view" style="background-image: url('https://images.pexels.com/photos/2284166/pexels-photo-2284166.jpeg?auto=compress&cs=tinysrgb&h=650&w=940');
background-repeat: no-repeat; background-size: cover;">
                <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb4">
                            <strong>Recipes here h1</strong>
                        </h1>
                        <p>
                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, quae.</strong>
                        </p>

                        <p class="mb-4 d-none d-mdblock">
                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, asperiores
                                debitis dignissimos eius excepturi laboriosam libero praesentium ratione rerum
                                sunt!</strong>
                        </p>
                        <a href="" class="btn btn-outline-white btn-lg">
                            Lorem ipsum dolor. <i class="fa fa-graduation-cap ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="view" style="background-image: url('https://images.pexels.com/photos/1435895/pexels-photo-1435895.jpeg?auto=compress&cs=tinysrgb&h=650&w=940');
background-repeat: no-repeat; background-size: cover;">
                <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb4">
                            <strong>Recipes here h1</strong>
                        </h1>
                        <p>
                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, quae.</strong>
                        </p>

                        <p class="mb-4 d-none d-mdblock">
                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, asperiores
                                debitis dignissimos eius excepturi laboriosam libero praesentium ratione rerum
                                sunt!</strong>
                        </p>
                        <a href="" class="btn btn-outline-white btn-lg">
                            Lorem ipsum dolor. <i class="fa fa-graduation-cap ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="view" style="background-image: url('https://images.pexels.com/photos/357743/pexels-photo-357743.jpeg?auto=compress&cs=tinysrgb&h=650&w=940');
background-repeat: no-repeat; background-size: cover;">
                <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb4">
                            <strong>Recipes here h1</strong>
                        </h1>
                        <p>
                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, quae.</strong>
                        </p>

                        <p class="mb-4 d-none d-mdblock">
                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, asperiores
                                debitis dignissimos eius excepturi laboriosam libero praesentium ratione rerum
                                sunt!</strong>
                        </p>
                        <a href="" class="btn btn-outline-white btn-lg">
                            Lorem ipsum dolor. <i class="fa fa-graduation-cap ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="view" style="background-image: url('https://images.pexels.com/photos/1565982/pexels-photo-1565982.jpeg?auto=compress&cs=tinysrgb&h=650&w=940');
background-repeat: no-repeat; background-size: cover;">
                <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb4">
                            <strong>Recipes here h1</strong>
                        </h1>
                        <p>
                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, quae.</strong>
                        </p>

                        <p class="mb-4 d-none d-mdblock">
                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, asperiores
                                debitis dignissimos eius excepturi laboriosam libero praesentium ratione rerum
                                sunt!</strong>
                        </p>
                        <a href="" class="btn btn-outline-white btn-lg">
                            Lorem ipsum dolor. <i class="fa fa-graduation-cap ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <a href="#carousel-ex" class="carousel-control-prev"
       role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a href="#carousel-ex" class="carousel-control-next"
       role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>
-->


<main>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">
            <span class="navbar-brand">Categories:</span>
            <button class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#nextNav"
                    aria-controls="nextNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nextNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">All</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Первые блюда</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Вторые блюда</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Десерты</a>
                    </li>
                </ul>
                <!-- Search

                <form class="form-inline">
                    <div class="md-form my-0">
                        <input type="text" class="form-control mr-sm-2" placeholder="Search" aria-label="Search">
                    </div>
                </form>

                -->
            </div>
        </nav>
        <section class="text-center mb-4">
            <!-- Добавляем строки -->
            <div class="row wow fadeIn">

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row wow fadeIn">

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row wow fadeIn">

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row wow fadeIn">

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">

                        <div class="view overlay">
                            <img class="card-img-top"
                                 src="https://images.pexels.com/photos/691114/pexels-photo-691114.jpeg?auto=compress&cs=tinysrgb&h=150&w=350"
                                 alt="Recipe1">
                            <a href="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <a href="" class="grey-text">
                                <h5>Первое блюдо</h5>
                            </a>
                            <h5>
                                <strong>
                                    <a href="#" class="dark-grey-text">Название рецепта<span
                                                class="badge badge-pill danger-color">New</span></a>
                                </strong>
                            </h5>
                            <h4 class="font-weight-bold blue-text">
                                <strong>200$</strong>
                            </h4>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <nav class="d-flex justify-content-center wow fadeIn">
            <ul class="pagination pg-blue">
                <li class="page-item disabled">
                    <a href="" class="page-link" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active">
                    <a href="" class="page-link" aria-label="Next">
                        <span aria-hidden="true">1</span>
                    </a>
                </li>
                <li class="page-item ">
                    <a href="" class="page-link" aria-label="Previous">
                        <span aria-hidden="true">2</span>
                    </a>
                </li>
                <li class="page-item ">
                    <a href="" class="page-link" aria-label="Previous">
                        <span aria-hidden="true">3</span>
                    </a>
                </li>
                <li class="page-item">
                    <a href="" class="page-link" aria-label="Previous">
                        <span aria-hidden="true">4</span>
                    </a>
                </li>
                <li class="page-item">
                    <a href="" class="page-link" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</main>

<form role="form" id="contactForm" data-toggle="validator" class="shake">
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="name" class="h4">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" required
                   data-error="NEW ERROR MESSAGE">
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group col-sm-6">
            <label for="email" class="h4">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" required>
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="message" class="h4 ">Message</label>
        <textarea id="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
        <div class="help-block with-errors"></div>
    </div>
    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
    <div id="msgSubmit" class="h3 text-center hidden"></div>
    <div class="clearfix"></div>
</form>


</body>
</html>
