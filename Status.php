<html>

<a href=Utama.php>Utama</a>
<a href=Status.php>Status</a>
<a href=#>Linked List</a>
<a href=Laporan.php>Laporan</a>
<br></br>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  /* height: 300px; */
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  /* height: 300px; */
}
</style>
</head>
<body>



<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Kelompok1')" id="defaultOpen">Kelompok 1</button>
  <button class="tablinks" onclick="openCity(event, 'Kelompok2')">Kelompok 2</button>
  <button class="tablinks" onclick="openCity(event, 'Kelompok3')">Kelompok 3</button>
  <button class="tablinks" onclick="openCity(event, 'Kelompok4')">Kelompok 4</button>
  <button class="tablinks" onclick="openCity(event, 'Kelompok5')">Kelompok 5</button>
  <button class="tablinks" onclick="openCity(event, 'Kelompok6')">Kelompok 6</button>
  <button class="tablinks" onclick="openCity(event, 'Kelompok7')">Kelompok 7</button>
  <button class="tablinks" onclick="openCity(event, 'Kelompok8')">Kelompok 8</button>
  <button class="tablinks" onclick="openCity(event, 'Kelompok9')">Kelompok 9</button>
</div>


<!-- ======================================================================= -->
<!-- ======================================================================= -->
<div id="Kelompok1" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 52";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 1 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 32";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 2 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 51";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 3 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 36";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 4 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>
<br></br>
</div>
<!-- ======================================================================= -->
<!-- ======================================================================= -->

<!-- ======================================================================= -->
<!-- ======================================================================= -->
<div id="Kelompok2" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 54";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 1 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 34";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 2 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 30";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 3 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 29";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 4 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>
<br></br>
</div>
<!-- ======================================================================= -->
<!-- ======================================================================= -->

<!-- ======================================================================= -->
<!-- ======================================================================= -->
<div id="Kelompok3" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 23";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 1 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 50";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 2 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 38";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 3 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 44";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 4 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>
<br></br>
</div>
<!-- ======================================================================= -->
<!-- ======================================================================= -->

<!-- ======================================================================= -->
<!-- ======================================================================= -->
<div id="Kelompok4" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 31";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 1 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 39";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 2 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 26";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 3 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 37";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 4 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>
<br></br>
</div>
<!-- ======================================================================= -->
<!-- ======================================================================= -->

<!-- ======================================================================= -->
<!-- ======================================================================= -->
<div id="Kelompok5" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 25";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 1 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 22";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 2 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 20";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 3 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 21";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 4 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>
<br></br>
</div>
<!-- ======================================================================= -->
<!-- ======================================================================= -->

<!-- ======================================================================= -->
<!-- ======================================================================= -->
<div id="Kelompok6" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 27";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 1 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 42";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 2 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 41";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 3 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 46";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 4 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>
<br></br>
</div>
<!-- ======================================================================= -->
<!-- ======================================================================= -->

<!-- ======================================================================= -->
<!-- ======================================================================= -->
<div id="Kelompok7" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 40";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 1 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 35";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 2 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 48";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 3 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 45";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 4 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>
<br></br>
</div>
<!-- ======================================================================= -->
<!-- ======================================================================= -->

<!-- ======================================================================= -->
<!-- ======================================================================= -->
<div id="Kelompok8" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 49";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 1 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 53";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 2 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 57";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 3 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 55";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 4 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>
<br></br>
</div>
<!-- ======================================================================= -->
<!-- ======================================================================= -->

<!-- ======================================================================= -->
<!-- ======================================================================= -->
<div id="Kelompok9" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 56";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 1 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 28";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 2 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 24";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 3 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 33";
	$query=mysqli_query($connection, $sql);
	$result=mysqli_fetch_array($query);

	$counter=0;
	$data=array();
    //memasukan setiap baris tabel dengan id, parent, userid ke dalam array
	while($result){
	    $data[$counter]=array(
	        'id'=>$result['id'],
	        'parent'=>$result['parent'],
	        'userid'=>$result['userid']
	   );
        $counter++;
        $result=mysqli_fetch_array($query);
    }
    
    echo "Topik 4 </br>";
    //melakukan pengecekan 1 id dengan semua parent untuk dihitung
    for($i=0; $i<count($data); $i++){
        $status=0;
        $status_userid=0;
        for($j=0; $j<count($data); $j++){
            if($data[$i]['id']==$data[$j]['parent']){
                $status++;
            }
        }
        echo "Id message " . $data[$i]['id'] . " dibalas " . $status . " kali </br>";
    }
    echo "</br>";
    
    //set array untuk data userId
    $userId=array();
    //melakukan pengecekan sebanyak baris tabel
    for($i=0; $i<count($data); $i++){
        //menset status userId jadi 0 lagi
        $status_userid=0;
        //jika userId nya sudah ada maka akan diinisalisasikan true
        if (array_key_exists($data[$i]['userid'], $userId)){
                //echo $data[$i]['userid']."True<br/>";
        //jika userId nya belum ada, maka akan dimasukan ke dalam array userId
        }else{
            //melakukan pengecekan sebanyak baris tabel
            //setiap 1 user id akan dicek ke semua user untuk menghitung jumlah usernya dari keseluruhan
            for($j=0; $j<count($data); $j++){
                if($data[$i]['userid']==$data[$j]['userid']){
                    //setiap user id yang sedang dicek menemukan user id yang sama pada keseluruhan maka status jumlah bertambah
                    $status_userid++;
                }
            }
            //proses memasukan jumlah user id dari user id itu sendiri
            $userId[$data[$i]['userid']]=$status_userid;
        }
        //echo "User id " . $data[$i]['userid'] . " mengirim " . $userId[$data[$i]['userid']] . " kali</br>";
    }
    echo "</br>";
    //print hasil berapa banyak user id dari setiap user id
    
    echo "<pre>";
    print_r($userId);
    echo "</pre>";
?>
<br></br>
</div>
<!-- ======================================================================= -->
<!-- ======================================================================= -->



<script>
function openCity(evt, NamaKelompok) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(NamaKelompok).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</body>
</html>