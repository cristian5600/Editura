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
echo $nr = $_POST['carti_reprezentanti'];
$tsql = "select R.Nume,R.Prenume,R.Judet,R.Id_Reprezentant,R.Tip,S.numar
from Reprezentanti R,(select Id_Reprezentant R,count(*) as numar
from
    Comenzi
group by
    Id_Reprezentant) S
	where R.Id_Reprezentant = S.R
	and S.numar>'$nr'
";
$stmt = sqlsrv_query($conn,$tsql);
if($stmt == false){
    echo "error";

}
    echo "
<table class='table'>
<tr>
<th>Nume</th>
<th>Prenume</th>
<th>Judet</th>
<th>Id_Reprezentant</th>
<th>Tip</th>
<th>Numar Comenzi</th>


";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
        echo '<tr class="table-row">';
       

        echo "<td>" . $row['Nume'] . "</td>";

        echo "<td>" . $row['Prenume'] . "</td>";
        echo "<td>" . $row['Judet'] . "</td>";
        echo "<td>" . $row['Id_Reprezentant'] . "</td>";

        echo "<td>" . $row['Tip'] . "</td>";
        echo "<td>" . $row['numar'] . "</td>";
        echo "</tr>";
}
    echo "</table>";
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

 ?>