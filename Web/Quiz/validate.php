<?php
  session_start();

  // Geometria
  if(isset($_GET['geo']) && 
     isset($_GET['opcao0']) &&
     isset($_GET['opcao1']) &&
     isset($_GET['opcao2'])){
    $array = array($_GET['opcao0'], $_GET['opcao1'], $_GET['opcao2']);
    $_SESSION['geo'] = $array;
    $_SESSION['G-completo'] = true;
    if(isset($_SESSION['M-completo']) &&
       isset($_SESSION['W-completo']))
    {
      header('Location: score.php');
    }else if(isset($_SESSION['W-completo'])){  
      header('Location: math.php');
    }else{
      header('Location: words.php');
    }
    exit();
  }

  // Palavras
  if(isset($_GET['words']) && 
     isset($_GET['opcao0']) &&
     isset($_GET['opcao1']) &&
     isset($_GET['opcao2'])){
    $array = array($_GET['opcao0'], $_GET['opcao1'], $_GET['opcao2']);
    $_SESSION['words'] = $array;
    $_SESSION['W-completo'] = true;
    if(isset($_SESSION['G-completo']) &&
       isset($_SESSION['M-completo']))
    {
      header('Location: score.php');
    }else if(isset($_SESSION['G-completo'])){
      header('Location: math.php');
    }else{
      header('Location: geo.php');
    }
    exit();
  }

  // Matematica
  if(isset($_GET['math']) && 
     isset($_GET['opcao0']) &&
     isset($_GET['opcao1']) &&
     isset($_GET['opcao2']) &&
     isset($_GET['opcao3']) &&
     isset($_GET['opcao4'])) {
    $array = array($_GET['opcao0'], $_GET['opcao1'], $_GET['opcao2'], $_GET['opcao3'], $_GET['opcao4']);
    $_SESSION['math'] = $array;
    $_SESSION['M-completo'] = true;
    if(isset($_SESSION['G-completo']) &&
       isset($_SESSION['W-completo']))
    {
      header('Location: score.php');
    }else if(isset($_SESSION['G-completo'])){
      header('Location: words.php');
    }else{
      header('Location: geo.php');
    }
    exit();
  }

  // Index
  $redirect = 'geo.php';

  if(!empty($_GET['dob-day']) && 
     !empty($_GET['dob-month']) &&
     !empty($_GET['dob-year']) && 
     !empty($_GET['nome']))
  {
    $dia = $_GET['dob-day'];
    $mes = $_GET['dob-month'];
    $ano = $_GET['dob-year'];
    $nome_completo = ucwords($_GET['nome']);
    list($nome, $sobrenome) = explode(' ', $nome_completo, 2);
    // Persistência
    $_SESSION['nome'] = $nome;
    $_SESSION['sobrenome'] = $sobrenome;
    $_SESSION['nome_completo'] = $nome . ' ' . $sobrenome;
    $_SESSION['data'] = $dia.'/'.$mes.'/'.$ano;
    $_SESSION['ano'] = $ano;
    $_SESSION['logado'] = true;
    $_SESSION['geo'] = 0;
    $_SESSION['words'] = 0;
    $_SESSION['math'] = 0;

    header('Location: ' . $redirect);

  }else{
    $_SESSION['incompleto'] = true;
    header('Location: index.php');
  }
?>