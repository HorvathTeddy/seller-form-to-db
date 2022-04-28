<?php
//error_reporting (E_ALL ^ E_NOTICE);

$username = "java";
$password = "java";

$connect_string =
            "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
                                       (HOST = cedar.humboldt.edu)
                                       (PORT = 1521))
                            (CONNECT_DATA = (SID = STUDENT)))";

$connect = oci_connect($username, $password, $connect_string);

if (!$connect) {
    echo 'COULD NOT CONNECT TO THE DATABASE.';
}


// Select all rows from DB
$arch_query = '
        select * from architectForm
';


$rec_arch_query= oci_parse($connect, $arch_query);

oci_execute($rec_arch_query, OCI_DEFAULT);


// Display results as a table
echo "<ol>";

$results = array();
while ($row = oci_fetch_array($rec_arch_query, OCI_ASSOC)) 
{
    echo "<table style=width:100%>";
    echo "<tr>";
    
    echo "<th>" . "Full Name" . "</th>";
    echo "<th>" . "Email" . "</th>";
    echo "<th>" . "Mobile Number" . "</th>";
    echo "<th>" . "Office Number" . "</th>";
    echo "<th>" . "Home Address" . "</th>";
    echo "<th>" . "Office Address" . "</th>";
    echo "<th>" . "Building Type" . "</th>";
    echo "<th>" . "Building Height" . "</th>";
    echo "<th>" . "Rooms in Building" . "</th>";
    echo "<th>" . "Square Feet" . "</th>";
    echo "</tr>";
    echo "<tr>";
    
    echo "<td>" . $row['FULLNAME'] . "</td>";
    echo "<td>" . $row['EMAIL'] . "</td>";
    echo "<td>" . $row['MOBILENUMBER'] . "</td>";
    echo "<td>" . $row['OFFICENUMBER'] . "</td>";
    echo "<td>" . $row['HOMEADDRESS'] . "</td>";
    echo "<td>" . $row['OFFICEADDRESS'] . "</td>";
    echo "<td>" . $row['BUILDING'] . "</td>";
    echo "<td>" . $row['BUILDINGHEIGHT'] . "</td>";
    echo "<td>" . $row['BUILDINGROOMS'] . "</td>";
    echo "<td>" . $row['SQUAREFEET'] . "</td>";
    echo "</tr>";
    echo "</table>";
    // echo "<li>" . "Full Name: " . $row['FULLNAME'] . "</li>";
    // echo "<li>" . "Email: " . $row['EMAIL'] . "</li>";
    // echo "<li>" . "Mobile Number: " . $row['MOBILENUMBER'] . "</li>";
    // echo "<li>" . "Office Number: " . $row['OFFICENUMBER'] . "</li>";
    // echo "<li>" . "Home Address: " . $row['HOMEADDRESS'] . "</li>";
    // echo "<li>" . "Office Address: " . $row['OFFICEADDRESS'] . "</li>";
    // echo "<li>" . "Building Type: " . $row['BUILDING'] . "</li>";
    // echo "<li>" . "Building Height: " . $row['BUILDINGHEIGHT'] . "</li>";
    // echo "<li>" . "Rooms in Building: " . $row['BUILDINGROOMS'] . "</li>";
    // echo "<li>" . "Square Feet: " . $row['SQUAREFEET'] . "</li>";
}

echo "</ol>";

oci_free_statement($rec_arch_query);





oci_close($connect);


?>

<a href="architect.html">Seller Form</a>