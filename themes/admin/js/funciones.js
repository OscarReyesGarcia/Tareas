$(document).ready(function ($) {

    $('#p, #r').change(function (event) {

        var p = $('#p');
        var r = $('#r');

        if (p.val() != '' && r.val() != '') {
            $('.rs').each(function (index, el) {
                if (index == 0) {
                    $(this).val(Math.round((p.val() / (1.0278 - (0.0278 * r.val()))) * 1));
                    max = $(this).val();
                } else {
                    $(this).val(Math.round($(this).attr('data-p') * max));
                }
            });
        }
    });
});

function calcularEdad(fecha) {
    // Si la fecha es correcta, calculamos la edad

    if (typeof fecha != "string" && fecha && esNumero(fecha.getTime())) {
        fecha = formatDate(fecha, "yyyy-MM-dd");
    }

    var values = fecha.split("-");
    var dia = values[2];
    var mes = values[1];
    var ano = values[0];

    // cogemos los valores actuales
    var fecha_hoy = new Date();
    var ahora_ano = fecha_hoy.getYear();
    var ahora_mes = fecha_hoy.getMonth() + 1;
    var ahora_dia = fecha_hoy.getDate();

    // realizamos el calculo
    var edad = (ahora_ano + 1900) - ano;
    if (ahora_mes < mes) {
        edad--;
    }
    if ((mes == ahora_mes) && (ahora_dia < dia)) {
        edad--;
    }
    if (edad > 1900) {
        edad -= 1900;
    }

    // calculamos los meses
    var meses = 0;

    if (ahora_mes > mes && dia > ahora_dia)
        meses = ahora_mes - mes - 1;
    else if (ahora_mes > mes)
        meses = ahora_mes - mes
    if (ahora_mes < mes && dia < ahora_dia)
        meses = 12 - (mes - ahora_mes);
    else if (ahora_mes < mes)
        meses = 12 - (mes - ahora_mes + 1);
    if (ahora_mes == mes && dia > ahora_dia)
        meses = 11;

    // calculamos los dias
    var dias = 0;
    if (ahora_dia > dia)
        dias = ahora_dia - dia;
    if (ahora_dia < dia) {
        ultimoDiaMes = new Date(ahora_ano, ahora_mes - 1, 0);
        dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
    }

    return edad; // + " años, " + meses + " meses y " + dias + " días";
}

function esNumero(strNumber) {
    if (strNumber == null)
        return false;
    if (strNumber == undefined)
        return false;
    if (typeof strNumber === "number" && !isNaN(strNumber))
        return true;
    if (strNumber == "")
        return false;
    if (strNumber === "")
        return false;
    var psInt, psFloat;
    psInt = parseInt(strNumber);
    psFloat = parseFloat(strNumber);
    return !isNaN(strNumber) && !isNaN(psFloat);
}