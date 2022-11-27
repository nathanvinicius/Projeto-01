<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DuPC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <style>


        /* Set the style of container
            div element */
        .Container{
            height: 150px;
            width: 250px;
            overflow-y: auto;
            background-color: green;
            border-radius: 5px;
            margin: 0 auto;
        }
        /* Set the effects to the division
            named content */
        .Content{
            height: 200px;
            color: white;
            text-align: center;
        }
          
        /* Designing for scroll-bar */
        ::-webkit-scrollbar {
            width: 6px;
        }
      
        /* Track */
        ::-webkit-scrollbar-track {
            background: gainsboro;
            border-radius: 5px;
        }
      
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background-color: #212529;
            border-radius: 5px;
        }
      
        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
  <body>

  <nav class="navbar navbar-expand-lg bg-light navbar-dark bg-dark" style="margin-bottom: 50px">
  <div class="container-fluid">
    <a class="navbar-brand" href="listar_produtos.php"><i class="fa-sharp fa-solid fa-desktop"></i> DAPC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="listar_produtos.php"><i class="fa-solid fa-store"></i> PRODUTOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="pedidos.php"><i class="fa-sharp fa-solid fa-chart-simple"></i> PEDIDOS</a>
        </li>
      </ul>
      
    </div>
    <a href="listar_carrinho.php" class="navbar-brand active" href="carrinho.php"><i class="bi bi-basket"></i> Carrinho</a>
  </div>
</nav>


    <div class="container">
      <div class="row">
        <div class="col">
          
