<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PyENDES_View{
    /*Region varibles */
    const ANIO_REGISTRO                                     =2018;
    /*End Region*/
    /*Region Registry*/
    const CONSISTENCY_VIEW_REPORT_FRONT                     = 'V_BLUE_REPORTE_OMISION_FRENTE';
    const CONSISTENCY_VIEW_REPORT_CAB                       = 'V_BLUE_REPORTE_OMISION_CAB';
    const CONSISTENCY_VIEW_REPORT_DET                       = 'V_BLUE_REPORTE_OMISION_DET';
    const REGISTRY_VIEW_CONGLOMERATES_TRANSFERRED           = 'VIEW_BLUE_CONGLOMEADOS_TRANSFERIDOS';
    const REGISTRY_VIEW_CONGLOMERATES_TRANSFERRED_DETAIL    = 'V_BLUE_DETALLE_MANZANA';
    const REGISTRY_VIEW_POINT_GPS                           = 'V_BLUE_PUNTOS_GPS_REGISTRO';
    const REGISTRY_VIEW_TRANFER_VERIFICATION_CONGLOMERATE   = 'V_BLUE_ESTADOTRANSFERIDO_CONGLOMERADO';
    
    const REGISTRY_VIEW_STEP_ONE_PROCESS_CONSISTENCY        = 'VBLUE_PROCESO1_CONSISTENCIA';
    /*End Region*/
    
    /*Region Inquest*/
    const RESULT_INDIVIDUAL_VIEW_REPORT_MEF         = 'V_BLUE_REPORTE_OMISION_INDIVIDUAL2_RESULTADO_MEF';
    const RESULT_SALUD_VISIT                        = 'V_BLUE_REPORTE_OMISION_SALUD1_VISITA';
    const RESULT_SALUD_INFORMANT                    = 'V_BLUE_REPORTE_OMISION_SALUD2_INFORMANTE';
    const RESULT_SALUD_QUESTION                     = 'V_BLUE_REPORTE_OMISION_SALUD3_CUESTIONARIO';
    const RESULT_SALUD_SECTION8                     = 'V_BLUE_REPORTE_OMISION_SALUD4_SECCION8';
    const VALIDATION_INDIVIDUAL_PGTA328             = 'V_BLUE_REPORTE_VALIDACION_INDIVIDUAL1_PGTA328_522';
    const VERIFICATION_HOME_SECTION45               = 'V_BLUE_REPORTE_OMISION_HOGAR1_SECCION4_5';
    const VERIFICATION_HOME_QUESTION207             = 'V_BLUE_REPORTE_OMISION_HOGAR2_PREGUNTA207';
    const VERIFICATION_HOME_QUESTION213             = 'V_BLUE_REPORTE_OMISION_HOGAR3_PREGUNTA213';
    const VERIFICATION_BIRTHDATE_FECHNAC_SEC4_IND   = 'V_BLUE_REPORTE_COMPARA1_FECHANAC_SEC4yIND';
    const VERIFICATION_BIRTHDATE_PERSON_ORD_HOME    = 'V_BLUE_REPORTE_COMPARA2_PERSONA_ORDEN_HOGAR';
    const VERIFICATION_COVERAGE_CONGLOMERATES       = 'V_BLUE_COBERTURA_POR_CONGLOMERADO';
    const VERIFICATION_COVERGE_HOME                 = 'V_BLUE_COBERTURA_POR_HOGAR';
    const VERIFICATION_CONVERGE_HEALTH              = 'V_BLUE_COBERTURA_POR_SALUD';
    const VERIFICATION_CONVERGE_INDIVIDUAL          = 'V_BLUE_COBERTURA_POR_MEF';
    const VERIFICATION_CONVERGE_APARTAMENT          = 'V_BLUE_COBERTURA_VIVIENDA';
    /*End Region*/

    /*Region Registry Consistency*/
    const SAMPLIN_UNION_DATA                        = 'V_BLUE_UNIONDATA_2015_2016';
    const SAMPLIN_UNION_DATA_2017                   = 'VBLUE_IDENTIFICACION_VIVIENDAS';
    const SAMPLIN_DATA_CONSISTENCIA                 = 'V_BLUE_VIVIENDASIDENTIFICADAS';
    
    const SELECTED_HOME_VIEW_EXPORT                 = 'V_BLUE_EXPORTAR_VIVIENDAS_SELECIONADAS';
    const SELECTED_HOME_VIEW_MAN_EXPORT             = 'V_BLUE_EXPORTAR_EDAD_SEXO_H';
    const SELECTED_HOME_VIEW_WOMAN_EXPORT           = 'V_BLUE_EXPORTAR_EDAD_SEXO_M';
    const SELECTED_HOME_VIEW_REPORT_MAN_WOMAN       = 'V_BLUE_REPORTEPDF_HOMBREMUJER';
    const SELECTED_HOME_VIEW_YEAR_SEX_MAN           = 'V_BLUE_EDAD_SEXO_HOMBRE';
    const SELECTED_HOME_VIEW_YEAR_SEX_WOMAN         = 'V_BLUE_EDAD_SEXO_MUJER';
    /*End Region*/
}