$(document).ready(function () {

    $("#register").click(function () {
        var nazev = $("#nazev").val();
        var popis = $("#popis").val();
        var delka = $("#delka").val();
        var video = $("#video").val();


        if (nazev == '' || popis == '' || delka == '') {
            alert("Nejsou vyplnena povinna pole");

        } else {


        }
        $.post("registrace.php", {
            nazev: nazev,
            popis: popis,
            delka: delka,
            video: video
        }, function (data) {

            if (data == 'OK') {
                alert("film přidán");
            }

        });
    });

});