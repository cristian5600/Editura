<?php ?><style><?php include 'main.css'; ?></style>
<?php



$serverName = "DESKTOP-R85N9OG\SQLEXPRESS";
$database = "Editura";
$uid = "Cristi";
$pass = "shadow200";
$connection =[
    "Database" => $database,
    "Uid" => $uid,
    "PWD" => $pass
];
$connectioninfo = array("Database"=>"Editura");
sqlsrv_configure('WarningsReturnAsErrors', 0);
$conn = sqlsrv_connect($serverName,$connectioninfo);

if(!$conn)
die(print_r(sqlsrv_errors(),true));
else 
echo 'Toate cartile';
#Nume = '$Autor' 
echo $nume = $_POST['nume_reprezentant'];
$tsql = "select C.Id_Comanda,R.Nume,R.Prenume,C.Id_Scoala
from Comenzi C,Reprezentanti R
where R.Nume = '$nume' and
C.Id_Reprezentant = R.Id_Reprezentant

";
$stmt = sqlsrv_query($conn,$tsql);
if($stmt == false){
    echo "error";

}
    echo "
<table class='table'>
<tr>
<th>Id_Comanda</th>
<th>Nume</th>
<th>Prenume</th>
<th>Id_Scoala</th>




";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
        echo '<tr class="table-row">';
       

        echo "<td>" . $row['Id_Comanda'] . "</td>";

        echo "<td>" . $row['Nume'] . "</td>";
        echo "<td>" . $row['Prenume'] . "</td>";
        echo "<td>" . $row['Id_Scoala'] . "</td>";

      
        echo "</tr>";
}
    echo "</table>";
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

 ?>