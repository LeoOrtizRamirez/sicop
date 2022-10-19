$(document).ready(function () {
    $("#busquedaInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#busquedaTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
