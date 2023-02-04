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
echo $comanda = $_POST['comanda_id'];
$tsql = "select Id_Comanda,Titlu,Nume,Prenume,An,Categorie
from Carti C,Categorii CAT,Carte_Autori_Categorii CA,Autori A,Comanda_Carti CC
where 
        CC.Id_Comanda = '$comanda' and 
        CC.Id_Carte = C.Id_Carte      and   
        C.Id_Carte = CA.Id_Carte and
       CA.Id_Categorie = CAT.Id_Categorie	and
       CA.Id_Autor = A.Id_Autor";
$stmt = sqlsrv_query($conn,$tsql);
if($stmt == false){
    echo "error";

}
    echo "
<table class='table'>
<tr>
<th>Id_Comanda</th>
<th>Titlu</th>
<th>Nume</th>
<th>Prenume</th>
<th>An</th>
<th>Categorie</th>

";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
        echo '<tr class="table-row">';
        echo "<td>" . $row['Id_Comanda'] . "</td>";
        echo "<td>" . $row['Titlu'] . "</td>";

        echo "<td>" . $row['Nume'] . "</td>";

        echo "<td>" . $row['Prenume'] . "</td>";

        echo "<td>" . $row['An'] . "</td>";
        echo "<td>" . $row['Categorie'] . "</td>";
        echo "</tr>";
}
    echo "</table>";
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

 ?>