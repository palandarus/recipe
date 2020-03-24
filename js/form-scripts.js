function init() {
    $.post("php/action.php", {
            "action": "init"
        },
        show_recipes
    );
}

function getColumnRecipe(data) {
    var out = '';
    if (data.cost > 0) {
        out += '<div class="col-12 mb-3" onclick="showModalPayForm(' + data.name + ',' + data.cost + ',' + data.id + ',' + getCookie('cookieUserID') + ')">';
        out += '<img class="card-img-top img-fluid" src="img/recipe_icons/lc/' + data.icon + '"alt="' + data.name + '">';
        out += '<div class="mask rgba-white-slight"></div>';
        out += '</a>';
        out += '</div>';
    } else {
        out += '<div class="col-12 mb-3">';
        out += '<div class="view overlay">';
        out += '<a href="img/recipes/' + data.image + '" data-lightbox="' + data.recipe_name + '">';
        out += '<img class="card-img-top img-fluid" src="img/recipe_icons/' + data.icon + '"alt="' + data.name + '">';
        out += '<div class="mask rgba-white-slight"></div>';
        out += '</a>';
        out += '</div>';
        out += '</div>';
    }
    return out;
}

function showModalPayForm(name, cost, id, user_id) {
    var outname ;
    var outcost ;
    var outpmform;
    if(user_id != -1) {
        outname = '<input type="text" name="id_currentrecipe" id="id_currentrecipe" hidden="true" value="' + name + '">';
        outcost = '<input type="text" name="newcost" id="newcost" value="' + cost + '">';
        outpmform = '<form action="https://perfectmoney.com/api/step1.asp" method="POST">\n' +
            '<input type="hidden" name="PAYEE_ACCOUNT" value="U18759053">\n' +
            '<input type="hidden" name="PAYEE_NAME" value="antivrecipes.com">\n' +
            '<input type="hidden" name="PAYMENT_ID" value="fromRecipesStore">\n' +
            '<input type="hidden" name="PAYMENT_AMOUNT" value="' + cost + '"><BR>\n' +
            '<input type="hidden" name="PAYMENT_UNITS" value="USD">\n' +
            '<input type="hidden" name="STATUS_URL" value="http://itcrown.ru/development/recipes/php/pmevent.php">\n' +
            '<input type="hidden" name="PAYMENT_URL" value="http://itcrown.ru/development/recipes/php/pmsuccess.php">\n' +
            '<input type="hidden" name="PAYMENT_URL_METHOD" value="LINK">\n' +
            '<input type="hidden" name="NOPAYMENT_URL" value="http://itcrown.ru/development/recipes/index.php">\n' +
            '<input type="hidden" name="NOPAYMENT_URL_METHOD" value="LINK">\n' +
            '<input type="hidden" name="SUGGESTED_MEMO" value="">\n' +
            '<input type="hidden" name="RECIPE_ID" value=" ' + id + ' ">\n' +
            '<input type="hidden" name="USER_ID" value=" ' + user_id + ' ">\n' +
            '<input type="hidden" name="BAGGAGE_FIELDS" value="RECIPE_ID USER_ID">\n' +
            '<input type="submit" class="btn btn-default" name="PAYMENT_METHOD" value="Buy Recipe">\n' +
            '</form>';
    }
    else{
        outname='<h5><p>Current recipe is locked</p></h5>';
        outcost='<h5><p>You should sing in to buy it</p></h5>';
        outpmform='<button id="modalActivate" type="button" class="btn btn-danger" data-toggle="modal"\n' +
            '                            data-target="#ModalLoginForm">\n' +
            '                        Sign in/up\n' +
            '                    </button>';

    }
    $('.payModalidRecipeName').html(outname);
    $('.payModalRecipeCost').html(outcost);
    $('.payModalPMForm').html(outpmform);
    $("#payModal").modal('show');

}

