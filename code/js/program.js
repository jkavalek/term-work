$(document).ready(function () {

    var d = new Date();
    var idProgramu;

    var month = d.getMonth() + 1;
    var day = d.getDate() + 3;

    var output = (day < 10 ? '0' : '') + day + '.' +
        (month < 10 ? '0' : '') + month + '.';

    $("#den4").html(output);
    $("#den4Nadpis").html("Program " + output);

    $("body").on('click', 'a.odkazRezervace', function () {

        idProgramu = this.id;


        $("#rezervaceButton").css("display", "block");
        $("#vyber").css("display", "none");

        var numberOfSelectedSeat = 0;


        var reserved = new Array();

        var settings = {
            maxSeat: 5,
            rows: 0,
            cols: 0,
            seatWidth: 50,
            seatHeight: 50,
            seatCss: 'seat',
            selectedSeatCss: 'selectedSeat',
            selectingSeatCss: 'selectingSeat'
        };


        $.post("php/nactiRozmerSalu.php", {idProgramu: $(this).attr('id')},
            function (data) {

                var obj = JSON.parse(data);

                settings.rows = obj[0].sloupce;
                settings.cols = obj[0].radky;
            });


        $.post("php/rezervace.php", {idProgramu: $(this).attr('id')},
            function (data) {
                var obj = JSON.parse(data);
                for (var i = 0; i < obj.length; i++)
                    reserved[i] = (obj[i]);
                init(reserved);
            });


        var init = function (reservedSeat) {
            var str = [];
            var seatNo;
            var className;
            var sirka;
            var vyska;


            vyska = settings.rows * settings.seatHeight + 20;

            $("#holder").css('width', '46%');
            $("#holder").css('height', vyska + 'px');


            for (i = 0; i < settings.rows; i++) {
                for (j = 0; j < settings.cols; j++) {
                    seatNo = (j + i * settings.cols + 1);
                    className = settings.seatCss;
                    if ($.isArray(reservedSeat) && $.inArray(seatNo, reservedSeat) != -1) {
                        className += ' ' + settings.selectedSeatCss;
                    }
                    str.push('<li class="' + className + '"' +
                        'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
                        '<a title="' + seatNo + '">' + seatNo + '</a>' +
                        '</li>');
                }
            }
            $('#place').html(str.join(''));

        };

        init();


        $("body").on('click', '.' + settings.seatCss, function () {


            if (numberOfSelectedSeat >= settings.maxSeat && !($(this).hasClass(settings.selectingSeatCss))) {
                alert("Maximálně lze rezervovat 5 míst");
                return;
            }


            if ($(this).hasClass(settings.selectedSeatCss)) {
                alert('Místo je obsazeno');
            }
            else {
                if ($(this).hasClass(settings.selectingSeatCss)) {
                    numberOfSelectedSeat--;

                }
                else {
                    numberOfSelectedSeat++;

                }


                $(this).toggleClass(settings.selectingSeatCss);
            }
        });

        $('#btnZpet').click(function () {
            $("#rezervaceButton").css("display", "none");
            $("#vyber").css("display", "block");
        });


        $('#btnRezervovat').click(function () {
            numberOfSelectedSeat = 0;


            var str = [], item;
            $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
                item = $(this).attr('title');
                str.push(item);
            });


            var sedadlo1 = str[0];
            var sedadlo2 = str[1];
            var sedadlo3 = str[2];
            var sedadlo4 = str[3];
            var sedadlo5 = str[4];


            $.post("php/rezervace.php", {
                    sedadlo1: sedadlo1,
                    sedadlo2: sedadlo2,
                    sedadlo3: sedadlo3,
                    sedadlo4: sedadlo4,
                    sedadlo5: sedadlo5,
                    idProgramu: idProgramu


                },

                function (data) {


                    alert("Rezervace proběhla v pořádku, číslo rezervace: " + data);
                    window.location.replace("index.html");

                });


        })

    });


    $.post("php/nactiProgram.php",
        function (data) {

            var obj = JSON.parse(data);
            var d = new Date();


            for (var i = 0; i < obj.length; i++) {


                if (obj[i].den == d.getDate()) {


                    $("#programDnes")
                        .append("<h2 id='" + obj[i].nazev_filmu + "'>" + obj[i].nazev_filmu + "</h2>")
                        //  .append(obj[i].den + "   ")
                        //  .append(obj[i].mesic + "   ")
                        .append(obj[i].cas + "   ")
                        .append(obj[i].film_id_filmu).append("<br>")
                        .append("číslo sálu: " + obj[i].id_salu).append("<br>")
                        .append("<a href='#'  id='" + obj[i].idProgramu + "' class = 'odkazRezervace'> rezerovat  </a>").append("<hr>")


                }

                if (obj[i].den == d.getDate() + 1) {


                    $("#programZitra")
                        .append("<h2 id='" + obj[i].nazev_filmu + "'>" + obj[i].nazev_filmu + "</h2>")
                        //  .append(obj[i].den + "   ")
                        //  .append(obj[i].mesic + "   ")
                        .append(obj[i].cas + "   ")
                        .append(obj[i].film_id_filmu).append("<br>")
                        .append("číslo sálu: " + obj[i].id_salu).append("<br>")
                        .append("<a href='#'  id='" + obj[i].idProgramu + "' class = 'odkazRezervace'> rezerovat  </a>").append("<hr>")
                }

                if (obj[i].den == d.getDate() + 2) {


                    $("#programPozitri")
                        .append("<h2 id='" + obj[i].nazev_filmu + "'>" + obj[i].nazev_filmu + "</h2>")
                        //  .append(obj[i].den + "   ")
                        //  .append(obj[i].mesic + "   ")
                        .append(obj[i].cas + "   ")
                        .append(obj[i].film_id_filmu).append("<br>")
                        .append("číslo sálu: " + obj[i].id_salu).append("<br>")
                        .append("<a href='#'  id='" + obj[i].idProgramu + "' class = 'odkazRezervace'> rezerovat  </a>").append("<hr>")
                }

                if (obj[i].den == d.getDate() + 3) {


                    $("#program3Dny")
                        .append("<h2 id='" + obj[i].nazev_filmu + "'>" + obj[i].nazev_filmu + "</h2>")
                        //  .append(obj[i].den + "   ")
                        //  .append(obj[i].mesic + "   ")
                        .append(obj[i].cas + "   ")
                        .append(obj[i].film_id_filmu).append("<br>")
                        .append("číslo sálu: " + obj[i].id_salu).append("<br>")
                        .append("<a href='#'  id='" + obj[i].idProgramu + "' class = 'odkazRezervace'> rezerovat  </a>").append("<hr>")
                }


            }


        });


    $("#dnesDiv").css({'display': 'inline-block'});


    $("#dnes").click(function () {
        //  $(".programDiv").css({'display': 'none'})});

        $("#zitraDiv").css({'display': 'none'});
        $("#pozitriDiv").css({'display': 'none'});
        $("#den4Div").css({'display': 'none'});
        $("#dnesDiv").css({'display': 'inline-block'});

    });


    $("#zitra").click(function () {
        $("#zitraDiv").css({'display': 'inline-block'});
        $("#pozitriDiv").css({'display': 'none'});
        $("#den4Div").css({'display': 'none'});
        $("#dnesDiv").css({'display': 'none'});

    });

    $("#den3").click(function () {
        $("#zitraDiv").css({'display': 'none'});
        $("#pozitriDiv").css({'display': 'inline-block'});
        $("#den4Div").css({'display': 'none'});
        $("#dnesDiv").css({'display': 'none'});

    });

    $("#den4").click(function () {
        $("#zitraDiv").css({'display': 'none'});
        $("#pozitriDiv").css({'display': 'none'});
        $("#den4Div").css({'display': 'inline-block'});
        $("#dnesDiv").css({'display': 'none'});

    });

});