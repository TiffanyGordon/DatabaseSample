<html>
<head>
<link type="text/css" rel="stylesheet" href="librarypages.css" link>
<title>Form Submission Confirmation</Title>
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
<h2>Store</h2>
<p><h1>Your information has been submitted successfully!</h1></p>
<?php
$Fullname=$_POST["fullname"];
$Email=$_POST["email"];
$Phone=$_POST["phone"];
$Age=$_POST["age"];
$Gender=$_POST["gender"];
$Contact=$_POST["contact"];

$conn = new COM("ADODB.Connection") or die("Connection not established.");
$connString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=e:\\ectserver\\agordo18\\Database\\ExerciseLibraryDB.mdb";
$conn->Open($connString);

$rs=$conn->Execute("SELECT InquiryID FROM id1812867_ContactInquiries ORDER BY InquiryID DESC");
$ID=$rs->Fields("InquiryID")+1;

$insertCommand="INSERT INTO id1812867_ContactInquiries (InquiryID, Fullname, Email, Phone, Age, Gender, ContactMethod) VALUES ($ID, '$Fullname', '$Email', '$Phone', $Age, '$Gender', '$Contact');";

$rs=$conn->Execute($insertCommand);
?>


</div>
</body>

<footer>
	<h4>This website was designed for educational purposes.  This is not a commercial website.</h4>
</footer>

</html>
