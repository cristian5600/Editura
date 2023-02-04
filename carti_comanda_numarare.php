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
 

#Nume = '$Autor' 
echo $nr = $_POST['numar_comenzi'];
$tsql = "select C.Titlu,CC.numar from Carti C,(select Id_Carte,count(*) numar
from Comanda_Carti
group by Id_Carte) CC
where	
C.Id_Carte = CC.Id_Carte and
CC.numar > '$nr'
";
$stmt = sqlsrv_query($conn,$tsql);
if($stmt == false){
    echo "error";

}
    echo "
<table class='table'>
<tr>
<th>Titlu</th>
<th>Comanzi</th>




";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
        echo '<tr class="table-row">';
       

        echo "<td>" . $row['Titlu'] . "</td>";

        echo "<td>" . $row['numar'] . "</td>";


      
        echo "</tr>";
}
    echo "</table>";
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

 ?>