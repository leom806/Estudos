<?php
  session_start();
	
  $ano_nasc = 0;

  if (!(isset($_SESSION['G-completo']) && $_SESSION['G-completo'] && 
      isset($_SESSION['W-completo']) && $_SESSION['W-completo'] &&
      isset($_SESSION['M-completo']) && $_SESSION['M-completo']))
  {
    header('Location: javascript:history.back(1)');
  }else{
    session_destroy();
  }

	$title = 'Resultado';
  if(!$_SESSION['logado']){
		 $_SESSION['incompleto'] = true;
		 header('Location: index.php');
	}else{
    global $ano_nasc;
    // impreciso
    // Declara a data! :P
    $data = $_SESSION['data'];

    // Separa em dia, mês e ano
    list($dia, $mes, $ano) = explode('/', $data);

    // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

    // Depois apenas fazemos o cálculo já citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
  }

?>
<!DOCTYPE html>
<html>
	<!-- HEAD -->
	<?php require_once("lib/header.php"); ?>
<body>

  <!-- MENU -->
  <?php require_once("lib/menu.php"); ?>
  <hr>
  <br />
  <div>
    <p>Olá, <?php echo $_SESSION['nome']; ?>!</p>
    <p>Você tem <?php echo $idade; ?> anos e esse é seu resultado:</p>
    <hr class="fifth">
    <table class="center table">
      <tr>
        <th>Geometria</th>
        <th>Palavras</th>
        <th>Matemática</th>
      </tr>
      <tr>
        <td><?php echo $_SESSION['geo']['0']; ?></td>
        <td><?php echo $_SESSION['words']['0']; ?></td>
        <td><?php echo $_SESSION['math']['0']; ?></td>
      </tr>
      <tr>
        <td><?php echo $_SESSION['geo']['1']; ?></td>
        <td><?php echo $_SESSION['words']['1']; ?></td>
        <td><?php echo $_SESSION['math']['1']; ?></td>
      </tr>
      <tr>
        <td><?php echo $_SESSION['geo']['2']; ?></td>
        <td><?php echo $_SESSION['words']['2']; ?></td>
        <td><?php echo $_SESSION['math']['2']; ?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><?php echo $_SESSION['math']['3']; ?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><?php echo $_SESSION['math']['4']; ?></td>
      </tr>
    </table>
    <hr class="fifth">
    <p class="max center">Gabarito</p>
    <hr class="fifth">
    <table class="center table">
      <tr>
        <th>Geometria</th>
        <th>Palavras</th>
        <th>Matemática</th>
      </tr>
      <tr>
        <td>Esfera</td>
        <td>Livro</td>
        <td>35</td>
      </tr>
      <tr>
        <td>Hexágono</td>
        <td>Carro</td>
        <td>35</td>
      </tr>
      <tr>
        <td>Dodecágono</td>
        <td>Guindaste</td>
        <td>35</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>35</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>96</td>
      </tr>
    </table>
    <hr class="fifth">
    <br />
    <a class="end" href="index.php?logout=">Recomeçar!</a>
  </div>
</body>
</html>