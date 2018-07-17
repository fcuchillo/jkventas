/* global alertify */

var myTable = null;
var myTableSurvey = null;
var myTableCpv301DET = null;
var conglomerado = null;
var check = null;

$(document).ready(function () {
    searchConglomerado();    
    $('#btnRegistryProcess').on('click', function (request, response) {
       alertify.confirm("Ah decidido realizar la actualizacion del campo TRABAJO ANIO ANTERIOR, con respecto al Conglomerado Nro : " + $("#conglomerado").val(), function (e) {
            if (e) {
                jsShowWindowLoad();
                $.ajax({
                    url: "execWorkBeforetwo",
                    type: "POST",
                    data: {conglomerado: $("#conglomerado").val()},
                    success: function(data){
                        alertify.alert('Se Procedío con exito', function(){
                            searchConglomerado(); 
                            $('#btnRegistryProcess').attr("disabled", true);
                        });
                    },
                    erro: function(data){
                        jsRemoveWindowLoad();  
                        alertify.set({ delay: 4500});
                        alertify.error("Error: comuniquese con soporte");
                        $('#btnRegistryProcess').attr("disabled", true);
                    }
                }); 
            }
        }); 
    });    
    $('#btnRegistrySearch').on('click', function (request, response) {       
        searchConglomerado();
    });
    $('#btnRegistryClear').on('click', function (request, response) { 
        $("#conglomerado").val(""); 
    });
    $("#conglomerado").focusout(function(){
        if($('#conglomerado').val().length === 4)
            $('#btnRegistryProcess').removeAttr("disabled");
        else
            $('#btnRegistryProcess').attr("disabled", true);
    });
    $('#conglomerado').on( 'keydown', function(event) {
        
        var conglomerado = $("#conglomerado").val();
        
        if(event.which === 13 && conglomerado.length === 4){
            searchConglomerado();
        }
    });  
    var oTable = $('#surveyResult'). dataTable();
    
    $('#surveyResult').on('click', 'tr', function(){
        
        var oData = oTable.fnGetData(this);
        $('#inquestResultHouseholds').DataTable({
            paging: true,
            searching: false,
            ajax:{
                url: "getAllPersonsbyHouseholdstwo",
                dataSrc: "",
                type:"POST",
                data:{conglomerado:$("#conglomerado").val(), vivienda:oData.VIVIENDA,anio:oData.ANIO}
            },
            columns:[
                {data:"HOGAR_ID"                ,class:"textFont text-left", width: "60"},
                {data:"NOM_JEFE_HOGAR_ENCUESTA" ,class:"textFont text-left", width: "250"},
                {data:"DIRECCION_VIVIENDA"      ,class:"textFont text-left", width: "200"},
                {data:"EDAD"                    ,class:"textFont text-left", width: "80"},
                {data:"PARENTESCO"              ,class:"textFont text-left", width: "140"},
                {data:"SEXO"                    ,class:"textFont text-left", width: "120"}
            ],
            scrollX: true,
            bDestroy: true
        });
        $('#popuptitle').css({fontWeight:'bold'}).text("Nro. Conglomerado : "+conglomerado+" / "+ "Nro. Vivienda : "+oData.VIVIENDA);
        if(check == null) // No abrir el popup si se ah dado check en la columna revisado
            $('#myModal').modal('show');
    });   
})

