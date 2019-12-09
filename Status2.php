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
                        <a class="nav-link" href="#" style="font-size:1.2rem">Kolaborasi<span class="sr-only">(current)</span></a>
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
                            
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Sent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                            
                                                <?php
                                                    //getting data from database...
                                                    $result = sent(46);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Sent"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Replied</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    //getting data from database...
                                                    $result = replied(46);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Replied"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>
                            <!-- End of kelompok-1 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-2" role="tabpanel" aria-labelledby="kelompok-2-tab">

                                <div class="row">
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Sent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php
                                                    //getting data from database...
                                                    $result = sent(47);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Sent"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Replied</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    //getting data from database...
                                                    $result = replied(47);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Replied"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>                            
                            <!-- End of kelompok-2 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-3" role="tabpanel" aria-labelledby="kelompok-3-tab">
                            
                                 <div class="row">
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Sent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php
                                                    //getting data from database...
                                                    $result = sent(48);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Sent"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Replied</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    //getting data from database...
                                                    $result = replied(48);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Replied"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>
                            <!-- End of kelompok-3 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-4" role="tabpanel" aria-labelledby="kelompok-4-tab">
                            
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Sent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php
                                                    //getting data from database...
                                                    $result = sent(49);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Sent"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Replied</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    //getting data from database...
                                                    $result = replied(49);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Replied"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>
                            <!-- End of kelompok-4 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-5" role="tabpanel" aria-labelledby="kelompok-5-tab">
                            
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Sent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                <?php
                                                    //getting data from database...
                                                    $result = sent(50);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Sent"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Replied</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    //getting data from database...
                                                    $result = replied(50);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Replied"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>
                            <!-- End of kelompok-5 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-6" role="tabpanel" aria-labelledby="kelompok-6-tab">
                            
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Sent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php
                                                    //getting data from database...
                                                    $result = sent(51);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Sent"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Replied</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    //getting data from database...
                                                    $result = replied(51);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Replied"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>
                            <!-- End of kelompok-6 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-7" role="tabpanel" aria-labelledby="kelompok-7-tab">

                                <div class="row">
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Sent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php
                                                    //getting data from database...
                                                    $result = sent(52);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Sent"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Replied</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    //getting data from database...
                                                    $result = replied(52);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Replied"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>
                            <!-- End of kelompok-7 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-8" role="tabpanel" aria-labelledby="kelompok-8-tab">
                            
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Sent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php
                                                    //getting data from database...
                                                    $result = sent(53);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Sent"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Replied</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    //getting data from database...
                                                    $result = replied(53);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Replied"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
                                </div>
                            <!-- End of kelompok-8 -->
                            </div>

                            <div class="tab-pane fade" id="kelompok-9" role="tabpanel" aria-labelledby="kelompok-9-tab">
                            
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Sent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php
                                                    //getting data from database...
                                                    $result = sent(54);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Sent"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                    <div class="col-6">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>                                        
                                                    <th scope="col" class="text-center">Rank</th>
                                                    <th scope="col" class="text-center">User ID</th>
                                                    <th scope="col" class="text-center">Jumlah Replied</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    //getting data from database...
                                                    $result = replied(54);

                                                    // iterator
                                                    $numbering = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        
                                                        // showing the data...
                                                        echo "<tr>";
                                                            echo "<td class='text-center'>{$numbering}</td>";
                                                            echo "<td class='text-center'>{$row["UserID"]}</td>";
                                                            echo "<td class='text-center'>{$row["Replied"]}</td>";
                                                        echo "</tr>";

                                                        // iterate numbering
                                                        $numbering++;
                                                    }  
                                                ?>

                                            </tbody>
                                        </table>
                                    <!-- End of col-6 -->
                                    </div>
                                <!-- End of row -->
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