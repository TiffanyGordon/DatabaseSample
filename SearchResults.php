<html>
<head>
<link type="text/css" rel="stylesheet" href="librarypages.css" link>
<title>Search Results</Title>
</head>

<header>
	<form id="homelink" action="ExerciseLibrary.html">
		<input id="home" type="submit" value="HOME">
	</form>
	<h1>    Exercise Library    </h1>
	<form id="faqlink" action="FAQs.html">
		<input id="faq" type="submit" value="FAQs">
	</form>
	<form id="storelink" action="Store.html">
		<input id="store" type="submit" value="Store">
	</form>
</header>

<nav>
	<form id="browse" method="get" action="browse.php">
		<button name="MGroup" class="button" type="submit" value="Chest">Chest Exercises</button><br>
		<button name="MGroup" class="button" type="submit" value="Back">Back Exercises</button><br>
		<button name="MGroup" class="button" type="submit" value="Shoulders">Shoulder Exercises</button><br>
		<button name="MGroup" class="button" type="submit" value="Arms">Arm Exercises</button><br>
		<button name="MGroup" class="button" type="submit" value="Legs">Leg Exercises</button><br>
		<button name="MGroup" class="button" type="submit" value="Many">Total Body Exercises</button><br>
	</form>
</nav>

<section>
	<form method="get" action="SearchResults.php">
		Search for an exercise:
		<input type="text" name="entry">
		<input type="submit" class="submit" value="SUBMIT">
	</form>
</section>

<body>
<div>
<h2>Search Results</h2>

<?php
$searchterm=filter_input(INPUT_GET, "entry");

$conn = new COM("ADODB.Connection") or die("Connection not established.");
$connString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=e:\\ectserver\\agordo18\\Database\\ExerciseLibraryDB.mdb";
$conn->Open($connString);

$rs=$conn->Execute("SELECT ExerciseID, ExerciseName FROM id1812867_ExerciseLibrary WHERE ExerciseName LIKE '%".$searchterm."%'");

while (!$rs->EOF) {
	$ExerciseName=$rs->Fields("ExerciseName");
	$ExerciseID=$rs->Fields("ExerciseID");
	print "<a href='ExerciseDetails.php?ExerciseID=$ExerciseID'>";
	print "$ExerciseName</a><br>";
	$rs->MoveNext();
	}

$rs->Close;

?>

</div>
</body>

<footer>
	<h4>This website was designed for educational purposes.  This is not a commercial website.</h4>
</footer>
</html>