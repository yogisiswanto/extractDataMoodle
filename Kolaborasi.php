<?php include 'Library.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Status</title>
  </head>
  <body>
  <div class="container-fluid">
  <!-- Content here -->    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="Utama2.php" style="font-size:1.2rem">Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true" style="font-size:1.2rem">|</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Status2.php" style="font-size:1.2rem">Status<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true" style="font-size:1.2rem">|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Kolaborasi.php" style="font-size:1.2rem">Kolaborasi<span class="sr-only">(current)</span></a>
                    </li>
                
                <!-- End of navbar-nav -->
                </ul>
            <!-- End of NavbarNav -->
            </div>        
        <!-- End of Navbar Menu -->
        </nav>
        
        <div class="row">
            <div class="col">
                <br>
            </div>
        <!-- End of Row -->
        </div>
        <div class="row">
            <div class="col-sm-1">
            
            </div>
            <div class="col-10">
                <div class="card border-primary mb-3">
                
                    <div class="card-header">
                    
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="kelompok-1-tab" data-toggle="tab" href="#kelompok-1" role="tab" aria-controls="kelompok-1" aria-selected="true">Kelompok 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="kelompok-2-tab" data-toggle="tab" href="#kelompok-2" role="tab" aria-controls="kelompok-2" aria-selected="false">Kelompok 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="kelompok-3-tab" data-toggle="tab" href="#kelompok-3" role="tab" aria-controls="kelompok-3" aria-selected="false">Kelompok 3</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="kelompok-4-tab" data-toggle="tab" href="#kelompok-4" role="tab" aria-controls="kelompok-4" aria-selected="false">Kelompok 4</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="kelompok-5-tab" data-toggle="tab" href="#kelompok-5" role="tab" aria-controls="kelompok-5" aria-selected="false">Kelompok 5</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="kelompok-6-tab" data-toggle="tab" href="#kelompok-6" role="tab" aria-controls="kelompok-6" aria-selected="false">Kelompok 6</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="kelompok-7-tab" data-toggle="tab" href="#kelompok-7" role="tab" aria-controls="kelompok-7" aria-selected="false">Kelompok 7</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="kelompok-8-tab" data-toggle="tab" href="#kelompok-8" role="tab" aria-controls="kelompok-8" aria-selected="false">Kelompok 8</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="kelompok-9-tab" data-toggle="tab" href="#kelompok-9" role="tab" aria-controls="kelompok-9" aria-selected="false">Kelompok 9</a>
                            </li>
                        <!-- End of myTab -->
                        </ul>
                    <!-- End of card-header -->
                    </div>

                    <div class="card-body">
                        
                        <div class="tab-content" id="myTabContent">
                            
                            <div class="tab-pane fade show active" id="kelompok-1" role="tabpanel" aria-labelledby="kelompok-1-tab">

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 52";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 32";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 51";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 36";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>
                                
                            <!-- End of kelompok-1 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-2" role="tabpanel" aria-labelledby="kelompok-2-tab">

                            <?php
                                
                                // function collaboration(){

                                //creating connection to database            	
                                $connection = createConnection();

                                $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                        FROM `mdl_forum_posts` 
                                        WHERE `discussion` = 54";

                                // access the query....
                                $result = query($connection, $sql);

                                $new = array();
                                $temp_data = array();
                                $i = 0;

                                while ($row = $result->fetch_assoc()) {

                                    $new[$row['parent']][] = $row;
                                    $temp_data[$i] = $row;
                                                                                
                                    // showing the data...          
                                    // echo "{$row["id"]}<br>";
                                    // echo "{$row["parent"]}</td>";
                                    // echo "{$row["userid"]}</td>";
                                    // echo "{$row["message"]}</td>";

                                    $i += 1;    
                                }

                                // Initiate result and rating
                                $result = array();
                                $ratings = array();

                                $tree = createTree($new, array($temp_data[0]));
                                // Expecto patronum
                                createCustomLinkArray($tree, array(), $connection);
                                
                                // Daftar runtutan user_id
                                // echo '<pre>' . var_export($result, true) . '</pre>';

                                // Daftar rating terkait user_id
                                // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                
                                // foreach($ratings as $row){
                            
                                

                            ?>
                            <br>
                        
                            <div class="row">
                                <div class="col-8">
                                    
                                    <div class="card border-dark">
                                        <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                        <div class="card-body">
                                            <p class="card-text">

                                                <?php

                                                    foreach($result as $row){

                                                        $iterator = 0;
                                                        foreach ($row as $value) {
                                                            
                                                            if ($iterator != count($row)-1) {
                                                                
                                                                echo getUserName($value)." => ";
                                                            
                                                            }else{
                                                        
                                                                echo getUserName($value);
                                                            }
                                                        
                                                            $iterator++;
                                                            
                                                        }
                                                        
                                                        echo "<br>";
                                                        
                                                        }

                                                ?>

                                            </p>
                                        </div>
                                    </div>

                                <!-- End of col-6 -->
                                </div>
                                <div class="col-4">
                                    
                                <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>                                        
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                        
                                            <?php

                                                $key = array_keys($ratings);
                                                                                    
                                                foreach($key as $value){

                                                    echo "<tr>";
                                                        echo "<td>".getUserName($value)."</td>";
                                                        echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                    echo "</tr>";

                                                }                                                   
                                            ?>

                                            </tr>                                                
                                        </tbody>
                                    </table>

                                <!-- End of col-6 -->
                                </div>
                            <!-- End of row -->
                            </div>

                            <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 34";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div> 

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 30";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 29";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>                               

                            <!-- End of kelompok-2 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-3" role="tabpanel" aria-labelledby="kelompok-3-tab">
                            
                            <?php
                                
                                // function collaboration(){

                                //creating connection to database            	
                                $connection = createConnection();

                                $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                        FROM `mdl_forum_posts` 
                                        WHERE `discussion` = 23";

                                // access the query....
                                $result = query($connection, $sql);

                                $new = array();
                                $temp_data = array();
                                $i = 0;

                                while ($row = $result->fetch_assoc()) {

                                    $new[$row['parent']][] = $row;
                                    $temp_data[$i] = $row;
                                                                                
                                    // showing the data...          
                                    // echo "{$row["id"]}<br>";
                                    // echo "{$row["parent"]}</td>";
                                    // echo "{$row["userid"]}</td>";
                                    // echo "{$row["message"]}</td>";

                                    $i += 1;    
                                }

                                // Initiate result and rating
                                $result = array();
                                $ratings = array();

                                $tree = createTree($new, array($temp_data[0]));
                                // Expecto patronum
                                createCustomLinkArray($tree, array(), $connection);
                                
                                // Daftar runtutan user_id
                                // echo '<pre>' . var_export($result, true) . '</pre>';

                                // Daftar rating terkait user_id
                                // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                
                                // foreach($ratings as $row){
                            
                                

                            ?>
                            <br>
                        
                            <div class="row">
                                <div class="col-8">
                                    
                                    <div class="card border-dark">
                                        <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                        <div class="card-body">
                                            <p class="card-text">

                                                <?php

                                                    foreach($result as $row){

                                                        $iterator = 0;
                                                        foreach ($row as $value) {
                                                            
                                                            if ($iterator != count($row)-1) {
                                                                
                                                                echo getUserName($value)." => ";
                                                            
                                                            }else{
                                                        
                                                                echo getUserName($value);
                                                            }
                                                        
                                                            $iterator++;
                                                            
                                                        }
                                                        
                                                        echo "<br>";
                                                        
                                                        }

                                                ?>

                                            </p>
                                        </div>
                                    </div>

                                <!-- End of col-6 -->
                                </div>
                                <div class="col-4">
                                    
                                <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>                                        
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                        
                                            <?php

                                                $key = array_keys($ratings);
                                                                                    
                                                foreach($key as $value){

                                                    echo "<tr>";
                                                        echo "<td>".getUserName($value)."</td>";
                                                        echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                    echo "</tr>";

                                                }                                                   
                                            ?>

                                            </tr>                                                
                                        </tbody>
                                    </table>

                                <!-- End of col-6 -->
                                </div>
                            <!-- End of row -->
                            </div>

                            <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 50";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 38";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 44";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>
                                 
                            <!-- End of kelompok-3 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-4" role="tabpanel" aria-labelledby="kelompok-4-tab">
                                
                            <?php
                                
                                // function collaboration(){

                                //creating connection to database            	
                                $connection = createConnection();

                                $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                        FROM `mdl_forum_posts` 
                                        WHERE `discussion` = 31";

                                // access the query....
                                $result = query($connection, $sql);

                                $new = array();
                                $temp_data = array();
                                $i = 0;

                                while ($row = $result->fetch_assoc()) {

                                    $new[$row['parent']][] = $row;
                                    $temp_data[$i] = $row;
                                                                                
                                    // showing the data...          
                                    // echo "{$row["id"]}<br>";
                                    // echo "{$row["parent"]}</td>";
                                    // echo "{$row["userid"]}</td>";
                                    // echo "{$row["message"]}</td>";

                                    $i += 1;    
                                }

                                // Initiate result and rating
                                $result = array();
                                $ratings = array();

                                $tree = createTree($new, array($temp_data[0]));
                                // Expecto patronum
                                createCustomLinkArray($tree, array(), $connection);
                                
                                // Daftar runtutan user_id
                                // echo '<pre>' . var_export($result, true) . '</pre>';

                                // Daftar rating terkait user_id
                                // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                
                                // foreach($ratings as $row){
                            
                                

                            ?>
                            <br>
                        
                            <div class="row">
                                <div class="col-8">
                                    
                                    <div class="card border-dark">
                                        <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                        <div class="card-body">
                                            <p class="card-text">

                                                <?php

                                                    foreach($result as $row){

                                                        $iterator = 0;
                                                        foreach ($row as $value) {
                                                            
                                                            if ($iterator != count($row)-1) {
                                                                
                                                                echo getUserName($value)." => ";
                                                            
                                                            }else{
                                                        
                                                                echo getUserName($value);
                                                            }
                                                        
                                                            $iterator++;
                                                            
                                                        }
                                                        
                                                        echo "<br>";
                                                        
                                                        }

                                                ?>

                                            </p>
                                        </div>
                                    </div>

                                <!-- End of col-6 -->
                                </div>
                                <div class="col-4">
                                    
                                <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>                                        
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                        
                                            <?php

                                                $key = array_keys($ratings);
                                                                                    
                                                foreach($key as $value){

                                                    echo "<tr>";
                                                        echo "<td>".getUserName($value)."</td>";
                                                        echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                    echo "</tr>";

                                                }                                                   
                                            ?>

                                            </tr>                                                
                                        </tbody>
                                    </table>

                                <!-- End of col-6 -->
                                </div>
                            <!-- End of row -->
                            </div>

                            <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 39";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 26";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 37";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>
                                
                            <!-- End of kelompok-4 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-5" role="tabpanel" aria-labelledby="kelompok-5-tab">
                            
                            <?php
                                
                                // function collaboration(){

                                //creating connection to database            	
                                $connection = createConnection();

                                $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                        FROM `mdl_forum_posts` 
                                        WHERE `discussion` = 25";

                                // access the query....
                                $result = query($connection, $sql);

                                $new = array();
                                $temp_data = array();
                                $i = 0;

                                while ($row = $result->fetch_assoc()) {

                                    $new[$row['parent']][] = $row;
                                    $temp_data[$i] = $row;
                                                                                
                                    // showing the data...          
                                    // echo "{$row["id"]}<br>";
                                    // echo "{$row["parent"]}</td>";
                                    // echo "{$row["userid"]}</td>";
                                    // echo "{$row["message"]}</td>";

                                    $i += 1;    
                                }

                                // Initiate result and rating
                                $result = array();
                                $ratings = array();

                                $tree = createTree($new, array($temp_data[0]));
                                // Expecto patronum
                                createCustomLinkArray($tree, array(), $connection);
                                
                                // Daftar runtutan user_id
                                // echo '<pre>' . var_export($result, true) . '</pre>';

                                // Daftar rating terkait user_id
                                // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                
                                // foreach($ratings as $row){
                            
                                

                            ?>
                            <br>
                        
                            <div class="row">
                                <div class="col-8">
                                    
                                    <div class="card border-dark">
                                        <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                        <div class="card-body">
                                            <p class="card-text">

                                                <?php

                                                    foreach($result as $row){

                                                        $iterator = 0;
                                                        foreach ($row as $value) {
                                                            
                                                            if ($iterator != count($row)-1) {
                                                                
                                                                echo getUserName($value)." => ";
                                                            
                                                            }else{
                                                        
                                                                echo getUserName($value);
                                                            }
                                                        
                                                            $iterator++;
                                                            
                                                        }
                                                        
                                                        echo "<br>";
                                                        
                                                        }

                                                ?>

                                            </p>
                                        </div>
                                    </div>

                                <!-- End of col-6 -->
                                </div>
                                <div class="col-4">
                                    
                                <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>                                        
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                        
                                            <?php

                                                $key = array_keys($ratings);
                                                                                    
                                                foreach($key as $value){

                                                    echo "<tr>";
                                                        echo "<td>".getUserName($value)."</td>";
                                                        echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                    echo "</tr>";

                                                }                                                   
                                            ?>

                                            </tr>                                                
                                        </tbody>
                                    </table>

                                <!-- End of col-6 -->
                                </div>
                            <!-- End of row -->
                            </div>

                            <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 22";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 20";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 21";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                            <!-- End of kelompok-5 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-6" role="tabpanel" aria-labelledby="kelompok-6-tab">
                            
                            <?php
                                
                                // function collaboration(){

                                //creating connection to database            	
                                $connection = createConnection();

                                $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                        FROM `mdl_forum_posts` 
                                        WHERE `discussion` = 27";

                                // access the query....
                                $result = query($connection, $sql);

                                $new = array();
                                $temp_data = array();
                                $i = 0;

                                while ($row = $result->fetch_assoc()) {

                                    $new[$row['parent']][] = $row;
                                    $temp_data[$i] = $row;
                                                                                
                                    // showing the data...          
                                    // echo "{$row["id"]}<br>";
                                    // echo "{$row["parent"]}</td>";
                                    // echo "{$row["userid"]}</td>";
                                    // echo "{$row["message"]}</td>";

                                    $i += 1;    
                                }

                                // Initiate result and rating
                                $result = array();
                                $ratings = array();

                                $tree = createTree($new, array($temp_data[0]));
                                // Expecto patronum
                                createCustomLinkArray($tree, array(), $connection);
                                
                                // Daftar runtutan user_id
                                // echo '<pre>' . var_export($result, true) . '</pre>';

                                // Daftar rating terkait user_id
                                // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                
                                // foreach($ratings as $row){
                            
                                

                            ?>
                            <br>
                        
                            <div class="row">
                                <div class="col-8">
                                    
                                    <div class="card border-dark">
                                        <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                        <div class="card-body">
                                            <p class="card-text">

                                                <?php

                                                    foreach($result as $row){

                                                        $iterator = 0;
                                                        foreach ($row as $value) {
                                                            
                                                            if ($iterator != count($row)-1) {
                                                                
                                                                echo getUserName($value)." => ";
                                                            
                                                            }else{
                                                        
                                                                echo getUserName($value);
                                                            }
                                                        
                                                            $iterator++;
                                                            
                                                        }
                                                        
                                                        echo "<br>";
                                                        
                                                        }

                                                ?>

                                            </p>
                                        </div>
                                    </div>

                                <!-- End of col-6 -->
                                </div>
                                <div class="col-4">
                                    
                                <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>                                        
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                        
                                            <?php

                                                $key = array_keys($ratings);
                                                                                    
                                                foreach($key as $value){

                                                    echo "<tr>";
                                                        echo "<td>".getUserName($value)."</td>";
                                                        echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                    echo "</tr>";

                                                }                                                   
                                            ?>

                                            </tr>                                                
                                        </tbody>
                                    </table>

                                <!-- End of col-6 -->
                                </div>
                            <!-- End of row -->
                            </div>

                            <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 42";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 41";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 46";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                            <!-- End of kelompok-6 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-7" role="tabpanel" aria-labelledby="kelompok-7-tab">

                            <?php
                                
                                // function collaboration(){

                                //creating connection to database            	
                                $connection = createConnection();

                                $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                        FROM `mdl_forum_posts` 
                                        WHERE `discussion` = 40";

                                // access the query....
                                $result = query($connection, $sql);

                                $new = array();
                                $temp_data = array();
                                $i = 0;

                                while ($row = $result->fetch_assoc()) {

                                    $new[$row['parent']][] = $row;
                                    $temp_data[$i] = $row;
                                                                                
                                    // showing the data...          
                                    // echo "{$row["id"]}<br>";
                                    // echo "{$row["parent"]}</td>";
                                    // echo "{$row["userid"]}</td>";
                                    // echo "{$row["message"]}</td>";

                                    $i += 1;    
                                }

                                // Initiate result and rating
                                $result = array();
                                $ratings = array();

                                $tree = createTree($new, array($temp_data[0]));
                                // Expecto patronum
                                createCustomLinkArray($tree, array(), $connection);
                                
                                // Daftar runtutan user_id
                                // echo '<pre>' . var_export($result, true) . '</pre>';

                                // Daftar rating terkait user_id
                                // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                
                                // foreach($ratings as $row){
                            
                                

                            ?>
                            <br>
                        
                            <div class="row">
                                <div class="col-8">
                                    
                                    <div class="card border-dark">
                                        <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                        <div class="card-body">
                                            <p class="card-text">

                                                <?php

                                                    foreach($result as $row){

                                                        $iterator = 0;
                                                        foreach ($row as $value) {
                                                            
                                                            if ($iterator != count($row)-1) {
                                                                
                                                                echo getUserName($value)." => ";
                                                            
                                                            }else{
                                                        
                                                                echo getUserName($value);
                                                            }
                                                        
                                                            $iterator++;
                                                            
                                                        }
                                                        
                                                        echo "<br>";
                                                        
                                                        }

                                                ?>

                                            </p>
                                        </div>
                                    </div>

                                <!-- End of col-6 -->
                                </div>
                                <div class="col-4">
                                    
                                <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>                                        
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                        
                                            <?php

                                                $key = array_keys($ratings);
                                                                                    
                                                foreach($key as $value){

                                                    echo "<tr>";
                                                        echo "<td>".getUserName($value)."</td>";
                                                        echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                    echo "</tr>";

                                                }                                                   
                                            ?>

                                            </tr>                                                
                                        </tbody>
                                    </table>

                                <!-- End of col-6 -->
                                </div>
                            <!-- End of row -->
                            </div>         

                            <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 35";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>    

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 48";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 45";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>                   

                            <!-- End of kelompok-7 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-8" role="tabpanel" aria-labelledby="kelompok-8-tab">
                            
                            <?php
                                
                                // function collaboration(){

                                //creating connection to database            	
                                $connection = createConnection();

                                $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                        FROM `mdl_forum_posts` 
                                        WHERE `discussion` = 49";

                                // access the query....
                                $result = query($connection, $sql);

                                $new = array();
                                $temp_data = array();
                                $i = 0;

                                while ($row = $result->fetch_assoc()) {

                                    $new[$row['parent']][] = $row;
                                    $temp_data[$i] = $row;
                                                                                
                                    // showing the data...          
                                    // echo "{$row["id"]}<br>";
                                    // echo "{$row["parent"]}</td>";
                                    // echo "{$row["userid"]}</td>";
                                    // echo "{$row["message"]}</td>";

                                    $i += 1;    
                                }

                                // Initiate result and rating
                                $result = array();
                                $ratings = array();

                                $tree = createTree($new, array($temp_data[0]));
                                // Expecto patronum
                                createCustomLinkArray($tree, array(), $connection);
                                
                                // Daftar runtutan user_id
                                // echo '<pre>' . var_export($result, true) . '</pre>';

                                // Daftar rating terkait user_id
                                // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                
                                // foreach($ratings as $row){
                            
                                

                            ?>
                            <br>
                        
                            <div class="row">
                                <div class="col-8">
                                    
                                    <div class="card border-dark">
                                        <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                        <div class="card-body">
                                            <p class="card-text">

                                                <?php

                                                    foreach($result as $row){

                                                        $iterator = 0;
                                                        foreach ($row as $value) {
                                                            
                                                            if ($iterator != count($row)-1) {
                                                                
                                                                echo getUserName($value)." => ";
                                                            
                                                            }else{
                                                        
                                                                echo getUserName($value);
                                                            }
                                                        
                                                            $iterator++;
                                                            
                                                        }
                                                        
                                                        echo "<br>";
                                                        
                                                        }

                                                ?>

                                            </p>
                                        </div>
                                    </div>

                                <!-- End of col-6 -->
                                </div>
                                <div class="col-4">
                                    
                                <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>                                        
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                        
                                            <?php

                                                $key = array_keys($ratings);
                                                                                    
                                                foreach($key as $value){

                                                    echo "<tr>";
                                                        echo "<td>".getUserName($value)."</td>";
                                                        echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                    echo "</tr>";

                                                }                                                   
                                            ?>

                                            </tr>                                                
                                        </tbody>
                                    </table>

                                <!-- End of col-6 -->
                                </div>
                            <!-- End of row -->
                            </div>

                            <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 53";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 57";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                                <?php
                                
                                    // function collaboration(){

                                    //creating connection to database            	
                                    $connection = createConnection();

                                    $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                            FROM `mdl_forum_posts` 
                                            WHERE `discussion` = 55";

                                    // access the query....
                                    $result = query($connection, $sql);

                                    $new = array();
                                    $temp_data = array();
                                    $i = 0;

                                    while ($row = $result->fetch_assoc()) {

                                        $new[$row['parent']][] = $row;
                                        $temp_data[$i] = $row;
                                                                                    
                                        // showing the data...          
                                        // echo "{$row["id"]}<br>";
                                        // echo "{$row["parent"]}</td>";
                                        // echo "{$row["userid"]}</td>";
                                        // echo "{$row["message"]}</td>";

                                        $i += 1;    
                                    }

                                    // Initiate result and rating
                                    $result = array();
                                    $ratings = array();

                                    $tree = createTree($new, array($temp_data[0]));
                                    // Expecto patronum
                                    createCustomLinkArray($tree, array(), $connection);
                                    
                                    // Daftar runtutan user_id
                                    // echo '<pre>' . var_export($result, true) . '</pre>';
 
                                    // Daftar rating terkait user_id
                                    // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                    
                                    // foreach($ratings as $row){
                                
                                    

                                ?>
                                <br>
                            
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="card border-dark">
                                            <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                            <div class="card-body">
                                                <p class="card-text">

                                                    <?php

                                                        foreach($result as $row){

                                                            $iterator = 0;
                                                            foreach ($row as $value) {
                                                                
                                                                if ($iterator != count($row)-1) {
                                                                    
                                                                    echo getUserName($value)." => ";
                                                                
                                                                }else{
                                                            
                                                                    echo getUserName($value);
                                                                }
                                                            
                                                                $iterator++;
                                                                
                                                            }
                                                            
                                                            echo "<br>";
                                                            
                                                            }

                                                    ?>

                                                </p>
                                            </div>
                                        </div>

                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-4">
                                        
                                    <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php

                                                    $key = array_keys($ratings);
                                                                                        
                                                    foreach($key as $value){

                                                        echo "<tr>";
                                                            echo "<td>".getUserName($value)."</td>";
                                                            echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                        echo "</tr>";

                                                    }                                                   
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>

                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>

                            <!-- End of kelompok-8 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-9" role="tabpanel" aria-labelledby="kelompok-9-tab">
                            
                            <?php
                                
                                // function collaboration(){

                                //creating connection to database            	
                                $connection = createConnection();

                                $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                        FROM `mdl_forum_posts` 
                                        WHERE `discussion` = 56";

                                // access the query....
                                $result = query($connection, $sql);

                                $new = array();
                                $temp_data = array();
                                $i = 0;

                                while ($row = $result->fetch_assoc()) {

                                    $new[$row['parent']][] = $row;
                                    $temp_data[$i] = $row;
                                                                                
                                    // showing the data...          
                                    // echo "{$row["id"]}<br>";
                                    // echo "{$row["parent"]}</td>";
                                    // echo "{$row["userid"]}</td>";
                                    // echo "{$row["message"]}</td>";

                                    $i += 1;    
                                }

                                // Initiate result and rating
                                $result = array();
                                $ratings = array();

                                $tree = createTree($new, array($temp_data[0]));
                                // Expecto patronum
                                createCustomLinkArray($tree, array(), $connection);
                                
                                // Daftar runtutan user_id
                                // echo '<pre>' . var_export($result, true) . '</pre>';

                                // Daftar rating terkait user_id
                                // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                
                                // foreach($ratings as $row){
                            
                                

                            ?>
                            <br>
                        
                            <div class="row">
                                <div class="col-8">
                                    
                                    <div class="card border-dark">
                                        <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                        <div class="card-body">
                                            <p class="card-text">

                                                <?php

                                                    foreach($result as $row){

                                                        $iterator = 0;
                                                        foreach ($row as $value) {
                                                            
                                                            if ($iterator != count($row)-1) {
                                                                
                                                                echo getUserName($value)." => ";
                                                            
                                                            }else{
                                                        
                                                                echo getUserName($value);
                                                            }
                                                        
                                                            $iterator++;
                                                            
                                                        }
                                                        
                                                        echo "<br>";
                                                        
                                                        }

                                                ?>

                                            </p>
                                        </div>
                                    </div>

                                <!-- End of col-6 -->
                                </div>
                                <div class="col-4">
                                    
                                <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>                                        
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                        
                                            <?php

                                                $key = array_keys($ratings);
                                                                                    
                                                foreach($key as $value){

                                                    echo "<tr>";
                                                        echo "<td>".getUserName($value)."</td>";
                                                        echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                    echo "</tr>";

                                                }                                                   
                                            ?>

                                            </tr>                                                
                                        </tbody>
                                    </table>

                                <!-- End of col-6 -->
                                </div>
                            <!-- End of row -->
                            </div>

                            <?php
                                
                                // function collaboration(){

                                //creating connection to database            	
                                $connection = createConnection();

                                $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                        FROM `mdl_forum_posts` 
                                        WHERE `discussion` = 28";

                                // access the query....
                                $result = query($connection, $sql);

                                $new = array();
                                $temp_data = array();
                                $i = 0;

                                while ($row = $result->fetch_assoc()) {

                                    $new[$row['parent']][] = $row;
                                    $temp_data[$i] = $row;
                                                                                
                                    // showing the data...          
                                    // echo "{$row["id"]}<br>";
                                    // echo "{$row["parent"]}</td>";
                                    // echo "{$row["userid"]}</td>";
                                    // echo "{$row["message"]}</td>";

                                    $i += 1;    
                                }

                                // Initiate result and rating
                                $result = array();
                                $ratings = array();

                                $tree = createTree($new, array($temp_data[0]));
                                // Expecto patronum
                                createCustomLinkArray($tree, array(), $connection);
                                
                                // Daftar runtutan user_id
                                // echo '<pre>' . var_export($result, true) . '</pre>';

                                // Daftar rating terkait user_id
                                // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                
                                // foreach($ratings as $row){
                            
                                

                            ?>
                            <br>
                        
                            <div class="row">
                                <div class="col-8">
                                    
                                    <div class="card border-dark">
                                        <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                        <div class="card-body">
                                            <p class="card-text">

                                                <?php

                                                    foreach($result as $row){

                                                        $iterator = 0;
                                                        foreach ($row as $value) {
                                                            
                                                            if ($iterator != count($row)-1) {
                                                                
                                                                echo getUserName($value)." => ";
                                                            
                                                            }else{
                                                        
                                                                echo getUserName($value);
                                                            }
                                                        
                                                            $iterator++;
                                                            
                                                        }
                                                        
                                                        echo "<br>";
                                                        
                                                        }

                                                ?>

                                            </p>
                                        </div>
                                    </div>

                                <!-- End of col-6 -->
                                </div>
                                <div class="col-4">
                                    
                                <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>                                        
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                        
                                            <?php

                                                $key = array_keys($ratings);
                                                                                    
                                                foreach($key as $value){

                                                    echo "<tr>";
                                                        echo "<td>".getUserName($value)."</td>";
                                                        echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                    echo "</tr>";

                                                }                                                   
                                            ?>

                                            </tr>                                                
                                        </tbody>
                                    </table>

                                <!-- End of col-6 -->
                                </div>
                            <!-- End of row -->
                            </div>

                            <?php
                                
                                // function collaboration(){

                                //creating connection to database            	
                                $connection = createConnection();

                                $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                        FROM `mdl_forum_posts` 
                                        WHERE `discussion` = 24";

                                // access the query....
                                $result = query($connection, $sql);

                                $new = array();
                                $temp_data = array();
                                $i = 0;

                                while ($row = $result->fetch_assoc()) {

                                    $new[$row['parent']][] = $row;
                                    $temp_data[$i] = $row;
                                                                                
                                    // showing the data...          
                                    // echo "{$row["id"]}<br>";
                                    // echo "{$row["parent"]}</td>";
                                    // echo "{$row["userid"]}</td>";
                                    // echo "{$row["message"]}</td>";

                                    $i += 1;    
                                }

                                // Initiate result and rating
                                $result = array();
                                $ratings = array();

                                $tree = createTree($new, array($temp_data[0]));
                                // Expecto patronum
                                createCustomLinkArray($tree, array(), $connection);
                                
                                // Daftar runtutan user_id
                                // echo '<pre>' . var_export($result, true) . '</pre>';

                                // Daftar rating terkait user_id
                                // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                
                                // foreach($ratings as $row){
                            
                                

                            ?>
                            <br>
                        
                            <div class="row">
                                <div class="col-8">
                                    
                                    <div class="card border-dark">
                                        <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                        <div class="card-body">
                                            <p class="card-text">

                                                <?php

                                                    foreach($result as $row){

                                                        $iterator = 0;
                                                        foreach ($row as $value) {
                                                            
                                                            if ($iterator != count($row)-1) {
                                                                
                                                                echo getUserName($value)." => ";
                                                            
                                                            }else{
                                                        
                                                                echo getUserName($value);
                                                            }
                                                        
                                                            $iterator++;
                                                            
                                                        }
                                                        
                                                        echo "<br>";
                                                        
                                                        }

                                                ?>

                                            </p>
                                        </div>
                                    </div>

                                <!-- End of col-6 -->
                                </div>
                                <div class="col-4">
                                    
                                <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>                                        
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                        
                                            <?php

                                                $key = array_keys($ratings);
                                                                                    
                                                foreach($key as $value){

                                                    echo "<tr>";
                                                        echo "<td>".getUserName($value)."</td>";
                                                        echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                    echo "</tr>";

                                                }                                                   
                                            ?>

                                            </tr>                                                
                                        </tbody>
                                    </table>

                                <!-- End of col-6 -->
                                </div>
                            <!-- End of row -->
                            </div>

                            <?php
                                
                                // function collaboration(){

                                //creating connection to database            	
                                $connection = createConnection();

                                $sql = "SELECT `id`,`parent`,`userid`,`message` 
                                        FROM `mdl_forum_posts` 
                                        WHERE `discussion` = 33";

                                // access the query....
                                $result = query($connection, $sql);

                                $new = array();
                                $temp_data = array();
                                $i = 0;

                                while ($row = $result->fetch_assoc()) {

                                    $new[$row['parent']][] = $row;
                                    $temp_data[$i] = $row;
                                                                                
                                    // showing the data...          
                                    // echo "{$row["id"]}<br>";
                                    // echo "{$row["parent"]}</td>";
                                    // echo "{$row["userid"]}</td>";
                                    // echo "{$row["message"]}</td>";

                                    $i += 1;    
                                }

                                // Initiate result and rating
                                $result = array();
                                $ratings = array();

                                $tree = createTree($new, array($temp_data[0]));
                                // Expecto patronum
                                createCustomLinkArray($tree, array(), $connection);
                                
                                // Daftar runtutan user_id
                                // echo '<pre>' . var_export($result, true) . '</pre>';

                                // Daftar rating terkait user_id
                                // echo '<pre>' . var_export($ratings, true) . '</pre>';
                                
                                // foreach($ratings as $row){
                            
                                

                            ?>
                            <br>
                        
                            <div class="row">
                                <div class="col-8">
                                    
                                    <div class="card border-dark">
                                        <div class="card-header bg-dark mb-3 text-white text-center"><h4>Kolaborasi</h4></div>
                                        <div class="card-body">
                                            <p class="card-text">

                                                <?php

                                                    foreach($result as $row){

                                                        $iterator = 0;
                                                        foreach ($row as $value) {
                                                            
                                                            if ($iterator != count($row)-1) {
                                                                
                                                                echo getUserName($value)." => ";
                                                            
                                                            }else{
                                                        
                                                                echo getUserName($value);
                                                            }
                                                        
                                                            $iterator++;
                                                            
                                                        }
                                                        
                                                        echo "<br>";
                                                        
                                                        }

                                                ?>

                                            </p>
                                        </div>
                                    </div>

                                <!-- End of col-6 -->
                                </div>
                                <div class="col-4">
                                    
                                <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>                                        
                                                <th scope="col" class="text-center">Nama</th>
                                                <th scope="col" class="text-center">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                        
                                            <?php

                                                $key = array_keys($ratings);
                                                                                    
                                                foreach($key as $value){

                                                    echo "<tr>";
                                                        echo "<td>".getUserName($value)."</td>";
                                                        echo "<td class='text-center'>{$ratings[$value]}</td>";
                                                    echo "</tr>";

                                                }                                                   
                                            ?>

                                            </tr>                                                
                                        </tbody>
                                    </table>

                                <!-- End of col-6 -->
                                </div>
                            <!-- End of row -->
                            </div>
                                
                            </div>
                            <!-- End of kelompok-9 -->
                            </div>
                        <!-- End of tab-content -->
                        </div>                    
                    <!-- End of card-body -->
                    </div>
                <!-- End of card -->
                </div>
            <!-- End of col-6 -->
            </div>
                   
        <!-- End of Row -->
        </div>
    <!-- End of Container -->
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>