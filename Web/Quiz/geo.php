<?php
	session_start();

	$title='Geometria';
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

    if(isset($_SESSION['G-completo']))
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
        <p class="max bold">Qual é a forma abaixo?</p>
        <input type="hidden" name="geo" value="ok">
        <h3></h3>
        <div id="g1">
            <img src="img/g1.png">
            <table class="center" >
                <tr><td class="left"><input type="radio" name="opcao0" value="Elipse">Elipse</td></tr>
                <tr><td class="left"><input type="radio" name="opcao0" value="Cubo">Cubo</td></tr>
                <tr><td class="left"><input type="radio" name="opcao0" value="Esfera">Esfera</td></tr>
            </table>
        </div>

        <h3></h3>
        <div id="g2">
            <img src="img/g2.png">
            <table class="center">
                <tr><td class="left"><input type="radio" name="opcao1" value="Octógono">Octógono</td></tr>
                <tr><td class="left"><input type="radio" name="opcao1" value="Hexágono">Hexágono</td></tr>
                <tr><td class="left"><input type="radio" name="opcao1" value="Dodecágono">Dodecágono</td></tr>
            </table> 
        </div>

        <h3></h3>
        <div id="g3">
            <img src="img/g3.png"><br /><br />
            <table class="center">
                <tr><td class="left"><input type="radio" name="opcao2" value="Quadrado">Quadrado</td></tr>
                <tr><td class="left"><input type="radio" name="opcao2" value="Círculo">Círculo</td></tr>
                <tr><td class="left"><input type="radio" name="opcao2" value="Triângulo">Triângulo</td></tr>
            </table>
            <br />     
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
                    var input = 'input[name="opcao' +currentIndex+ '"]:checked';
                    var selected = false;
                    if($(input).val() == 'Esfera' || $(input).val() == 'Hexágono'){
                        swal('Parabéns!','Você acertou!', 'success' );
                        selected = true;
                    }else if($(input).val() != 'undefined'){
                        swal('Que pena!','Não foi dessa vez!', 'error');
                        selected = true;
                    }
                    if(!selected) swal('Erro!','Você precisa escolher uma opção =(', 'error');
                    else return nextIndex;
                },
            onFinished: function (event, currentIndex)
                {
                    var input = 'input[name="opcao' +currentIndex+ '"]:checked';
                    var selected = false;
                    if($(input).val() == 'Triângulo'){
                        finish_success('Você acertou!', '#perguntas');
                    }else if($(input).val() != 'undefined'){
                        finish_error('#perguntas');
                    }
                    else if(!selected) swal('Erro!','Você precisa escolher uma opção =(', 'error');
            }
        });

        $('.steps').hide();
    </script>

</body>
</html>