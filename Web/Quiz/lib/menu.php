<?php  
  function active($tab){
    global $title;
    if($tab==$title) echo(' class="active" ');
  }

  function complete($quest){
    if(isset($_SESSION[$quest]) && $_SESSION[$quest]){
      echo('class="complete"');
    }
  }

  if(isset($_SESSION['nome']) && !empty($_SESSION['nome'])){
    $user = $_SESSION['nome'];
  }
?>
<ul>
  <li><a <?php active('Home'); ?> href="index.php">Home</a></li>
  <li><a <?php active('Geometria'); complete('G-completo'); ?> href="geo.php">Geometria</a></li>
  <li><a <?php active('Palavras'); complete('W-completo'); ?> href="words.php">Palavras</a></li>
  <li><a <?php active('Matemática'); complete('M-completo'); ?> href="math.php">Matemática</a></li>
  <li><a <?php active('Resultado'); ?> href="score.php">Resultado</a></li>
  <?php 
    if(isset($_SESSION['logado'])){
      echo("<li class=\"right\"><a href=\"index.php?logout=\"> $user | Sair</a></li>");
    }
  ?>
</ul>