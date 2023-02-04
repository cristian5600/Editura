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

$tsql = "/*reprezentantul cu numar maxim de comenzi*/
select C.Id_Reprezentant,C.nr from(
select Id_Reprezentant,Count(*) nr from
Comenzi
group by Id_Reprezentant) C 
where(C.nr = (select max(B.nr) 
from (
select Id_Reprezentant,Count(*) nr from
Comenzi
group by Id_Reprezentant) B))

";
$stmt = sqlsrv_query($conn,$tsql);
if($stmt == false){
    echo "error";

}
    echo "
<table class='table'>
<tr>
<th>ID</th>
<th>Nr</th>



";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
        echo '<tr class="table-row">';
        echo "<td>" . $row['Id_Reprezentant'] . "</td>";
        echo "<td>" . $row['nr'] . "</td>";

        echo "</tr>";
}
    echo "</table>";
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

 ?>