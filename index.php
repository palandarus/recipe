<?php
session_start();
?>
<!DOCTYPE html>
<!-- jQuery -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/validator.min.js"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript" src="js/form-scripts.js"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript" src="js/lightbox.js"></script>
<link href="css/lightbox.css" rel="stylesheet" />

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
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/wrapper.css">

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

                <?php
                if (isset($_SESSION['username'])) {
                    ?>
                    <li class="nav-item navbar-brand waves-effect">
                        <strong class blue-text><?php
                            echo $_SESSION['username'];
                            ?>
                        </strong>
                    </li>
                    <button id="logout_button" type="button" class="btn btn-danger">Logout</button>
                    <?php
                    if ($_SESSION['role'] > 10) {
                        ?>
                        <button id="modal_addrecipeActivate" type="button"
                                class="btn btn-outline-secondary waves-effect px-3" data-toggle="modal"
                                data-target="#ModalRecipeAddForm"><i class="fas fa-folder-plus"
                                                                     aria-hidden="true"></i></button>
                        <?php
                    }
                    ?>

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

            <div class="modal fade shake" id="ModalRecipeAddForm" tabindex="-1" role="form"
                 aria-labelledby="ModalRecipeAddFormLabel" aria-hidden="true">
                <form role="dialog" id="addRecipeForm" data-toggle="validator" class="shake">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalRecipeAddFormLabel">Adding recipe</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Recipe name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="Enter name of recipe"
                                           required>
                                    <div class="help-block with-errors"></div>
                                    <br/>
                                    <label>Icon</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                   aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    <br/>
                                    <label>Image</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02"
                                                   aria-describedby="inputGroupFileAddon02">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                        </div>
                                    </div>
                                    <br/>
                                    <label>Cost</label>
                                    <input type="number" name="cost" id="cost" class="form-control"
                                           placeholder="Enter Cost"
                                           required/>
                                    <div class="help-block with-errors"></div>
                                    <br/>
                                </div>
                                <div class="modal-footer d-flex justify-content-left">
                                    <button type="button" name="add_recipe_button" id="add_recipe_button"
                                            class="btn btn-warning">
                                        Add recipe
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
<main>

    <div class="container-fluid">
            <div class="goods-out"></div>

    </div>

</main>


</body>
</html>
