<?php
    include("./conexao/conexao.php")
?>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinsLOL - Add</title>

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" type="text/css" href ="./dist/css/bootstrap.min.css">

</head>
<body>
    <!-- Navegation bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.html">SkinsLOL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="./skins.php">Skins</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="./chromas.php">Chromas</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="./add.php">Add</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="./del.php">Delete</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Add form -->
        <form method="post" action="add.php">
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Type</label>
                <select class="form-control" id="Type" name="Type" >
                    <option selected></option>
                    <option value="skins">Skin</option>
                    <option value="chromas">Chroma</option>
                </select>
            </div>    
        
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Champion</label>
                <input class="form-control" id="Champ" name="Champ" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Champion Name.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Role</label>
                <select class="form-control" id="Lane" name="Lane" >
                    <option selected></option>
                    <option value="TOP">TOP</option>
                    <option value="JNG">JNG</option>
                    <option value="MID">MID</option>
                    <option value="BOT">BOT</option>
                    <option value="SUP">SUP</option>
                </select>
                <div id="emailHelp" class="form-text">Champion Role.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Skin</label>
                <input class="form-control" id="Skin" name="Skin" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Skin Name.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tier</label>
                <select class="form-control" id="Tier" name="Tier" >
                    <option selected></option>
                    <option value="Others">Others</option>
                    <option value="Epic">Epic</option>
                    <option value="Legendary">Legendary</option>
                    <option value="Mythic">Mythic</option>
                    <option value="Ultimate">Ultimate</option>
                </select>
                <div id="emailHelp" class="form-text">Skin Tier.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Legacy</label>
                <select class="form-control" id="Legacy" name="Legacy" >
                    <option selected></option>
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
                </select>
                <div id="emailHelp" class="form-text">Skin Legacy.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Value (RP)</label>
                <input class="form-control" id="Value" name="Value" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Skin Value in Riot Points.</div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    
    <!-- PHP get Informations of "Add form" and insert into BD -->
    <?php

        if (isset($_POST['Champ'])){
        $Champ = $_POST['Champ'];
        $Lane = $_POST['Lane'];
        $Skin = $_POST['Skin'];
        $Tier = $_POST['Tier'];
        $Legacy = $_POST['Legacy'];
        $Value = $_POST['Value'];
        $Type = $_POST['Type'];
        }
        
        if (isset($Champ)){
        $add_skin_bd = "INSERT INTO $Type (Champion, Lane, Skin, Tier, Legacy, Value) VALUES ('$Champ', '$Lane', '$Skin', '$Tier', '$Legacy', '$Value')";
        mysqli_query($mysqli,$add_skin_bd);
        }
        
    ?>

    <!-- JS Bootstrap -->
    <script type="text/javascript" src="./dist/js/bootstrap.bundle.js"></script>
</body>
</html>