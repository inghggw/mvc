<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MVC Comercio</title>
  
<!--  Librerias css-->
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-light">
  <a href="index.php?c=inicio&a=index" class="navbar-brand">Ejemplo</a>
  <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
    <ul class="navbar-nav">
           
      
      <?php
          
        
        //echo var_dump($menu);
      
        foreach($menu as $key => $value){
          echo '<li class="nav-item"><a class="nav-link" href="index.php?c='.$value->controlador.'&a='.$value->accion.'">'.$value->nombre.'</a></li>';
        }
//        var_dump($_SESSION['menu']); 
      
      ?>
            
      <?php if($_SESSION['login']==true){?> 
      
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdown"><?php echo $_SESSION['usuario'][0]->nombre ?></a>
          
          <div class="dropdown-menu" style="left:-87px" aria-labelledby="navbarDropdown">
            <a href="index.php?c=inicio&a=destroy" class="dropdown-item">Cerrar sesion</a>
          </div>
        </li>
       
      <?php }else{ ?>
  
        <li class="nav-item">
          <a href="index.php?c=inicio&a=login" class="nav-link btn btn-secondary text-white">Ingresar</a>
        </li>
        
      <?php } ?>
<!--
      <li class="nav-item">
        <button class="nav-link btn btn-secondary text-white">Cerrar sesion</button>
      </li>
-->
<!--
      <li class="nav-item">
        <button class="nav-link btn btn-secondary text-white">Ingresar</button>
      </li>
-->
    </ul>
  </div>
</nav>

<div class="container-fluid">