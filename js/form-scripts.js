function init() {
    $.post("php/action.php", {
            "action": "init"
        },
        show_recipes
    );
}

function show_recipes(data) {
    var goods = JSON.parse(data);
    console.log(goods);
    var role=getCookie('cookieRole');
    var category = 0;
    var flag = 0;
    var itemCount = 0;
    var out = ' <section class="text-center mb-auto"> ';
    // out += '<div class="row wow fadeIn">';
   if(role<11) {
       for (var key in goods) {
           if (goods[key].category_id != category) {
               category = goods[key].category_id;
               if (flag != 0) {
                   out += '</div>';
                   out += '</div>';
                   flag = 1;
               }
               out += '<div>';
               out += '<div class="row wow fadeIn">';
               out += '<div class="col-1 align-self-center"><h1 class="align-text-bottom"><span class="badge badge-primary">' + ' S<br /> <br />O<br /> <br />U<br /> <br />P<br /> <br />S' + '</span></div>';
               out += '<div class="col-11">';
               // out += '<div><h1><span class="badge badge-primary">' + goods[key].category_name + '</span></h1>';
               out += '<div class="row wow fadeIn">';
           }
           if (itemCount > 10) {
               out += '</div>';
               out += '<div class="row wow fadeIn">';
               itemCount = 0;
           }
           itemCount++;
           out += '<div class="col-4 col-md-3 col-lg-2 col-xl-1 mb-3">';
           out += '<div class="view overlay">';
           out += '<a href="img/recipes/' + goods[key].image + '" data-lightbox="' + goods[key].recipe_name + '">';
           out += '<img class="card-img-top img-fluid" src="img/recipe_icons/' + goods[key].icon + '"alt="' + goods[key].name + '">';
           out += '<div class="mask rgba-white-slight"></div>';
           out += '</a>';
           out += '</div>';
           out += '</div>';
       }
   }
else
    {
        for (var key in goods) {
            if (goods[key].category_id != category) {
                category = goods[key].category_id;
                if (flag != 0) {
                    out += '</div>';
                    out += '</div>';
                    flag = 1;
                }
                out += '<div>';
                out += '<div class="row wow fadeIn">';
                out += '<div class="col-1 align-self-center"><h1 class="align-text-bottom"><span class="badge badge-primary">' + ' S<br /> <br />O<br /> <br />U<br /> <br />P<br /> <br />S' + '</span></div>';
                out += '<div class="col-11">';
                // out += '<div><h1><span class="badge badge-primary">' + goods[key].category_name + '</span></h1>';
                out += '<div class="row wow fadeIn">';
            }
            if (itemCount > 10) {
                out += '</div>';
                out += '<div class="row wow fadeIn">';
                itemCount = 0;
            }
            itemCount++;
            out += '<div class="col-4 col-md-3 col-lg-2 col-xl-1 mb-3" id="resres" onclick="open_recipe(' + goods[key].id + ',' + goods[key].cost + ')">';
            // out += '<div class="view overlay">';
            // out += '<a href="img/recipes/' + goods[key].image + '" data-lightbox="' + goods[key].recipe_name + '">';
            out += '<img class="card-img-top img-fluid" src="img/recipe_icons/' + goods[key].icon + '"alt="' + goods[key].name + '">';
            out += '<div class="mask rgba-white-slight"></div>';
            out += '</a>';
            // out += '</div>';
            out += '</div>';
        }
    }

    out += '</div>';
    out += '</div>';
    out += '</div>';
    out += '</div>';
    $('.goods-out').html(out);
}

function open_recipe(id,cost) {

    var outid='<input type="text" name="id_currentrecipe" id="id_currentrecipe" hidden="true" value="'+ id +'">';
    var out='<input type="text" name="newcost" id="newcost" value="'+ cost +'">';
    $('.idRecipe').html(outid);
    $('.costToChange').html(out);
    $("#myModal1").modal('show');

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

function deleteCookie(name) {
    setCookie(name, "", {
        'max-age': -1
    })
}

function setCookie(name, value, options = {}) {

    options = {
        path: '/',
        // при необходимости добавьте другие значения по умолчанию
        ...options
    };

    if (options.expires instanceof Date) {
        options.expires = options.expires.toUTCString();
    }

    let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

    for (let optionKey in options) {
        updatedCookie += "; " + optionKey;
        let optionValue = options[optionKey];
        if (optionValue !== true) {
            updatedCookie += "=" + optionValue;
        }
    }

    document.cookie = updatedCookie;
}

function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : -1;
}

function logined(data) {
    // alert(data);
    // var userInfo = JSON.parse(data);
    if (data == 'No') {
        alert("Wrong Login or Password");
    } else {
        var userInfo = JSON.parse(data);
        setCookie('cookieUsername',userInfo[0]);
        setCookie('cookieRole',userInfo[1]);
        $('#loginModal').hide();
        location.reload();
    }
}

function chCost(data){
    if (data == 'No') {
        alert("Something going wrong");
    } else {
        $('#ModalRecipeAddForm').hide();
        location.reload();
    }
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

        $.post("php/action.php", {
                "action": "login",
                'username': username,
                'password': password
            },
            logined
        );

        // if (username != '' && password != '') {
        //     $.ajax({
        //         url: "php/action.php",
        //         method: "POST",
        //         data: {username: username, password: password},
        //         logined});
        //     // location.reload();
        // } else {
        //     alert("Both Fields are required");
        // }
    });
    $('#logout_button').click(function () {
        var action = "logout";
        deleteCookie('cookieUsername');
        deleteCookie('cookieRole');
        // location.reload();
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
    // $('.inputGroupFile01').file_upload();
    $('#modalCurrentRecipe').click(function () {
        //открыть модальное окно с id="myModal"
        $("#ModalRecipeAddForm").show();
    });
    $('#chCost_button').click(function () {
        var id=$('#id_currentrecipe').val();
        var newCost=$('#newcost').val();
        $.post("php/action.php", {
                "action": "chCost",
                'id': id,
                'newcost': newCost
            },
            chCost
        );
    });
});

