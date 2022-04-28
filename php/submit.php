<?php


$username = "java";
$password = "java";

$connect_string =
            "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
                                       (HOST = cedar.humboldt.edu)
                                       (PORT = 1521))
                            (CONNECT_DATA = (SID = STUDENT)))";

$connect = oci_connect($username, $password, $connect_string);

if (!$connect) 
{
    echo 'COULD NOT CONNECT TO THE DATABASE.';
}




$arch_query = '
        insert into architectForm
        values (:dateSubmitted, :fullName, :email, :mobileNumber, :officeNumber, :homeAddress, :officeAddress, :building, :buildingHeight, :buildingRooms, :squareFeet)
';


$rec_arch_query = oci_parse($connect, $arch_query);


// bind variables to the query 
oci_bind_by_name($rec_arch_query, ':dateSubmitted', $_POST['dateSubmitted']);
oci_bind_by_name($rec_arch_query, ':fullName', $_POST['fullName']);
oci_bind_by_name($rec_arch_query, ':email', $_POST['email']);
oci_bind_by_name($rec_arch_query, ':mobileNumber', $_POST['mobileNumber']);
oci_bind_by_name($rec_arch_query, ':officeNumber', $_POST['officeNumber']);
oci_bind_by_name($rec_arch_query, ':homeAddress', $_POST['homeAddress']);
oci_bind_by_name($rec_arch_query, ':officeAddress', $_POST['officeAddress']);
oci_bind_by_name($rec_arch_query, ':building', $_POST['building']);
oci_bind_by_name($rec_arch_query, ':buildingHeight', $_POST['buildingHeight']);
oci_bind_by_name($rec_arch_query, ':buildingRooms', $_POST['buildingRooms']);
oci_bind_by_name($rec_arch_query, ':squareFeet', $_POST['squareFeet']);



// use OCI_COMMIT_ON_SUCCESS
oci_execute($rec_arch_query, OCI_COMMIT_ON_SUCCESS);


//echo oci_free_statement($rec_arch_query);

echo $_POST['dateSubmitted'] . " ";
echo $_POST['fullName'] . " ";
echo $_POST['email'] . " ";
echo $_POST['mobileNumber'] . " ";
echo $_POST['officeNumber'] . " ";
echo $_POST['homeAddress'] . " ";
echo $_POST['officeAddress'] . " ";
echo $_POST['building'] . " ";
echo $_POST['buildingHeight'] . " ";
echo $_POST['buildingRooms'] . " ";
echo $_POST['squareFeet'] . " ";
echo "<br>";
echo 'THE ABOVE INFORMATION HAS BEEN SUBMITTED TO THE DATABASE.';




oci_close($connect);

?>
<br>
<a href="architect.html">Back</a>