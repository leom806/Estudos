<?php
	session_start();

	$title='Palavras';
	if(!$_SESSION['logado']){
		 $_SESSION['incompleto']=true;
		header('Location: index.php');
	}
  
  if(isset($_SESSION['G-completo']) &&
    isset($_SESSION['W-completo']) &&
    isset($_SESSION['M-completo']))
  {
    header('Location: score.php');
  }

  if(isset($_SESSION['W-completo']))
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
        <p class="max">Tente adivinhar o que vê na imagem!</p>
        <input type="hidden" name="words" value="">
        <h3></h3>
        <div id="g1">
            <img src="img/w1.jpg"><br/><br/>
            <input class="text" type="text" name="opcao0"><br><br/>
        </div>

        <h3></h3>
        <div id="g2">
            <img src="img/w2.png"><br/><br/>
            <input class="text" type="text" name="opcao1"><br><br/>
        </div>

        <h3></h3>
        <div id="g3">
            <img src="img/w3.jpg"><br/><br />
            <input class="text" type="text" name="opcao2"><br><br/>
        </div>
    </form>

    <script>
        function similar(guess, goal){
          var guess_ = guess.toUpperCase();
          var goal_ = goal.toUpperCase(); 
          if(guess_ == goal_) return 'Parabéns!';
          if(guess_[0] != goal_[0]){
            return 'Tente outra palavra...';
          }
          var chars = '';
          for (var i = 0; i < goal.length || i < guess.length ; i++) {
            if(goal_[i] == guess_[i]) chars += guess[i];
            else break;
          }
          return 'Você acertou até '+chars+'!';
        };
        var respostas = ['Livro', 'Carro', 'Guindaste'];
        var form = $("#perguntas");
        form.steps({
            headerTag: "h3",
            bodyTag: "div",
            transitionEffect: "none",
            autoFocus: true,
            forceMoveForward: true,
            onStepChanging: function (event, currentIndex, nextIndex)
              {
                  var input = 'input[name="opcao' +currentIndex+ '"]';
                  if($(input).val() != '') {
                    var msg = similar($(input).val(), respostas[currentIndex]);
                    if(msg == 'Parabéns!') {
                      swal('Você conseguiu! =D!', msg, 'success');
                      return nextIndex;
                    }else{
                      swal('Tente de novo!', msg, 'info');
                    }
                  }
                  else swal('Erro!','Você precisa tentar adivinhar =(');
              },
            onFinished: function (event, currentIndex)
                {
                  var input = 'input[name="opcao' +currentIndex+ '"]';
                  if($(input).val() != '') {
                    var msg = similar($(input).val(), respostas[currentIndex]);
                    if(msg == 'Parabéns!') {
                      finish_success('Você conseguiu! =D', '#perguntas');
                    }else{
                      swal('Tente de novo!', msg, 'info');
                    }
                  }
                  else swal('Erro!','Você precisa tentar adivinhar =(');
                }
          });

        $('.steps').hide();
    </script>

</body>
</html>