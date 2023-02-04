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
echo $titlu = $_POST['Titlu'];
if(!$conn)
die(print_r(sqlsrv_errors(),true));
else 
echo 'Toate cartile';
//where C.Titlu='$titlu'
$tsql = "select Titlu,Nr_Pagini,An,Stoc
from Carti 
where Titlu='$titlu';
;
       ";
$stmt = sqlsrv_query($conn,$tsql);
if($stmt == false){
    echo "error";

}
    echo "
<table class='table'>
<tr>
<th>Titlu</th>
<th>Nr_Pagini</th>
<th>An</th>
<th>Stoc</th>


";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
        echo '<tr class="table-row">';
        echo "<td>" . $row['Titlu'] . "</td>";
        echo "<td>" . $row['Nr_Pagini'] . "</td>";
        echo "<td>" . $row['An'] . "</td>";
        echo "<td>" . $row['Stoc'] . "</td>";

       
        echo "</tr>";
}
    echo "</table>";
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

 ?>