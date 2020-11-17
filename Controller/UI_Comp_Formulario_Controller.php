<?php
include 'model/UI_Comp_Formulario.php';

class UI_Comp_Formulario_Controller {
  public $mensagem = '';
  public function validationForm($validateScript){
      $objForm = new UI_Comp_Formulario();
      $dataRetorno = [];
      $retorno = $objForm->UI_Comp_Formulario($validateScript);
      $dataRetorno['date'] = '';
      $dataRetorno['text'] = '';
      $dataRetorno['checkbox'] = '';
      $dataRetorno['textUpper'] = '';
      $dataRetorno['erro'] = $objForm->mensagem;
      if($retorno){        
        $dataRetorno =$objForm->renderer($validateScript);
      }
      return $dataRetorno;
  }
      
}



