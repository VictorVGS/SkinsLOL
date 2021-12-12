<?php
    include("./conexao/conexao.php")
?>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection Viewer - Delete</title>

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" type="text/css" href ="./dist/css/bootstrap.min.css">

</head>
<body>
    <!-- Navegation bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Collection Viewer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
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

    <!-- Delete form -->
    <form method="post" action="del.php">
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Type</label>
            <select class="form-control" id="Type" name="Type" >
                    <option selected></option>
                    <option value="skins">Skin</option>
                    <option value="chromas">Chroma</option>
            </select>
        </div>    
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Skin</label>
            <input class="form-control" id="Skin" name="Skin" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Skin Name.</div>
        </div>

        <button type="submit" class="btn btn-primary">Delete</button>
    </form>
    
    <!-- PHP get Informations of "Delete form" and DELETE from BD -->
    <?php

        if (isset($_POST['Skin'])){
        $Skin = $_POST['Skin'];
        $Type = $_POST['Type'];
        }
        
        if (isset($Skin)){
        $del_skin_bd = "DELETE FROM $Type WHERE Skin = '$Skin'";
        mysqli_query($mysqli,$del_skin_bd);
        }
        
    ?>

    <!-- JS Bootstrap -->
    <script type="text/javascript" src="./dist/js/bootstrap.bundle.js"></script>
</body>
</html>