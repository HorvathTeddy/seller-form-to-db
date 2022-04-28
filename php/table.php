<?php
$username = "";
$password = "";
$connect_string =
            "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
                                        (HOST = cedar.humboldt.edu)
                                        (PORT = 1521))
                            (CONNECT_DATA = (SID = STUDENT)))";

$connect = oci_connect("java", "java", $connect_string);

if (!$connect) {
echo 'Error connecting...';
}


$create_table_str = "
drop table architectForm
";

$create_table_stmt = oci_parse($connect, $create_table_str);

oci_execute($create_table_stmt, OCI_COMMIT_ON_SUCCESS);

oci_free_statement($create_table_stmt);

$create_table_str = "

    create table architectForm(
        dateSubmitted date,
        fullName varchar(50),
        email varchar(50),
        mobileNumber varchar(15),
        officeNumber varchar(15),
        homeAddress varchar(50),
        officeAddress varchar(50),
        building varchar(50),
        buildingHeight number,
        buildingRooms number,
        squareFeet number
    )
";

$create_table_stmt = oci_parse($connect, $create_table_str);

oci_execute($create_table_stmt, OCI_COMMIT_ON_SUCCESS);

oci_free_statement($create_table_stmt);

echo 'Table Created | Cleared!';

oci_close($connect);
?>

<a href="architect.html">Back</a>