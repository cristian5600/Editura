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
echo $nr = $_POST['numar'];
$tsql = "select Nume,Adresa,Judet,nr 
from Scoli S,(select Id_Scoala,count(*) nr
from Scoli_Reprezentanti
group by Id_Scoala
    ) SR
where 
S.Id_Scoala = SR.Id_Scoala and
nr>='$nr'
";
$stmt = sqlsrv_query($conn,$tsql);
if($stmt == false){
    echo "error";

}
    echo "
<table class='table'>
<tr>
<th>Nume</th>
<th>Adresa</th>
<th>Judet</th>
<th>NrReprezentanti</th>



";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
        echo '<tr class="table-row">';
       

        echo "<td>" . $row['Nume'] . "</td>";

        echo "<td>" . $row['Adresa'] . "</td>";
        echo "<td>" . $row['Judet'] . "</td>";
        echo "<td>" . $row['nr'] . "</td>";

      
        echo "</tr>";
}
    echo "</table>";
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

 ?>