/* -- Region Function -- */
function updateWork(s, e) {
    
    jsShowWindowLoad(); 
    
    var dataTable = myTable.row($(s).parents('tr')).data();
    
    (s.checked) ? $(s).parents('tr').addClass('selected') : $(s).parents('tr').removeClass('selected');
    
    
        $.ajax({
            url: "updateWorkAndGettwo",
            type: "POST",
            data: {id:dataTable.ID_CPV0301_DET,  checked: s.checked},
            success: function(data){
                jsRemoveWindowLoad();
                searchTableSurvey();
                searchTableCpv301();
                alertify.set({ delay: 4500});
                alertify.success("Operación exitosa"); 
            },
            erro: function(data){
                jsRemoveWindowLoad();  
                alertify.set({ delay: 4500});
                alertify.error("Error: comuniquese con soporte");
            }
        });   
    
    
//        jsRemoveWindowLoad();
//        alertify.set({ delay: 4500});
//        alertify.error("Operacion Incorrecta");
    
}
function updateWorkBefore(s, e){    
    jsShowWindowLoad();
    var dataTable = myTableSurvey.row($(s).parents('tr')).data();
    check = (s.checked) ? $(s).parents('tr').addClass('selected') : $(s).parents('tr').removeClass('selected');
     $.ajax({
            url: "updateWorkBeforetwo",
            type: "POST",
            data: { anio:dataTable.ANIO, conglomerado: $("#conglomerado").val(), vivienda: dataTable.VIVIENDA, checked: s.checked },
            success: function(data){
                if(data == 'true') {
                    searchTableSurvey();
                    alertify.set({ delay: 4500});
                    alertify.success("Operación exitosa");
                    check = null;
                    jsRemoveWindowLoad();
                }
                else{
                    jsRemoveWindowLoad();  
                    alertify.set({ delay: 4500});
                    alertify.error("Error al ejecutar Proceso");
                    check = null;                    
                }
            },
            erro: function(data){
                jsRemoveWindowLoad();  
                alertify.set({ delay: 4500});
                alertify.error("Error: comuniquese con soporte");
                check = null;
            }
        });
}
function searchConglomerado(s, e){     
    jsShowWindowLoad();    
    searchTableRegistry();
    searchTableCpv301();
    searchTableSurvey();
    $('#inquesttitles').text("Nro. Conglomerado : "+conglomerado);
    $('#resulttitles').text("Nro. Conglomerado: "+conglomerado);
    $('#cpv301title').text("Nro. Conglomerado: "+conglomerado);
}
function searchTableSurvey(s, e){    
    conglomerado = $("#conglomerado").val();    
    myTableSurvey = $('#surveyResult').DataTable({
        ajax:{
            url: "getHouseholdstwo",
            dataSrc:"",
            type:"POST",
            data:{ conglomerado: conglomerado }
        },
        columns:[
            { data:"ANIO" ,                     class:"textFont text-left", width: "30"},
            { data:"VIVIENDA" ,                 class:"textFont text-left", width: "50"},
            { data:"MANZANA_ID" ,               class:"textFont text-left",width: "30"},
            { data:"COD_CENTRO_PROBLADO" ,      class:"textFont text-left",width: "50"},
            { data:"HOGAR_ID" ,                 class:"textFont text-left", width: "30"},
            { data:"NOM_JEFE_HOGAR_REGISTRO" ,  class:"textFont text-left", width: "300"},
            { data:"NOM_JEFE_HOGAR_ENCUESTA" ,  class:"textFont text-left", width: "300"},
            { data:"DIRECCION_VIVIENDA" ,       class:"textFont text-left", width: "200"},
            { data:"PARENTESCO" ,               class:"textFont text-left", width: "50"},
            { data:"SEXO" ,                     class:"textFont text-left", width: "50"},
            { data:"TRABAJ_ANIO_ANTERIOR" ,     class:"textFont text-left", width: "50"}
        ],
        columnDefs: [{
            targets:10,
            orderable:true,
            render: function (data, type, full, meta){ 
                if($('<div/>').text(data).html() == 1) {
                    return '<center><input type="checkbox" class="checkbox" onclick="updateWorkBefore(this); " id="idSurvey[]" value="'+ $('<div/>').text(data).html().trim() + '" checked></center>';
                }
                else if ($('<div/>').text(data).html() == 0) {
                    return '<center><input type="checkbox" class="checkbox" onclick="updateWorkBefore(this); " id="idSurvey[]" value="'+ $('<div/>').text(data).html().trim() + '" unchecked></center>';
                }
            }
        }],
        scrollX: true,
        bDestroy: true
    });    
}
function searchTableRegistry(s, e){    
    conglomerado = $("#conglomerado").val();    
    myTable = $('#registryResult').DataTable({        
        initComplete: function () {
            
            this.api().columns().every( function () {
                var column = this;

                if(column[0] == 3) {
                    $('<input class="form-control input-sm" style="width:100%" type="text" placeholder="Search">').appendTo($(column.footer()).empty());
                    $( 'input', this.footer() ).on( 'keyup change', function () {
                        if ( column.search() !== this.value ) {
                            column.search( this.value ).draw();
                        }
                    });
                }
                else {
                    var select = $('<select class="form-control input-sm" style="width:100%"><option value=""></option></select>').appendTo($(column.footer()).empty()).on( 'change', function (){
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search( val ? '^'+val+'\$' : '', true, false ).draw();
                    }); 
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' );
                    }); 
                }            
           jsRemoveWindowLoad();
        });
        },        
        ajax: {
            url: "getSamplingtwo",
            dataSrc: "",
            type:"POST",
            data: { conglomerado: conglomerado }
        },
        "columns":[ 
            { data:"MANZANA_ID"                     ,class:"textFont text-left", width: "70"},
            { data:"CODCCPP"                        ,class:"textFont text-left", width: "70"},
            { data:"VIVIENDA"                       ,class:"textFont text-left", width: "60"},
            { data:"JEFE_HOGAR_REGISTRO_ACTUAL"     ,class:"textFont text-left", width: "260"},
            { data:"codtipovia"                     ,class:"textFont text-left", width: "30"},
            { data:"P20_O"                          ,class:"textFont text-left", width: "70"},
            { data:"via"                            ,class:"textFont text-left", width: "70"},
            { data:"puerta"                         ,class:"textFont text-left", width: "30"},
            { data:"puertaletra"                    ,class:"textFont text-left", width: "60"},
            { data:"block"                          ,class:"textFont text-left", width: "30"},
            { data:"mz"                             ,class:"textFont text-left", width: "30"},
            { data:"lote"                           ,class:"textFont text-left", width: "30"},
            { data:"interior"                       ,class:"textFont text-left", width: "40"},
            { data:"TRABAJ_ANIO_ANTERIOR"           ,class:"textFont text-left", width: "150"},
            { data:"ID_CPV0301_DET"                ,class:"textFont text-left",  width: "50"}
        ],
        columnDefs: [{
            targets: 13,
            searchable:true,
            orderable:true,
            render: function (data, type, full, meta){
                if($('<div/>').text(data).html() == 1) {
                    return '<center><input type="checkbox" class="checkbox" onclick="updateWork(this); " id="id[]" value="'+ $('<div/>').text(data).html().trim() + '" checked><label style="color: transparent;">'+$('<div/>').text(data).html().trim()+'</label></center>';
                } else if ($('<div/>').text(data).html() == 0) {
                    return '<center><input type="checkbox" class="checkbox" onclick="updateWork(this); " id="id[]" value="'+ $('<div/>').text(data).html().trim() + '" unchecked><label style="color: transparent;">'+$('<div/>').text(data).html().trim()+'</label></center>';
                }
            }
        },
    ],
        scrollX: true,
        bDestroy: true
    });
}
function searchTableCpv301(s, e){
    conglomerado = $("#conglomerado").val();    
    myTableCpv301DET = $('#cpv301Result').DataTable({
        ajax:{
            url: "getCPV301two",
            dataSrc:"",
            type:"POST",
            data:{ conglomerado: conglomerado }
        },
        columns:[
            {data:"REGISTRO" ,class:"textFont text-left", width: "80"},
            {data:"NOMBRE_JEFE_REGISTRO_ACTUAL" ,class:"textFont text-left", width: "550"},
            {data:"TRABAJ_ANIO_ANTERIOR" ,class:"textFont text-left", width: "115"},
            {data:"DIRECCION" ,class:"textFont text-left", width: "200"}
        ],
        columnDefs: [{
            targets: 2,
            orderable:true,
            render: function (data, type, full, meta){ 
                if($('<div/>').text(data).html() == 1) {
                    return '<center><i class="fa fa-fw fa-check" style="color: #3c8dbc"></i></center>';
                }
                return  null;
            }
        }],
        scrollX: true,
        bDestroy: true
    });
}

