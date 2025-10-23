<?php
// (Não precisa de session_start() aqui se o Controller já o fez)
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bakbak+One&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Oswald:wght@200..700&family=Outfit:wght@100..900&family=Quicksand:wght@300..700&family=Staatliches&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/619d5231f4.js" crossorigin="anonymous"></script>    
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">    

    <script src="/js/inicio.js"></script>
    <link rel="stylesheet" href="/css/inicio.css">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $pageTitle ?? 'Vincenza'; ?></title>
</head>
<body style="margin: 0;">
    <div id="upperbar">
        <div id="upper1"> 
            <img id="logo" src="/images/1000018033.png"> <p style="font-family: 'Quicksand', sans-serif"> Vincenza</p></img>
        </div>
        <div id="upper2">
            <a href="/estoque"> <b class="lnk1">estoque</b> <span></span></a>
            
            <?php if (isset($_SESSION['usuario_nome'])): ?>
                <a href="/minha-conta"> <b class="lnk1">Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></b> <span></span></a>
                <a href="/logout"> <b class="lnk1">Sair</b> <span></span></a>
            <?php else: ?>
                <a href="/login"> <b class="lnk1">registro</b> <span></span></a>
            <?php endif; ?>

            <a href="#"> <b class="lnk2">catálogo</b> <span></span></a>
            <a href="/reserva"> <b class="lnk3">reserva</b> <span></span></a>
            <a href="#"> <b class="lnk4">financiamento</b> <span></span></a>
        </div>
        <div id="upper3">
            <div><span id="lgn" onclick="changelg()">linguagem</span> <span id="linguagemslct" style="background-image:url(/images/Flag_of_Brazil.svg.webp); background-position: center; background-size: cover;"></span></div>
            <div><span onclick="darkmode()" id="darkmd"><span id="balldm"></span></span></div>
        </div>
    </div>

    <div id="carrossel">
        <p id="img1" onclick="passcar()" style="background-image: url(/images/carro1.png);">
            <i class="fa-solid fa-angle-left fa-2xl" style="color: rgb(255, 255, 255); width: 100%; height: 100%; font-size: 500%; display: flex; align-items: center; justify-content: center;"></i>
        </p>
        <p id="img2" style="background-image: url(/images/carro2.png);"></p>
        <p id="img3" onclick="backcar()" style="background-image: url(/images/carro3.png);">
            <i class="fa-solid fa-angle-left fa-2xl" style="color: rgb(255, 255, 255); rotate: 180deg; width: 100%; height: 100%; font-size: 500%; display: flex; align-items: center; justify-content: center;"></i>
        </p>
        <p id="barpass" class="ocultarbarra" style="width: 15%; position:absolute; border: 0;"></p>
        <p id="barback" class="ocultarbarra" style="width: 15%; position:absolute; border: 0;"></p>
    </div>

    <div id="center">
        <div id="searchdiv">
                 <div id="nameshow" style="width: min-content;">
                         <p id="name" style="padding-left: 0.5vh;"> Carro </p> <span style="color: rgba(0, 0, 0, 0); width: 6vh; height: 3.2vh;"></span>
                    </div>
                <div id="carrobusca">
                    <p id="carroshow">
                    </p>
                    <div id="descricaoshow">
                         <div style="border: solid rgb(255, 232, 206) 1px; width: 100%; border-radius: 3px;">
                        <span id="sp1" style="width: 20%;">
                         <li>Nome</li>
                         <li>Marca</li>
                         <li>Cor</li>
                         <li>Preço</li>
                         <li>Fabricante</li>
                         <li>Tipo</li>
                         <li>Combustivel</li>
                        </span>
                        <span style="width: 80%;">
                         <li>Nome</li>
                         <li>Marca</li>
                         <li>Cor</li>
                         <li>Preço</li>
                         <li>Fabricante</li>
                         <li>Tipo</li>
                         <li>Combustivel</li>
                        </span>
                    </div>
                    </div>
                </div>
                <div id="sch1"> <a style="margin-left: 0;">todos</a> <a>novos</a> <a>usados</a> </div>
                <div id="sch2">
                    <span id="searchbar"><input autocomplete="off" oninput="found()" style="width: 90%; height: 4vh; background-color: rgb(255, 255, 255);" type="text" id="carpesquisa" placeholder="pesquise um carro pelo nome"><i class="fa-solid fa-magnifying-glass" style="position: relative;" id="lupa"></i></span>
                </div>
        </div>
    </div>

    <div id="bottonbar">
        Uma concessionária que faz acontecer.
    </div>
    
</body>
</html>