<?php
	session_start();

	$title = 'Matemática';
	if(!$_SESSION['logado']){
		 $_SESSION['incompleto'] = true;
		header('Location: index.php');
	}

  if(isset($_SESSION['G-completo']) &&
    isset($_SESSION['W-completo']) &&
    isset($_SESSION['M-completo']))
  {
    header('Location: score.php');
  }

  if(isset($_SESSION['M-completo']))
  {
    header('Location: javascript:history.back(1)');
  }
?>
<!DOCTYPE html>
<html>
	<!-- HEAD -->
	<?php require_once("lib/header.php"); ?>
<body>

	<!-- MENU -->
	<?php require_once('lib/menu.php'); ?>
	
	<hr>
	
	<form class="vertical" action="validate.php" method="GET" id="perguntas">
    <p class="max">Qual é a resposta desta conta?</p>
    <input type="hidden" name="math" value="ok">

    <h3></h3>
		<div>
      <img src="img/m1.png"><br/><br/>
			<input class="text" type="text" name="opcao0" value="0"><br><br/><!-- 35 -->
      <input type="text" id="resposta0" class="resposta" value="35">
		</div>

    <h3></h3>
		<div>
      <img src="img/m2.png"><br/><br/>
			<input class="text" type="text" name="opcao1" value="0"><br><br/><!-- 35 -->
      <input type="text" id="resposta1" class="resposta" value="35">
		</div>

    <h3></h3>
		<div>
      <img src="img/m3.png"><br/><br/>
			<input class="text" type="text" name="opcao2" value="0"><br/><br/><!-- 35 -->
      <input type="text" id="resposta2" class="resposta" value="35">
		</div>

    <h3></h3>
		<div>
      <img src="img/m4.png"><br/><br/>
			<input class="text" type="text" name="opcao3" value="0"><br/><br/><!-- 35 -->
      <input type="text" id="resposta3" class="resposta" value="35">
		</div>

    <h3></h3>
		<div>
      <img src="img/m5.png"><br/><br/>
			<input class="text" type="text" name="opcao4" value="0"><br/><br/><br/><br/><!-- 96 -->
      <input type="text" id="resposta4" class="resposta" value="96">
		</div>
	</form>

  <script>
    var form = $("#perguntas");
    form.steps({
        headerTag: "h3",
        bodyTag: "div",
        transitionEffect: "none",
        autoFocus: true,
        forceMoveForward: true,
        onStepChanging: function (event, currentIndex, nextIndex)
          {
              var text = 'input[name="opcao' +currentIndex+ '"]';
              var hidden = 'input#resposta' +currentIndex;
              var tentativa = $(text).val();
              var resposta = $(hidden).val();
              console.log(tentativa);
              console.log(resposta);
              if(tentativa == resposta){
                swal('Parabéns!', 'Você acertou a resposta! =D', 'success');
              }else{
                swal('Que pena!', 'Mas você pode tentar de novo! ;)', 'error');
              }
              return nextIndex;
          },
        onFinished: function (event, currentIndex)
          {
              var text = 'input[name="opcao' +currentIndex+ '"]';
              var hidden = 'input#resposta' +currentIndex;
              var tentativa = $(text).val();
              var resposta = $(hidden).val();
              console.log(tentativa);
              console.log(resposta);
              if(tentativa == resposta){
                finish_success('Você acertou a resposta! =D','#perguntas');
              }else{
                finish_error('#perguntas');
              }
          }
      });
    $('input[type="text"]').each(function(){
      if( $(this).is('.resposta') ) $(this).hide();
    });
    $('.steps').hide();
  </script>

</body>
</html>