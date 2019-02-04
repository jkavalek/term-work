


$(document).ready(function() {




    $("#editaceUdaju").click(function() {


        var name = $("#nameEdit").val();
        var email = $("#emailEdit").val();
        var password = $("#passwordEdit").val();
        var cpassword = $("#cpasswordEdit").val();
        var telefon = $("#telefonEdit").val();



        if(name != ''){
            $.post("php/registrace.php", {
                name1: name
            }, function(data) {
        alert(data);
            });
        }

        if(email != ''){
            $.post("php/registrace.php", {

                email1: email
            }, function(data) {

            });
        }

        if(cpassword != ''){
            if ((password.length) < 5) {
                alert("Heslo musí být dlouhé alespon 5 znaků");}
            else if (!(password).match(cpassword)) {
                alert("Hesla se neshodují");}

            $.post("php/registrace.php", {

                password: password
            }, function(data) {

            });
        }

        window.location.reload(true);
    });



    $("#registraceButton").click(function() {
        var name = $("#name").val();
        var email = $("#emeail").val();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        if (name == '' || email == '' || password == '' || cpassword == '') {
            alert("Nejsou vyplněna všechny pole");
        } else if ((password.length) < 5) {
            alert("Heslo musí být dlouhé alespoň 5 znaků");
        } else if (!(password).match(cpassword)) {
            alert("Hesla se neshodují");
        } else {
            $.post("php/registrace.php", {
                name1: name,
                email1: email,
                password1: password
            }, function(data) {
                alert(data);
            });
        }
    });



});