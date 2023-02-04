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
echo $an = $_POST['an'];
$tsql = "
Select C.Id_Carte,Titlu,Cantitate,Data
from
Carti C,Comanda_Carti CC,Comenzi 
where year(Comenzi.Data) > '$an'
and C.Id_Carte = CC.Id_Carte and
CC.Id_Comanda = Comenzi.Id_Comanda
";
$stmt = sqlsrv_query($conn,$tsql);
if($stmt == false){
    echo "error";

}
    echo "
<table class='table'>
<tr>
<th>ID_CARTE</th>
<th>Titlu</th>
<th>Cantitate</th>
<th>Data</th>


";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
        echo '<tr class="table-row">';
        echo "<td>" . $row['Id_Carte'] . "</td>";

        echo "<td>" . $row['Titlu'] . "</td>";

        echo "<td>" . $row['Cantitate'] . "</td>";

        echo "<td>" . $row['Data']->format("y-m-d") . "</td>";

        echo "</tr>";
}
    echo "</table>";
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

 ?>