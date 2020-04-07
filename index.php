<?php
session_start();
//if (isset($_SESSION['username'])){
//    setcookie("cookieUsername", $_SESSION['username'], time()+3600);
//    setcookie("cookieRole", $_SESSION['role'], time()+3600);
//}
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
<!-- Your custom scripts (optional) -->
<script type="text/javascript" src="js/lightbox.js"></script>

<link href="css/lightbox.css" rel="stylesheet"/>

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

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Changing Costs</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-4">
                    <div class="idRecipe" id="idRecipe"></div>
                    <div class="recipe_name" id="recipe_name"></div>
                    <div class="costToChange" id="costToChange"></div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="chCost_button" class="btn btn-default">Change</button>
                <button id="delRecipe_button" class="btn btn-default">Delete recipe</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModalLabel"
     aria-hidden="true" action="https://perfectmoney.com/api/step1.asp" method="POST">

    <div class="modal-dialog" role="action" action="https://perfectmoney.com/api/step1.asp" method="POST">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Buy recipe</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-4">
                    <div class="payModalidRecipeName" id="payModalidRecipeName"></div>
                    <div class="payModalRecipeCost" id="payModalRecipeCost"></div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">

                <form action="https://perfectmoney.com/api/step1.asp" method="POST">

                    <div class="payModalPMForm" id="payModalPMForm"></div>
                </form>

            </div>
        </div>
    </div>
</div>



<!-- ========================================================================================== -->



<div clas="row justify-content-center"><div class="col-lg-12 col-md-10 align-content-center">
        <div class="text-center">


                <p>ШАПКА ШАПКА ШАПКА ШАПКА ШАПКА ШАПКА ШАПКА ШАПКА ШАПКА ШАПКА ШАПКА ШАПКА ШАПКА ШАПКА ШАПКА</p>


        </div>
    </div></div>
<div class="row wow fadeIn justify-content-center">

<div class="col-10 border align-content-center">
        <div class="text-justify">

<h5 class="h5-responsive">
                <p class="font-italic">Welcome to&nbsp;our site. Here you can find useful information for yourself. namely, you can find here some recipes for dishes and drinks that will help you maintain your immunity, be&nbsp;healthy and strong both outside and spiritually. Also here are recipes of&nbsp;food that can be&nbsp;stored for a&nbsp;long time.&nbsp;it&nbsp;will help you in&nbsp;the struggle for survival in&nbsp;the event of&nbsp;various unpredictable events in&nbsp;this world. and, of&nbsp;course, here you can find recipes and tips for everyday life, which will give you the opportunity to&nbsp;independently create substances and fluids for your body, things and etc. and also you will not need some things, for example, hand sanitizers and objects, because you will learn to&nbsp;make them yourself. You have probably heard that few in&nbsp;Russia have a&nbsp;terrible virus. I&nbsp;think this is&nbsp;because many, like my&nbsp;family, use these recipes presented by&nbsp;me. and you can use some specific advice or&nbsp;collect the entire collection of&nbsp;our secrets and recipes. and remember that when you buy you are not buying a&nbsp;picture. you are buying the contents of&nbsp;the text. you take all the risk of&nbsp;the purchase, because after reading the contents you cannot return&nbsp;it. I&nbsp;warned and you agree if&nbsp;you buy.&nbsp;we&nbsp;conclude such an&nbsp;agreement between&nbsp;us since you and&nbsp;I know that now there are many scammers in&nbsp;the world. and&nbsp;I don&rsquo;t want to&nbsp;be&nbsp;deceived. and i&nbsp;think you too. I&nbsp;hope that I&nbsp;do not insult anyone and do&nbsp;not offend him.&nbsp;my&nbsp;website is&nbsp;made from the heart for people. I&nbsp;apologize that part of&nbsp;it&nbsp;is&nbsp;not free. but this is&nbsp;my&nbsp;bread. Best wishes to&nbsp;any of&nbsp;you and wish everyone to&nbsp;survive and to&nbsp;be&nbsp;healthy.</p>
</h5>

        </div>
</div>
<div class="col-2 border align-content-center">
        <div class="text-center">


                <p>БАННЕР</p>


        </div>
</div>
</div>


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
                if (isset($_COOKIE["cookieUsername"])) {
                    ?>
                    <li class="nav-item navbar-brand waves-effect">
                        <strong class blue-text><?php
                            echo $_COOKIE["cookieUsername"];
                            ?>
                        </strong>
                    </li>
                    <button id="logout_button" type="button" class="btn btn-danger">Logout</button>
                    <?php
                    if ($_COOKIE['cookieRole'] > 10) {
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
                                            <input type="file" class="custom-file-input" id="iconfile"
                                                   aria-describedby="iconfile">
                                            <label class="custom-file-label" for="iconfilelabel">Choose file</label>
                                        </div>
                                    </div>
                                    <br/>
                                    <label>Lock icon</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon03">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="lciconfile"
                                                   aria-describedby="lciconfile">
                                            <label class="custom-file-label" for="lciconfilelabel">Choose file</label>
                                        </div>
                                    </div>
                                    <br>
                                    <label>Image</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="imagefile"
                                                   aria-describedby="imagefile">
                                            <label class="custom-file-label" for="imagefilelabel">Choose file</label>
                                        </div>
                                    </div>

                                    <br/>
                                    <label>Category</label>
                                    <select class="browser-default custom-select" id="category_selected" name="category_selected">
                                        <option value="5" selected="selected" >First dishes</option>
                                        <option value="6">Meal of long-term storage</option>
                                        <option value="7">Beverage with your own handes</option>
                                        <option value="8">Useful medical, survival and home tips and recipes</option>
                                    </select>

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


            <!--<ul class="navbar-nav nav-flex-icons">
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
            </ul>-->
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
