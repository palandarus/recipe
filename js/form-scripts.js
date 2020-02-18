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

$(document).ready(function(){
    $('#login_button').click(function(){
        var username = $('#username').val();
        var password = $('#password').val();
        if(username != '' && password != '')
        {
            $.ajax({
                url:"php/action.php",
                method:"POST",
                data: {username:username, password:password},
                success:function(data)
                {
                    //alert(data);
                    if(data == 'No')
                    {
                        alert("Wrong Data");
                    }
                    else
                    {
                        $('#loginModal').hide();
                        location.reload();
                    }
                }
            });
        }
        else
        {
            alert("Both Fields are required");
        }
    });
    $('#logout_button').click(function(){
        var action = "logout";
        $.ajax({
            url:"php/action.php",
            method:"POST",
            data:{action:action},
            success:function()
            {
                location.reload();
            }
        });
    });
});

function submitForm(){
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var email = $("#email").val();
    var message = $("#message").val();

    $.ajax({
        type: "POST",
        url: "php/form-process.php",
        data: "name=" + name + "&email=" + email + "&message=" + message,
        success : function(text){
            console.log("howdy3");
            if (text == "success"){
                console.log("howdy4");
                formSuccess();
            } else {
                console.log("howdy5");
                formError();
                submitMSG(false,text);
            }
        }
    });
}

function formSuccess(){
    $("#contactForm")[0].reset();
    submitMSG(true, "Message Submitted!")
}

function formError(){
    console.log("howdy6");
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        console.log("howdy7");
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        console.log("howdy8");
        var msgClasses = "h3 text-center text-danger";
    }
    console.log("howdy9");
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}