function show_recipes(data) {
    var goods = JSON.parse(data);
    console.log(goods);
    var role = getCookie('cookieRole');
    var category = 0;
    var flag = 0;
    var itemCount = 0;
    var out = ' <section class="text-center mb-auto"> ';
    var rowcount = 0;
    var cat1Array = new Array();
    var cat2Array = new Array();
    var cat3Array = new Array();
    var cat4Array = new Array();
    // out += '<div class="row wow fadeIn">';
    out += '<div class="row wow fadeIn">';
    if (role < 11) {
        for (var key in goods) {

            if (goods[key].category_id != category) itemCount = 0;
            category = goods[key].category_id;

            if (category == 5) {
                if (itemCount == 0) {
                    var catname = goods[key].category_name;
                    var catnameForOut = '';
                    for (let char in catname) {
                        catnameForOut += catname[char].toUpperCase() + '<br />';
                    }
                    cat1Array[0] = '<div class="col-4 col-md-3 col-lg-2 col-xl-1 mb-3 align-self-center"><h1 class="align-text-bottom"><span class="badge badge-primary">' + catnameForOut + '</span></h1></div>';
                    for (let i = 1; i < 12; i++) {
                        cat1Array[i] = '<div class="col-4 col-md-3 col-lg-2 col-xl-1 mb-3">';
                    }
                    itemCount++;
                }

                if (itemCount != 0) {
                    cat1Array[itemCount] += getColumnRecipe(goods[key]);
                }


                if (itemCount == 11) itemCount = 1;
                else itemCount++;
            }
            if (category == 6) {
                if (itemCount == 0) {
                    var catname = goods[key].category_name;
                    var catnameForOut = '';
                    for (let char in catname) {
                        catnameForOut += catname[char].toUpperCase() + '<br />';
                    }
                    cat2Array[0] = '<div class="row d-flex justify-content-center wow fadeIn"><div class="col-4 col-md-3 col-lg-2 col-xl-1 mb-3 align-self-center"><h1 class="align-text-bottom"><span class="badge badge-primary">' + catnameForOut + '</span></h1></div>';
                    cat2Array[11] = '<div class="col-4 col-md-3 col-lg-2 col-xl-1 mb-4 align-self-center"><h1 class="align-text-bottom"><h5 class="h5-responsive"><span class="text-justify">' + goods[key].description + '</span></h5>';
                    for (let i = 1; i < 11; i++) {
                        cat2Array[i] = '<div class="col-4 col-md-3 col-lg-2 col-xl-1 mb-3">';
                    }
                    itemCount++;
                }

                if (itemCount != 0) {
                    cat2Array[itemCount] += getColumnRecipe(goods[key]);
                }


                if (itemCount == 10) itemCount = 1;
                else itemCount++;
            }

            if (category == 7) {
                if (itemCount == 0) {
                    var catname = goods[key].category_name;
                    var catnameForOut = '';
                    for (let char in catname) {
                        catnameForOut += catname[char].toUpperCase() + '<br />';
                    }
                    cat3Array[0] = '<div class="row d-flex justify-content-center wow fadeIn"><div class="col-12"><h1 class="align-text-bottom"><span class="badge badge-primary">' +
                        goods[key].category_name +
                        '</span></h1></div></div><div class="row d-flex justify-content-center wow fadeIn">';
                    for (let i = 1; i < 12; i++) {
                        cat3Array[i] = '<div class="col-4 col-md-3 col-lg-2 col-xl-1 mb-3  align-self-center">';
                    }
                    itemCount++;
                }

                if (itemCount != 0) {
                    cat3Array[itemCount] += getColumnRecipe(goods[key]);
                }


                if (itemCount == 11) itemCount = 1;
                else itemCount++;
            }
            if (category == 8) {
                if (itemCount == 0) {
                    var catname = goods[key].category_name;
                    var catnameForOut = '';
                    // for (let char in catname) {
                    //     catnameForOut += catname[char].toUpperCase() + '<br />';
                    // }
                    cat4Array[0] = '<div class="row d-flex justify-content-center wow fadeIn"><div class="col-12"><h1 class="align-text-bottom"><span class="badge badge-primary">' +
                        goods[key].category_name +
                        '</span></h1></div></div><div class="row d-flex justify-content-center wow fadeIn">';
                    for (let i = 1; i < 12; i++) {
                        cat4Array[i] = '<div class="col-4 col-md-3 col-lg-2 col-xl-1 mb-3  align-self-auto">';
                    }
                    itemCount++;
                }

                if (itemCount != 0) {
                    cat4Array[itemCount] += '<div class="col-12 mb-3">';
                    cat4Array[itemCount] += '<div class="view overlay">';
                    cat4Array[itemCount] += '<a href="img/recipes/' + goods[key].image + '" data-lightbox="' + goods[key].recipe_name + '">';
                    cat4Array[itemCount] += '<img class="card-img-top img-fluid" src="img/recipe_icons/' + goods[key].icon + '"alt="' + goods[key].name + '">';
                    cat4Array[itemCount] += '<div class="mask rgba-white-slight"></div>';
                    cat4Array[itemCount] += '</a>';
                    cat4Array[itemCount] += '</div>';
                    cat4Array[itemCount] += '</div>';
                }


                if (itemCount == 11) itemCount = 1;
                else itemCount++;
            }


        }
        // }
    } else {
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
    out += cat1Array[0];
    for (let i = 1; i < 12; i++) {
        cat1Array[i] += '</div>';
        out += cat1Array[i];
    }
    out += '</div>';
    out += '</div>';
    out += cat2Array[0];
    for (let i = 1; i < 12; i++) {
        cat2Array[i] += '</div>';
        out += cat2Array[i];
    }
    out += '</div>';
    out += '</div>';
    out += cat3Array[0];
    for (let i = 1; i < 12; i++) {
        cat3Array[i] += '</div>';
        out += cat3Array[i];
    }
    out += '</div>';
    out += '</div>';
    out += cat4Array[0];
    for (let i = 1; i < 12; i++) {
        cat4Array[i] += '</div>';
        out += cat4Array[i];
    }
    out += '</div>';
    out += '</div>';
    out += '</div>';
    out += '</section>';

    $('.goods-out').html(out);
}

function open_recipe(id, cost) {

    var outid = '<input type="text" name="id_currentrecipe" id="id_currentrecipe" hidden="true" value="' + id + '">';
    var out = '<input type="text" name="newcost" id="newcost" value="' + cost + '">';
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
        setCookie('cookieUsername', userInfo[0]);
        setCookie('cookieRole', userInfo[1]);
        setCookie('cookieUserID', userInfo[2]);
        $('#loginModal').hide();
        location.reload();
    }
}

function chCost(data) {
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
        deleteCookie('cookieUserID');
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
        var id = $('#id_currentrecipe').val();
        var newCost = $('#newcost').val();
        $.post("php/action.php", {
                "action": "chCost",
                'id': id,
                'newcost': newCost
            },
            chCost
        );
    });
});

