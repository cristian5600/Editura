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

#Nume = '$Autor' 
echo $an = $_POST['an'];
$tsql = "select Nume,Prenume,C.Data from Reprezentanti R,Comenzi C
where R.Id_Reprezentant = C.Id_Reprezentant and
	YEAR(C.Data) > '$an' ";
$stmt = sqlsrv_query($conn,$tsql);
if($stmt == false){
    echo "error";

}
    echo "
<table class='table'>
<tr>

<th>Nume</th>
<th>Prenume</th>
<th>Data</th>


";

while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
        echo '<tr class="table-row">';

      

        echo "<td>" . $row['Nume'] . "</td>";
        echo "<td>" . $row['Prenume'] . "</td>";
        echo "<td>" . $row['Data']->format('Y-m-d' . "</td>");



        echo "</tr>";
}
    echo "</table>";
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

 ?>