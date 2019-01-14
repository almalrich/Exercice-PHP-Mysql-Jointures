<?php
/**
 * Created by PhpStorm.
 * User: sstienface
 * Date: 04/12/2018
 * Time: 11:25
 */

// Premiere ligne

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classe";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error){

    die("Connection failed: " . $conn->connect_error);
}
else
{
// Selectionner la base à utiliser
    $conn->select_db($dbname);

}




$sql = "SELECT * FROM eleves, eleves_informations where eleves_informations.eleves_id = eleves.id ";
$result = $conn-> query ($sql);
while($row = $result->fetch_assoc())
{ echo $row['prenom']." ". $row['nom']." ".$row['avatar']." ".$row['age']." ".$row{'ville'}."<br>";

}


function name ()
{
    global $conn;
    global $comp;
    $sql = "SELECT * FROM competences, eleves_competences where eleves_competences.eleves_id = 1 and eleves_competences.competence_id = competences.id ";

    $comp = "";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $niveau = $row['niveau'];

        if ($comp != '') {

            $comp .= ",";

        }

        $comp .= $niveau;


    }
    echo $comp;

}
name();


?>



<!DOCTYPE html>
<html>
<head>
    <script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
    <script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];</script>

    <link rel="stylesheet" href="index.css">
</head>
<body>

<input type="hidden" id="test" value="<?= $comp?>">
<input type="hidden" id="test1" value="<?= $comp ?>">
<input type="hidden" id="test2" value="<?= $comp ?>">
<input type="hidden" id="test3" value="<?= $comp ?>">







<div id='myChart'><a class="zc-ref" href="https://www.zingchart.com/">graphique radar</a></div>

<script src="index.js"></script>
</body>
</html>







