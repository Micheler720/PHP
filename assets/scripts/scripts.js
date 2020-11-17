
window.onload = loadPage;

function loadPage(){
  var campos = document.querySelectorAll('textarea');
  campos.forEach(campo => {
    campo.value = campo.value.trim();
  });
}

function validationForm(event){
  event.preventDefault();
  let date = document.getElementById('date');
  let text = document.getElementById('text');
  let textUpper = document.getElementById('textUpper');
  let retorno = '';
  if(text.value.length > 144){
    text.classList.add('error-border');
    retorno+= 'Campo de texto maior que o máximo permitido,verifique.\n';
  }
  if(textUpper.value.length > 255 ){
    textUpper.classList.add('error-border');
    retorno+= 'Campo de texto grande maior que o máximo permitido, verifique.\n';
  }
  if(textUpper.value.trim() === ''){
     textUpper.classList.add('error-border');
     textUpper.value = '';
     retorno+= 'Campo de texto grande vazio, verifique.\n';
  }
  if(text.value === ''){
    text.classList.add('error-border');
    retorno+= 'Campo de texto vazio, verifique.\n';
  }
  if(this.validationDate(date.value)){
    date.classList.add('error-border');
    retorno+= 'Campo de data inválido, verifique.\n';
  }
  if(retorno !== ''){
    alert(retorno);
    return false;
  }
  text.value =text.value.toLowerCase();
  textUpper.value =textUpper.value.toUpperCase();
  event.currentTarget.submit();
  return true;
}

function validationDate(date){
  const regexDate = new RegExp("(19|20)[0-9]{2}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])");
  return !regexDate.exec(date);
}

function removeClassError(event){
  if(event.target.value !== ''){
    event.target.classList.remove('error-border');
  }
}