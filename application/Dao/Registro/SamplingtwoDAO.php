<?php
include_once 'application/Core/Registro/SamplingtwoService.php';
require_once 'application/Dao/MasterEncuestaDao.php';
include_once 'application/PyENDES_Const/Dao/PyENDES_View.php';
include_once 'application/PyENDES_Const/Dao/PyENDES_Procedure.php';
include_once 'application/PyENDES_Const/Dao/PyENDES_Table.php';
include_once 'application/PyENDES_Exception/Procedure/PyENDES_ProcedureException.php';


class SamplingtwoDAO extends MasterEncuestaDao implements SamplingtwoService{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function execWorkBeforeProceduretwo($conglomerado) {
        $result='';
        try {
            $this->ActivarRegistro(TRUE)->query("EXEC [".PyENDES_Procedure::SAMPLIN_PROCEDURE_UPDATE_TRABAJ_ANIO_ANTERIOR."] N'".$conglomerado."'");
        } catch (Exception $e) {
            $this->result='Error: '.$e->getMessage();
        }
       return  $this->result;
    }
    public function updateWorkbeforetwo($where, $checked){
        $this->ActivarRegistro(TRUE)->trans_start();
        $this->ActivarRegistro(TRUE)->where($where)->update(PyENDES_Table::TABLE_DATA_GENERAL_2015, $checked);
        $this->ActivarRegistro(TRUE)->trans_complete();
        if ($this->ActivarRegistro(TRUE)->trans_status() === FALSE){
            $this->ActivarRegistro(TRUE)->trans_rollback();
            return FALSE;
        }
        else{
            $this->ActivarRegistro(TRUE)->trans_commit();
            return TRUE;
        }
    }
    public function getRuralOrUrbantwo($conglomerado) {
        $data= $this->ActivarRegistro(TRUE)->select('*')
                    ->from(PyENDES_View::SAMPLIN_UNION_DATA_2017)
                    ->where('conglomerado',$conglomerado)
                    ->where('anio',PyENDES_View::ANIO_REGISTRO)
                    ->get()->result();
        return data_output($data);
        }
    public function getCpv301two($conglomerado) {
        $data= $this->ActivarRegistro(TRUE)->select('*')
                                           ->from(PyENDES_View::SAMPLIN_DATA_CONSISTENCIA)
                                           ->where('conglomerado',$conglomerado)
                                           ->where('anio',PyENDES_View::ANIO_REGISTRO)
                                           ->get()->result();         
       /* $data= $this->ActivarRegistroConsistencia(TRUE)->select('T_CONGLOMERADO.ANIO,T_05_DIG_CPV0301_DET.ID_REG AS REGISTRO,T_05_DIG_CPV0301_DET.P32 AS NOMBRE_JEFE_REGISTRO_ACTUAL, T_05_DIG_CPV0301_DET.TRABAJ_ANIO_ANTERIOR')
                ->from(PyENDES_Table::TABLE_05_DIG_CPV0301_DET)
                ->join(PyENDES_Table::TABLE_CONGLOMERADO,'T_CONGLOMERADO.ID = T_05_DIG_CPV0301_DET.ID')
                ->where('T_CONGLOMERADO.ANIO',PyENDES_View::ANIO_REGISTRO)
                ->where('T_CONGLOMERADO.CONGLOMERADO',$conglomerado)
                ->where('T_05_DIG_CPV0301_DET.TRABAJ_ANIO_ANTERIOR', 1)
                ->get()->result();*/
        return data_output($data);
    }
    public function typeUrbanOrRuraltwo($conglomerado) {
        $this->ActivarRegistro(TRUE)->select('TIPO');
        $this->ActivarRegistro(TRUE)->from(PyENDES_Table::TABLE_CONGLOMERADO);
        $this->ActivarRegistro(TRUE)->join(PyENDES_Table::TABLE_CENTRO_POBLADO,'T_CONGLOMERADO.ID = T_CENTRO_POBLADO.ID');
        $this->ActivarRegistro(TRUE)->where('T_CONGLOMERADO.CONGLOMERADO',$conglomerado);
        $result = $this->ActivarRegistro(TRUE)->get()->result();
        return $result[0];
    }
    public function updateWorkRuraltwo($conglomerado,$codigo_centropoblado,$viviendaactual,$checked) {
        $sql = "";        
        $sql.= "UPDATE T_05_DIG_CPV0301_DET SET TRABAJ_ANIO_ANTERIOR = ";if($checked == "true") { $sql.="1"; } else { $sql.= "null"; }
        $sql.= " FROM T_05_DIG_CPV0301_DET A ";
        $sql.= "INNER JOIN T_CONGLOMERADO B ON A.ID = B.ID ";
        $sql.= "WHERE ";
        $sql.= "B.CONGLOMERADO = ".$conglomerado." AND ";
        $sql.= "B.ANIO = ".PyENDES_View::ANIO_REGISTRO." AND ";
        $sql.= "A.CODCCPP= '".$codigo_centropoblado."' AND "; 
        $sql.= "A.P17_A = ".$viviendaactual;
        return $this->ActivarRegistroConsistencia(TRUE)->query($sql);
    }
//    public function updateWorkUrbantwo($conglomerado,$manzana_id,$viviendaactual,$checked) {
//        $sql = "";
//        $sql.= "UPDATE T_05_DIG_CPV0301_DET SET TRABAJ_ANIO_ANTERIOR = ";if($checked == "true") { $sql.="1"; } else { $sql.= "null"; };
//        $sql.= " FROM T_05_DIG_CPV0301_DET A ";
//        $sql.= "INNER JOIN T_CONGLOMERADO B ON A.ID = B.ID ";
//        $sql.= "WHERE ";
//        $sql.= "B.CONGLOMERADO = ".$conglomerado." AND ";
//        $sql.= "B.ANIO = ".PyENDES_View::ANIO_REGISTRO." AND ";
//        $sql.= "A.MANZANA_ID = '".$manzana_id."' AND "; 
//        $sql.= "A.P17_A = ".$viviendaactual;        
//        return $this->db_registry_consistencia->query($sql);
//    }
    public function  getUpdateGeneralbyID($id,$checked){
        $update='';
        if ($checked == "true") {
            $this->update = "1";
        } else {
            $this->update = NULL;
        }

        $data = array(
            'TRABAJ_ANIO_ANTERIOR' => $this->update,
        );
        return $this->ActivarRegistroConsistencia(TRUE)->where('ID_CPV0301_DET',$id)
                                                       ->update('T_05_DIG_CPV0301_DET', $data);
                
    }
    public function updateWorkDataGeneraltwo($anio,$conglomerado, $parentesco, $vivienda,$data) { 
    $conglomeradouno=$this->ActivarRegistro(TRUE)->select("CONGLOME_2015_2017")
                                                 ->from(PyENDES_Table::TABLA_DATA_NUEVA_MUESTRA)
                                                 ->where('T_CONGLOME_NUEVA_MUESTRA.CONGLOME_2018_2019',$conglomerado)
                                                 ->get()->result();
        return $this->ActivarRegistro(TRUE)->where('CONGLOMERADO', $conglomeradouno[0]->CONGLOME_2015_2017)
                ->where('COD_PARENTESCO', $parentesco)
                ->where('VIVIENDA', $vivienda)
                ->where('ANIO', $anio)
                ->update(PyENDES_Table::TABLE_DATA_GENERAL_2015, $data);       
    }
    public function getHouseholdstwo($conglomerado, $jefe) {
       $data= $this->ActivarRegistro(TRUE)->select("ANIO,VIVIENDA,MANZANA_ID,COD_CENTRO_PROBLADO,HOGAR_ID,NOM_JEFE_HOGAR_REGISTRO,NOM_JEFE_HOGAR_ENCUESTA,DIRECCION_VIVIENDA,PARENTESCO,(CASE WHEN SEXO='1' THEN 'HOMBRE' WHEN SEXO='2' THEN 'MUJER' ELSE 'INDEFINIDO' END) AS SEXO, TRABAJ_ANIO_ANTERIOR")
                        ->from(PyENDES_Table::TABLE_DATA_GENERAL_2015)
                        ->join(PyENDES_Table::TABLA_DATA_NUEVA_MUESTRA,'DATA_GENERAL_2015.CONGLOMERADO=T_CONGLOME_NUEVA_MUESTRA.CONGLOME_2015_2017')
                        ->where('T_CONGLOME_NUEVA_MUESTRA.CONGLOME_2018_2019',$conglomerado)
                        ->group_start()
                            ->where('cod_parentesco',$jefe)
                            ->or_where('cod_parentesco is null')
                        ->group_end()
                        ->get()->result();
        return data_output($data);
    }
    public function getAllPersonsbyHouseholdstwo($conglomerado, $vivienda,$anio) {
       $data=$this->ActivarRegistro(TRUE)->select("VIVIENDA,HOGAR_ID,NOM_JEFE_HOGAR_ENCUESTA,DIRECCION_VIVIENDA,PARENTESCO,EDAD,(CASE WHEN SEXO='1' THEN 'HOMBRE' WHEN SEXO='2' THEN 'MUJER' ELSE 'INDEFINIDO' END) AS SEXO")
                                ->from(PyENDES_Table::TABLE_DATA_GENERAL_2015)
                                ->join(PyENDES_Table::TABLA_DATA_NUEVA_MUESTRA,'DATA_GENERAL_2015.CONGLOMERADO=T_CONGLOME_NUEVA_MUESTRA.CONGLOME_2015_2017')
                                ->where('T_CONGLOME_NUEVA_MUESTRA.CONGLOME_2018_2019',$conglomerado)
                                ->where('DATA_GENERAL_2015.vivienda',$vivienda)
                                ->where('DATA_GENERAL_2015.ANIO', $anio)
                                ->get()->result();
       return data_output($data);
    }
}