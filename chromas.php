<?php
    include("./conexao/conexao.php")
?>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection Viewer - Chromas</title>

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" type="text/css" href ="./dist/css/bootstrap.min.css">

</head>
<body>
    <!-- Navegation bar -->
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
    
    <!-- Form bar -->
    <form method="post" action="skins.php" style="width:170px;">
        
        <!-- Order by -->
            <div class="form-group">
                <h6>Order By</h6>
                <select class="form-control" id="orderby" name="orderby" >
                    <option value="order by Champion asc" selected>Champion: A-Z</option>
                    <option value="order by Champion desc">Champion: Z-A</option>
                    <option value="order by Lane asc">Lane: A-Z</option>
                    <option value="order by Lane desc">Lane: Z-A</option>
                    <option value="order by Skin asc">Skin: A-Z</option>
                    <option value="order by Skin desc">Skin: Z-A</option>
                    <option value="order by Value desc">Value: High-Low</option>
                    <option value="order by Value asc">Value: Low-High</option>
                </select>
            </div>   
            
            <?php
            
            $orderby = "order by Champion asc";

            //IF para só fazer o "$orderby = $_POST['orderby'];" apenas se alguma opção for selecionada
            if (isset($_POST['orderby'])){
                $orderby = $_POST['orderby'];
            } else {
                $orderby = "order by Champion asc";
            }

            ?>  

        <!-- Filtration bar -->
            <div class="form-group">
                <h6>Filter By</h6>
                <select class="form-control" id="filter" name="filter" >
                    <option value="" selected>All Lanes</option>
                    <option value="where Lane = 'TOP' ">TOP</option>
                    <option value="where Lane = 'JNG' ">JNG</option>
                    <option value="where Lane = 'MID' ">MID</option>
                    <option value="where Lane = 'BOT' ">BOT</option>
                    <option value="where Lane = 'SUP' ">SUP</option>
                </select>
            </div>   
            <button type="submit" class="btn btn-primary" style="float:right;">Apply</button>
            
            <?php

            //IF para só fazer o "$filter = $_POST['filter'];" apenas se alguma opção for selecionada
            if (isset($_POST['filter'])){
                $filter = $_POST['filter'];
            } else {
                $filter = "";
            }

            ?>  

    </form>
    
    <!-- BD table -->
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Champion</th>
            <th scope="col">Role</th>
            <th scope="col">Skin</th>
            <th scope="col">Tier</th>
            <th scope="col">Legacy</th>
            <th scope="col">Value (RP)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            
            <td>
            <!-- Puxando a coluna "Champion" do BD -->
            <?php 
            $inf_champ_bd = "SELECT * FROM skins $filter $orderby";
            $info_champ_bd = mysqli_query($mysqli, $inf_champ_bd);
            while($info_champ = mysqli_fetch_assoc($info_champ_bd)){ echo $info_champ['Champion'] . "<br><hr>";} 
            ?>
            </td>

            <td>
            <!-- Puxando a coluna "Lane" do BD -->
            <?php 
            $inf_lane_bd = "SELECT * FROM skins $filter $orderby";
            $info_lane_bd = mysqli_query($mysqli, $inf_lane_bd);
            while($info_lane = mysqli_fetch_assoc($info_lane_bd)){ echo $info_lane['Lane'] . "<br><hr>";} 
            ?>
            </td>
            
            <td>
            <!-- Puxando a coluna "Skin" do BD -->
            <?php 
            $inf_skin_bd = "SELECT * FROM skins $filter $orderby";
            $info_skin_bd = mysqli_query($mysqli, $inf_skin_bd);
            while($info_skin = mysqli_fetch_assoc($info_skin_bd)){ echo $info_skin['Skin'] . "<br><hr>";} 
            ?>
            </td>

            <td>
            <!-- Puxando a coluna "Tier" do BD -->
            <?php 
            $inf_tier_bd = "SELECT * FROM skins $filter $orderby";
            $info_tier_bd = mysqli_query($mysqli, $inf_tier_bd);
            while($info_tier = mysqli_fetch_assoc($info_tier_bd)){ echo $info_tier['Tier'] . "<br><hr>";} 
            ?>
            </td>

            <td>
            <!-- Puxando a coluna "Legacy" do BD -->
            <?php 
            $inf_legacy_bd = "SELECT * FROM skins $filter $orderby";
            $info_legacy_bd = mysqli_query($mysqli, $inf_legacy_bd);
            while($info_legacy = mysqli_fetch_assoc($info_legacy_bd)){ echo $info_legacy['Legacy'] . "<br><hr>";} 
            ?>
            </td>

            <td>
            <!-- Puxando a coluna "Value" do BD -->
            <?php 
            $inf_value_bd = "SELECT * FROM skins $filter $orderby";
            $info_value_bd = mysqli_query($mysqli, $inf_value_bd);
            while($info_value = mysqli_fetch_assoc($info_value_bd)){ echo $info_value['Value'] . "<br><hr>";} 
            ?>
            </td>

            </tr>
        </tbody>
    </table>

    <!-- JS Bootstrap -->
    <script type="text/javascript" src="./dist/js/bootstrap.bundle.js"></script>
</body>
</html>