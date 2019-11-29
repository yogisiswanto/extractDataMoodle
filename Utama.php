<html>
    
<a href=Utama.php>Utama</a>
<a href=Status.php>Status</a>
<a href=#>Linked List</a>
<a href=Laporan.php>Laporan</a>


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



<h2>Pertanyaan</h2>
<p> 1. Jelaskan perbedaan antara SSD dengan HDD!</br>
    2. Jelaskan perbedaan antara USB 2.0 dengan USB 3.0!</br>
    3. Apa yang menyebabkan processor Intel i7 jauh lebih baik dibandingkan processor Intel i5?</br>
    4. Apa yang harus dilakukan jika terjadi overheat pada sebuah perangkat PC?</br>
</p>

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

<div id="Kelompok1" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 52";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	
	$new = array();
    $temp_data = array();
    $i = 0;
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	//echo "<tr><td style='text-align:center' colspan='4'><b>Kelompok 1</b></td></tr>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 1</b></td></tr>";
	
	while($data){
        $new[$data['parent']][] = $data;
        $temp_data[$i]=$data;
        echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
        echo "<td style='text-align:center' width=50>$data[id]</td>";
        echo "<td style='text-align:center' width=50>$data[userid]</td>";
        echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
        $data=mysqli_fetch_array($query);
        $i += 1;
	}
	
	// Initiate result and rating
	$result = array();
    $ratings = array();
    
	// Create tree
	function createTree(&$list, $parent){
        $tree = array();
        foreach ($parent as $k=>$l){
            if(isset($list[$l['id']])){
                $l['children'] = createTree($list, $list[$l['id']]);
            }
            $tree[] = $l;
        } 
        return $tree;
    }
    
    // Count rating from branch
    function countRating($branch, $connection){
        global $ratings;
        
        // Get parent
        $sql="SELECT * FROM `mdl_forum_posts` WHERE `id` =" . $branch['parent'] . "";
    	$query=mysqli_query($connection, $sql);
    	$data=mysqli_fetch_assoc($query);
    	
        $rating = 0;
        if ($data['userid']){
            if (strpos($branch['message'], "<p>*") !== false){
                $index = 3;
                while ($branch['message'][$index] === "*"){
                    $rating += 1;
                    $index += 1;
                }
            }
            
            if (array_key_exists($data['userid'], $ratings)){
                $ratings[$data['userid']] += $rating;
            }else{
                $ratings[$data['userid']] = $rating;
            }
        }
    }
    
    // This is where magic happens
    function createCustomLinkArray($tree, $userTemp, $connection){
        global $result, $ratings;
        
        foreach($tree as $index=>$branch){
            if (isset($tree[$index]["children"])){
                // Push result and rating
                array_push($userTemp, $tree[$index]['userid']);
                countRating($tree[$index], $connection);
                
                // Recursion
                createCustomLinkArray($tree[$index]["children"], $userTemp, $connection);
            }else{
                // Push result and rating
                array_push($userTemp, $tree[$index]['userid']);
                countRating($tree[$index], $connection);
                
                // Push result to global variable
                array_push($result, $userTemp);
                
                // foreach($userTemp as $post){
                //     $sql="SELECT `firstname`, `lastname` FROM `mdl_user` WHERE `id` =" . $post['userid'] . "";
    
                // 	$query=mysqli_query($connection, $sql);
                // 	$data=mysqli_fetch_assoc($query);
                // 	print_r($data);
                // }
            }
            
            // Pop temp result
            array_pop($userTemp);
        }
    }
	
	// Expecto patronum
	createCustomLinkArray(createTree($new, array($temp_data[0])), array(), $connection);
	
	// Daftar runtutan user_id
	echo '<pre>' . var_export($result, true) . '</pre>';
	
	echo "<br/>";
	echo "<br/>";
	
	// Daftar rating terkait user_id
	echo '<pre>' . var_export($ratings, true) . '</pre>';
	
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 32";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 2</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 51";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 3</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 36";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 4</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>
<br></br>
</div>

<div id="Kelompok2" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 54";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	//echo "<tr><td style='text-align:center' colspan='4'><b>Kelompok 2</b></td></tr>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 1</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 34";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 2</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 30";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 3</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 29";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 4</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>
<br></br>
</div>

<div id="Kelompok3" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 23";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	//echo "<tr><td style='text-align:center' colspan='4'><b>Kelompok 3</b></td></tr>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 1</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 50";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 2</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 38";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 3</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 44";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 4</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>
<br></br>
</div>

<div id="Kelompok4" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 31";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	//echo "<tr><td style='text-align:center' colspan='4'><b>Kelompok 4</b></td></tr>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 1</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 39";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 2</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 26";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 3</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 37";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 4</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>
<br></br>
</div>

<div id="Kelompok5" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 25";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	//echo "<tr><td style='text-align:center' colspan='4'><b>Kelompok 5</b></td></tr>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 1</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 22";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 2</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 20";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 3</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 21";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 4</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>
<br></br>
</div>

<div id="Kelompok6" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 27";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	//echo "<tr><td style='text-align:center' colspan='4'><b>Kelompok 6</b></td></tr>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 1</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 42";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 2</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 41";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 3</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 46";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 4</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>
<br></br>
</div>

<div id="Kelompok7" class="tabcontent">
<br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 40";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	//echo "<tr><td style='text-align:center' colspan='4'><b>Kelompok 7</b></td></tr>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 1</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 35";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 2</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 48";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 3</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 45";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 4</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>
<br></br>
</div>

<div id="Kelompok8" class="tabcontent">
    <br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 49";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	//echo "<tr><td style='text-align:center' colspan='4'><b>Kelompok 8</b></td></tr>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 1</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 53";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 2</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 57";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 3</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 55";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 4</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>
<br></br>
</div>

<div id="Kelompok9" class="tabcontent">
    <br></br>
<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 56";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	//echo "<tr><td style='text-align:center' colspan='4'><b>Kelompok 9</b></td></tr>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 1</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
    ?>
    
<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 28";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 2</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 24";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 3</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>

<html>
	<br></br>
</html>

<?php
	$connection=mysqli_connect('localhost', 'harmonia_haris', 'Suikoden108SoD');
	$database=mysqli_select_db($connection, 'harmonia_moodle');
	$sql="SELECT `id`,`parent`,`userid`,`message` FROM `mdl_forum_posts` WHERE `discussion` = 33";

	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	echo "<tr><td style='text-align:center' width=50><b>Reference ID</b></td>";
	echo "<td style='text-align:center' width=50><b>Order ID</b></td>";
	echo "<td style='text-align:center' width=50><b>User ID</b></td>";
	echo "<td style='text-align:center' width=400><b>Diskusi Jawaban 4</b></td></tr>";
	while($data){	
		echo "<tr><td style='text-align:center' width=50>$data[parent]</td>";
		echo "<td style='text-align:center' width=50>$data[id]</td>";
		echo "<td style='text-align:center' width=50>$data[userid]</td>";
		echo "<td style='text-align:left' width=400>$data[message]</td></tr>";
		$data=mysqli_fetch_array($query);
	}
	echo "</table>";
?>
<br></br>
</div>



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
