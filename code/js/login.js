$(document).ready(function () {


    $("#stornovat").click(function () {
        var cisloRezervace = $("#inputStornoRezervace").val();
        $.post("php/stornoRezervace.php", {cisloRezervace: cisloRezervace}, function (data) {
            $("#id02").css('display', 'none');
        })
    });


    jePrihlasenUzivatel();

    $("#prihlasit").click(function () {
        $("#id01").css('display', 'none');
        var email = $("#email").val();
        var heslo = $("#heslo").val();
        $.post("php/login.php", {email1: email, password1: heslo},
            function (data) {

                if (data == 'OK') {
                    jePrihlasenUzivatel();
                    alert("Přihlášení úspěšné");
                }
                else {
                    alert("Špatně zadané udaje")
                }
            });
    });

    $("#odhlasit").click(function () {
        $.post("php/endSession.php");
        window.location.replace("index.html");
    });


    function jePrihlasenUzivatel() {

        $.post("php/SessionPHP.php",

            function (data) {

                if (data == '') {
                    $("#pID").html("Nepřihlášen");
                    $("#odhlasit").css('display', 'none');
                    $("#loginMain").css('display', 'inline-block');
                    $(".menu li:last").html("");

                }
                if (data == '1') {
                    $("#pID").html("Prihlášen jako: admin");
                    $("#stornoRezervace").css('display', 'none');
                    $("#loginMain").css('display', 'none');
                    $("#odhlasit").css('display', 'inline-block');
                    $(".menu li:last").html("<a href='adminSekce.html'>admin sekce</a>");

                }
                if (data == '0') {
                    $("#pID").html("Prihlášen jako: uživatel");
                    $("#stornoRezervace").css('display', 'none');
                    $("#loginMain").css('display', 'none');
                    $("#odhlasit").css('display', 'inline-block');
                    $(".menu li:last").html("<a href='uzivatel.html'>můj účet</a>");
                }
            });

    }


});