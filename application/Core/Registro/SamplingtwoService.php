<?php

interface SamplingtwoService {
    function updateWorkbeforetwo($where, $checked);
    function getRuralOrUrbantwo($conglomerado);
    function getCpv301two($conglomerado);
    function typeUrbanOrRuraltwo($conglomerado);
//    function updateWorkUrbantwo($conglomerado,$manzana_id,$viviendaactual,$checked);
    function updateWorkDataGeneraltwo($anio,$conglomerado,$parentesco,$vivienda,$data);
    function getUpdateGeneralbyID($id,$checked);  
    function updateWorkRuraltwo($conglomerado,$codigo_centropoblado,$viviendaactual,$checked);
    function getHouseholdstwo($conglomerado,$jefe);
    function getAllPersonsbyHouseholdstwo($conglomerado,$vivienda,$anio);
    function execWorkBeforeProceduretwo($conglomerado);
   }
