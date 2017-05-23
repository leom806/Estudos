<?php
	session_start();
	
	if(isset($_GET['logout'])){
		session_destroy();
		header('Location: index.php');
	}
	
	if(isset($_SESSION['logado']) && $_SESSION['logado']){
		 header('Location: javascript:history.back(1)');
	}

	// Configura o titulo da pagina para corrigir a aba ativa
	$title;
	if(isset($_SESSION['incompleto'])) {
		global $title;
		$title = 'Erro';
	}else{
		global $title;
		$title = 'Home';
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
	<?php
		if(isset($_SESSION['incompleto'])){
			echo('<script>
					error("Você precisa preencher tudo antes de começar a jogar ;)");
				</script>');
			unset($_SESSION['incompleto']);
			exit(); // Poupa requisição e processamento de página que será recarregada
		}
	?>
	<form class="vertical" action="validate.php" method="GET">

	<p class="max">Digite seu nome:</p>
	<div>
		<input class="text" type="text" name="nome" placeholder="Nome Completo"/>
	</div><br/>
	<div class="control-group">
		<label for="dob-day" class="max">Data de nascimento:</label><br/><br/>
		<div class="controls">
			<select name="dob-day" id="dob-day">
				<option value="">Dia</option>
				<option value="">-----</option>
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select>
			<select name="dob-month" id="dob-month">
				<option value="">Mês</option>
				<option value="">--------------</option>
				<option value="01">Janeiro</option>
				<option value="02">Fevereiro</option>
				<option value="03">Março</option>
				<option value="04">Abril</option>
				<option value="05">Maio</option>
				<option value="06">Junho</option>
				<option value="07">Julho</option>
				<option value="08">Agosto</option>
				<option value="09">Setembro</option>
				<option value="10">Outubro</option>
				<option value="11">Novembro</option>
				<option value="12">Dezembro</option>
			</select>
			<select name="dob-year" id="dob-year">
				<option value="">Ano</option>
				<option value="">-------</option>
				<option value="2012">2012</option>
				<option value="2011">2011</option>
				<option value="2010">2010</option>
				<option value="2009">2009</option>
				<option value="2008">2008</option>
				<option value="2007">2007</option>
				<option value="2006">2006</option>
				<option value="2005">2005</option>
				<option value="2004">2004</option>
				<option value="2003">2003</option>
				<option value="2002">2002</option>
				<option value="2001">2001</option>
				<option value="2000">2000</option>
				<option value="1999">1999</option>
				<option value="1998">1998</option>
				<option value="1997">1997</option>
				<option value="1996">1996</option>
				<option value="1995">1995</option>
				<option value="1994">1994</option>
			</select>
			</div>
			<br /><br />
			<input class="btn round start" type="submit" value="Começar!">
		</div>
	</form>
</body>
</html>