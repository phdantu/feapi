<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $titulo ?></title>

    <!-- Bootstrap core CSS -->
    <!-- <link href./site/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet"> -->

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <script src="//code.jquery.com/jquery-2.2.2.min.js"></script> --></head>

  <body>
    <?php if(isset($_SESSION['login']) && isset($_SESSION['senha'])){ ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url('index.php/pagina/cadastro') ?>"> <?php echo $titulo ?> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url('index.php/pagina/cadastro') ?>">Cadastro Livro
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/pagina/tabela') ?>">Tabela Livro</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url('index.php/autor/cadastroAutor') ?>">Cadastro Autor
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/autor/tabelaAutor') ?>">Tabela Autor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/cliente/cadastroCliente') ?>">Cadastro Cliente</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/cliente/tabelaCliente') ?>">Tabela Cliente</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/pagina/logout') ?>">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php }else{ ?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#"> <?php echo $titulo ?> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          </ul>
        </div>
      </div>
    </nav>
    <?php } ?>
    