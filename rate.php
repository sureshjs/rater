<?php
if (!isset($talentScore, $presenceScore, $presentationScore, $energyScore, $funScore)) {
	$talentScore = $_POST['talent'];
	$presenceScore = $_POST['presence'];
	$presentationScore = $_POST['presentation'];
	$energyScore = $_POST['energy'];
	$funScore = $_POST['fun'];
	echo "talent:$talentScore ";
	echo "presence:$presenceScore ";
	echo "presentaion:$presentationScore ";
	echo "energy:$energyScore ";
	echo "fun:$funScore ";
}

$con = mysql_connect("localhost","root","mysql");
if (!$con) {
	die ('die bitch! ' . mysql_error());
}

mysql_select_db("symfony", $con);

$sql="INSERT INTO Userperformance (user, performance, talent, presence, presentation, energy, fun)
		VALUES (1, 7, '$talentScore', '$presenceScore', '$presentationScore', '$energyScore', '$funScore')";

if (!mysql_query($sql,$con)) {
	die ('FAIL' . mysql_error());
}
echo "got rated!";

mysql_close($con);
	
?>