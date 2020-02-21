function init() {
    $.post("php/action.php",{
        "action":"init"
    },
    show_recipes
    );
}

function show_recipes(data) {
    var goods = JSON.parse(data);
    console.log(goods);
    var out = ' <section class="text-center mb-4"> ';
    out += '<div class="row wow fadeIn">';
    for (var key in goods) {
        out += '<div class="col-lg-3 col-md-6 mb-4">';
        out += '<div class="card">';
        out += '<div class="view overlay">';
        out += '<img class="card-img-top" src="img/recipe_icons/' + goods[key].icon + '"alt="Recipe1">';
        out += '<a href="">';
        out += '<div class="mask rgba-white-slight"></div>';
        out += '</a>';
        out += '</div>';
        // out += '<div class="card-body text-center">';
        // out += '<h4 class="font-weight-bold blue-text">';
        // out += '<strong>' + goods[key].cost + '$</strong>';
        // out += '</h4>';
        // out += '</div>';
        out += '</div>';
        out += '</div>';
    }
    out += '</div>';
    $('.goods-out').html(out);
}

function submitForm() {
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var email = $("#email").val();
    var message = $("#message").val();

    $.ajax({
        type: "POST",
        url: "php/form-process.php",
        data: "name=" + name + "&email=" + email + "&message=" + message,
        success: function (text) {
            console.log("howdy3");
            if (text == "success") {
                console.log("howdy4");
                formSuccess();
            } else {
                console.log("howdy5");
                formError();
                submitMSG(false, text);
            }
        }
    });
}

function formSuccess() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Message Submitted!")
}

function formError() {
    console.log("howdy6");
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass();
    });
}

function submitMSG(valid, msg) {
    if (valid) {
        console.log("howdy7");
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        console.log("howdy8");
        var msgClasses = "h3 text-center text-danger";
    }
    console.log("howdy9");
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}

$("#loginForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        console.log("howdy1");
        formError();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        // everything looks good!
        submitMSG(false, "all is cool");
        console.log("howdy2");
        event.preventDefault();
        submitForm();
    }
});

$(document).ready(function () {
    init();
    $('#login_button').click(function () {
        var username = $('#username').val();
        var password = $('#password').val();
        if (username != '' && password != '') {
            $.ajax({
                url: "php/action.php",
                method: "POST",
                data: {username: username, password: password},
                success: function (data) {
                    //alert(data);
                    if (data == 'No') {
                        alert("Wrong Login or Password");
                    } else {
                        $('#loginModal').hide();
                        location.reload();
                    }
                }
            });
        } else {
            alert("Both Fields are required");
        }
    });
    $('#logout_button').click(function () {
        var action = "logout";
        $.ajax({
            url: "php/action.php",
            method: "POST",
            data: {action: action},
            success: function () {
                location.reload();
            }
        });
    });
    $('#add_recipe_button').click(function () {

        var action = "add_recipe";
        var name = $('#name').val();
        // var icon = $('#icon').val();
        // var image = $('#image').val();
        var cost = $('#cost').val();
        var image = "recipe1.png";
        var icon = "icon1.png";
        if (name != '' && image != '') {
            $.ajax({
                url: "php/action.php",
                method: "POST",
                data: {name: name, icon: icon, image: image, cost: cost, action: action},
                success: function (data) {
                    //alert(data);
                    if (data == 'No') {
                        alert("something went wrong");
                    } else {
                        $('#ModalRecipeAddForm').hide();
                        location.reload();
                    }
                }
            });
        } else {
            alert("Empty fields found!!!");
        }
    });
    $('.inputGroupFile01').file_upload();
});

