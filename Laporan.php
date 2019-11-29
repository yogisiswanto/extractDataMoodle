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
	$sql="SELECT * FROM `mdl_forum_posts` WHERE `discussion` = 52 AND `parent` = 81 ORDER BY `discussion` ASC";
	$query=mysqli_query($connection, $sql);
	$data=mysqli_fetch_array($query);
	echo "<table border='1' cellspacing='0' cellpadding='2'>";
	//echo "<tr><td style='text-align:center' colspan='4'><b>Kelompok 1</b></td></tr>";
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
<br></br>
</div>
<!-- ======================================================================= -->
<!-- ======================================================================= -->

</body>  
</html>