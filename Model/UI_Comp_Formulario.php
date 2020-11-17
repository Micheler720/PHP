<?php
include 'utils/ValidationDate.php';
class UI_Comp_Formulario{
  public $mensagem = '';
  public function UI_Comp_Formulario($validateScript=false){
    if($validateScript){
      $retorno ='';
      $retorno.= ValidationDate::validationDateFormat( $validateScript['date']) ? 'Data inválida, verifique. <br/>' : '';    
        
      $retorno.= strlen($validateScript['text']) >144 ?
         'Campo de texto maior que o máximo permitido,verifique.<br/>' : '';

      $retorno.= strlen($validateScript['textUpper'])>255 ?
        'Campo de texto grande maior que o máximo permitido, verifique.<br/>' : '';

      $retorno.= $validateScript['textUpper'] === '' || $validateScript['textUpper'] === NULL  ? 
                'Campo de texto grande vazio, verifique. <br/>' : '';
      $retorno.= $validateScript['text'] === '' || $validateScript['textUpper'] === NULL  ? 
                'Campo de texto vazio, verifique. <br/>' : '';
      $this->mensagem = $retorno;
      return $retorno === '';
    }
    return false;
  }
  public function renderer($param=false){
    if($param){
      $param['text'] = strtolower($param['text']);
      $param['textUpper'] = strtoupper($param['textUpper']);
      $param['erro'] = '';
    }
    return $param;
  }
}
?>