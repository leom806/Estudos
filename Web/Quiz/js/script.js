function error(message){
  swal({
      title: 'Oops',
      text: message,
      type: 'error',
      closeOnConfirm: true
    }, function(){
      window.location.href = 'index.php';
    });
};

function error_back(message){
  swal({
      title: 'Oops',
      text: message,
      type: 'error',
      closeOnConfirm: true
    }, function(){
      window.history.back(1);
    });
};

function finish_success(form){
  swal({
      title: 'Parabéns!',
      text: 'Você conseguiu! =D',
      type: 'success',
      closeOnConfirm: true
  }, function(){
     return $(form).submit();
  });
}

function finish_success(message, form){
  swal({
      title: 'Parabéns!',
      text: message,
      type: 'success',
      closeOnConfirm: true
  }, function(){
     return $(form).submit();
  });
}

function finish_error(form){
  swal({
      title: 'Que pena!',
      text: 'Mas você pode tentar de novo! ;)',
      type: 'error',
      closeOnConfirm: true
  }, function(){
     return $(form).submit();
  });
}