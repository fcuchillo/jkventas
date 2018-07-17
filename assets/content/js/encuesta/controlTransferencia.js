var myTableReport1;

$(document).ready(function () {
    $('#btnResultIndividualClear').on('click', function(){
        $('#periodo').val('');
        $('#equipo').val('');
        $('#encuestador').val('');
        $('#conglomerado').val('');
    });
    $('#equipo').change(function() {
       searchInterViewer();
    });
    $('#btnResultIndividualSearch').on('click', function(){
        searchCountDataForReport1();
        searchTableReport1();
    });
});