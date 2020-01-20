<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>TIENDA DE CAMISAS  </title>
        <link rel="stylesheet" href="<?=base_url?>css/styles.css">
    </head>
    <body>
        <div id="container">
            <!--         CABECERA  -->
            <header id="header">
                <div id="logo">
                    <img src="<?=base_url?>assets/img/camiseta.png" alt="camiseta logo">
                    <a href="index.php">TIENDA DE CAMISETAS</a> 
                </div>
            </header>

            <!--         MENU  -->
            <?php 
             require_once './helpers/Utils.php';
            $categorias = Utils::showCategorias(); ?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="#">INICIO  </a>
                        <?php while ($cat = $categorias->fetch_object()) : ?>
                            <li><a href="#"><?= $cat->nombre?></a></li>
                        <?php endwhile; ?>
                    </li>

                    
                </ul>
            </nav>

            <div id="content">