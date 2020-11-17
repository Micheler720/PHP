<?php
  $param['date'] = '';
  $param['text'] = '';
  $param['textUpper'] ='';
  $param['checkbox'] = '';
  $param['erro'] = '';
  if(!empty($_GET['submit'])){
    include 'controller/UI_Comp_Formulario_Controller.php';
    $validateScript['date'] = FILTER_INPUT(INPUT_POST, 'date');
    $validateScript['text'] = FILTER_INPUT(INPUT_POST, 'text');
    $validateScript['checkbox'] = FILTER_INPUT(INPUT_POST, 'checkbox');
    $validateScript['textUpper'] = FILTER_INPUT(INPUT_POST, 'textUpper');
    $objController = new UI_Comp_Formulario_Controller();
    $param = $objController->validationForm($validateScript);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/styles/style.css">
  <script src="assets/scripts/scripts.js"></script>
  <title>Teste</title>
</head>
<body>
  <div class="title">
    <div class="container title-div-text">
      <h1>Formulario de Teste</h1>
    </div>
  </div>
  <div class="formulario-div">  
    <div class="container formulario">
      <form method="POST" onsubmit="return validationForm(event)" action="index.php?submit=form">
        <div class='form-control'>     
          <div class="label-text">
            <label for="data" class="form-label">Data:</label>
          </div>     
          <input type="date" id="date" name="date" value="<?php echo $param['date']; ?>" onchange="removeClassError(event)"/>
        </div>
        <div class='form-control'>
          <div class="label-text">
            <label for="text" class="form-label" >Texto:</label>
          </div>  
          <input type="text" id="text" onchange="removeClassError(event)" name="text" maxlength="144" value="<?php echo $param['text']; ?>" />
        </div>
        <div class='form-control'>
          <div class="label-text">
            <label for="checkbox" class="form-label">Checkbox:</label>
          </div>  
          <input type="checkbox" id="checkbox"  name="checkbox" <?php echo $param['checkbox'] === 'on'? 'checked' : '' ?>/>
        </div>
        <div class='form-control'>
          <div class="label-text">
            <label for="textUpper" onchange="removeClassError(event)" class="form-label" >Texto Grande:</label>
          </div>  
          <textarea name="textUpper" onchange="removeClassError(event)"  id="textUpper" cols="30" rows="10">
            <?php echo trim($param['textUpper']); ?>
          </textarea> 
        </div>
        <input type="submit" value="submit" />
      </form>
    </div>
    <div class="container subtitle-form">
      <span>Teste Formulário</span><br />
      <div class="error"><?php echo $param['erro'] ?></div>
    </div>
  </div>
  
</body>
</html>