
<!DOCTYPE html>
<html>
<head>

    <!-- Meta section !-->
    <title> Volmarg Reiso</title>

    <!-- Additional External Styles !-->    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <!-- Styles section !-->
    <link rel="stylesheet" href="css/global.css" type="text/css">

    <!-- Additional External Scripts !-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>

    <!-- My scripts section !-->
  <script src="js/ajax.js"></script>
  <script src="js/interface.js"></script>

    <!-- External Data section !-->

</head>
<body ng-app="directivesApp">
<header class="upperPart">

</header>

<header class="buttonsSection">
	<button onclick="refreshDatabaseInfo()">Wyświetl</button>

	<div class="filterMenu showMenu" style="width:600px;" id="menu-autor">
		<ul>
			<li class="filterMenuButton" onclick='showGroup(this)'>0-9</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>[/,</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>a</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>b</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>c</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>d</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>e</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>f</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>g</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>h</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>i</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>j</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>k</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>l</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>m</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>n</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>o</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>q</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>p</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>r</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>s</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>t</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>u</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>v</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>w</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>x</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>y</li>
			<li class="filterMenuButton" onclick='showGroup(this)'>z</li>
		</ul>
	</div>

		<div class="filterMenu" style="width:600px;" id="menu-folder">
			<ul>
				<?php
					@include_once('scripts/printStructureMenu.php');
					printFoldersMenu::buildMenu();
				?>
			</ul>
		</div>

	<button onclick="scanDatabase()">Przeskanuj</button>
</header>

<header class="buttonsSection">

<ul >
  <li class="buttonFilter" ><input type="radio" value="autor" name="sortType" checked="true" onclick="filterSwap(this)" data-structure-connection="menu-autor" data-opposite-connection="menu-folder"/><span>Autor</span></li>
  <li class="buttonFilter"><input  type="radio" value="folder" name="sortType" onclick="filterSwap(this)" data-structure-connection="menu-folder" data-opposite-connection="menu-autor"/><span>Struktura</span></li>  <!-- to jeszcze nie dziala dobrze !-->
</ul>

</header>

	<div class="allAlbums">
		<?php 	

		
		?>

	</div>
	
    <!-- My scripts section !-->
	<script src="js/showListing.js"></script>
	<script src="js/directives.js"></script>

</body>
</html>