$(document).ready(function () {


    $.post("php/SessionPHP.php",

        function (data) {

            if (data == '') {
                alert("Nemate oprávnění pro přístup do admin sekce");
                window.location.replace("index.html");
            }
        });


    $("#exportovatDoXML").click(function () {
        exporttoxml();
    });

    function exporttoxml() {

        $("#mytable").tabletoxml({
            rootnode: "Rezervace",
            childnode: "Rezervacedetail",
            filename: 'Seznamrezervaci'
        });
    }


    $.post("php/nactiRezervace.php"
        , function (data) {


            var obj = JSON.parse(data);
            for (var i = 0; i < obj.length; i++) {

                $(".tg").append("<tr>" +
                    "<td>" + obj[i].id_rezervace + "</td>" +
                    "<td>" + obj[i].sedadlo1 + "</td>" +
                    "<td>" + obj[i].sedadlo2 + "</td>" +
                    "<td>" + obj[i].sedadlo3 + "</td>" +
                    "<td>" + obj[i].sedadlo4 + "</td>" +
                    "<td>" + obj[i].sedadlo5 + "</td>" +
                    "<td>" + obj[i].nazevFilmu + "</td>" +
                    "<td>" + "<button id='" + obj[i].id_rezervace + "' class = 'odstranit'> stornovat  </button>" + "</td>" +

                    "</tr>");


            }

        });


    var id;

    $(document).on("click", ".odstranit", function () {
        $.post("php/stornoRezervace.php", {cisloRezervace: $(this).attr("id")}, function (data) {
            window.location.reload(true);
        });
    });


    $(".menu li:last").addClass("aktivni");

    $(document).on("click", ".od", function () {
        var id = $(this).attr("id");

        $.post("php/zneaktivniFilm.php", {id: id}, function (data) {
            location.reload();
        })
    });


    $(document).on("click", ".odProgram", function () {

    });


    $("#pridatFilmy").click(function () {
        var nazev = $("#nazev").val();
        var popis = $("#popis").val();
        var delka = $("#delka").val();
        var video = $("#video").val();
        if (nazev == '' || popis == '' || delka == '' || video == '') {
            alert("Please fill all fields...!!!!!!");

        } else {
            $.post("php/pridejFilm.php", {
                nazev: nazev,
                popis: popis,
                delka: delka,
                video: video
            }, function (data) {
                alert(data);

                if (data === 'OK') {
                    $("form")[0].reset();
                    alert("Film byl pridan");
                }


            });
        }
    });

    $("#pridatProgram").click(function () {
        var datum = $("#datumInput").val();
        var cas = $("#CasInput").val();
        var film = $("#selectFilm").val();
        var sal = $("#selectSal").val();


        if (datum == '' || cas == '') {
            alert("Vyplnte všechna pole ");

        } else {
            $.post("php/pridejProgram.php", {
                datum: datum,
                cas: cas,
                film: film,
                sal: sal
            }, function (data) {

                if (data == 'OK') {
                    $("form")[1].reset();
                    alert("Program byl pridan");
                }
            });
        }
    });


    $.post("php/filmy.php", function (data) {
        var obj = JSON.parse(data);
        for (var i = 0; i < obj.length; i++) {


            $("#selectFilm").append("<option value=" + obj[i].id_filmu + ">" + obj[i].nazev + "</option>");
            $("#film")
                .append(obj[i].nazev + " ")
                .append("<button id='" + obj[i].id_filmu + "' class = 'od'> odstranit  </button>")
                .append("<br>")
        }

        $.post("php/nactiProgram.php",
            function (data) {

                var obj = JSON.parse(data);
                var d = new Date();


                for (var i = 0; i < obj.length; i++) {


                    $("#program")
                        .append(obj[i].nazev_filmu)
                        .append(obj[i].cas + "   ")
                        .append(obj[i].mesic + "   ")
                        .append(obj[i].den + "   ")
                        .append("číslo sálu: " + obj[i].id_salu + "   ")
                        .append("<button id='" + obj[i].id_filmu + "' class = 'odProgram'> odstranit</button>")
                        .append("<br>")


                }
            });


        $("#CasInput").timepicker({
            timeFormat: 'H:mm',
            background: 'white',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });


        $.datepicker.regional['cs'] = {
            closeText: 'Cerrar',
            prevText: 'Předchozí',
            nextText: 'Další',
            currentText: 'Hoy',
            monthNames: ['Leden', 'Únor', 'Březen', 'Duben', 'Květen', 'Červen', 'Červenec', 'Srpen', 'Září', 'Říjen', 'Listopad', 'Prosinec'],
            monthNamesShort: ['Le', 'Ún', 'Bř', 'Du', 'Kv', 'Čn', 'Čc', 'Sr', 'Zá', 'Ří', 'Li', 'Pr'],
            dayNames: ['Neděle', 'Pondělí', 'Úterý', 'Středa', 'Čtvrtek', 'Pátek', 'Sobota'],
            dayNamesShort: ['Ne', 'Po', 'Út', 'St', 'Čt', 'Pá', 'So'],
            dayNamesMin: ['Ne', 'Po', 'Út', 'St', 'Čt', 'Pá', 'So'],
            weekHeader: 'Sm',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };

        $.datepicker.setDefaults($.datepicker.regional['cs']);

        $("#datumInput").datepicker({});

    });
});