<html>
<head>
<link type="text/css" rel="stylesheet" href="librarypages.css" link>
<title>Exercise Detail Page</Title>
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
	<br>
</section>

<body>
<div>
<?php
$RegID=filter_input(INPUT_GET, "ExerciseID");

$conn = new COM("ADODB.Connection") or die("Connection not established.");
$connString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=e:\\ectserver\\agordo18\\Database\\ExerciseLibraryDB.mdb";
$conn->Open($connString);

$selectCommand="SELECT JointUse, BodyPart, Function, ExerciseName, Agonist, Difficulty, PhotoHL, PhotoCred  FROM id1812867_ExerciseLibrary WHERE ExerciseID=$RegID;";

$rs=$conn->Execute($selectCommand);

if (!$rs->EOF) {
	$JointUse=$rs->Fields("JointUse");
	$BodyPart=$rs->Fields("BodyPart");
	$Function=$rs->Fields("Function");
	$ExName=$rs->Fields("ExerciseName");
	$Agonist=$rs->Fields("Agonist");
	$Difficulty=$rs->Fields("Difficulty");
	$PhotoHL=$rs->Fields("PhotoHL");
	$Credit=$rs->Fields("PhotoCred");
	}
	
print "<h3>$ExName</h3><br>";
echo "<img src=$PhotoHL height=250 width=250>";
print "<h6>Photo courtesy of $Credit</h6>";
print "Type of Exercise: $Function<br>";
print "Level of Difficulty: $Difficulty<br>";
print "Main Body Part Used: $BodyPart<br>";
print "Most Engaged Muscle: $Agonist<br>";
print "Single-joint/Multi-joint/Total-Body: $JointUse<br><br>";

$rs->Close;

?>
</div>
</body>

<footer>
	<h4>This website was designed for educational purposes.  This is not a commercial website.</h4>
</footer>

</html>
