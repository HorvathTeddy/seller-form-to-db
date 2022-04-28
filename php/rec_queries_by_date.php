<?php


$connect_string =
            "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
                                       (HOST = cedar.humboldt.edu)
                                       (PORT = 1521))
                            (CONNECT_DATA = (SID = STUDENT)))";

$connect = oci_connect("java", "java", $connect_string);

if (!$connect) {
    echo 'Error connecting...';
}

$submit = json_decode($_POST['begin-date']);
$submit = json_decode($_POST['end-date']);

$arch_query = '
        select dateSubmitted
        from architectForm
        where (dateSubmitted >= :start_date) and (dateSubmitted <= :end_date)
';


$rec_arch_query = oci_parse($connect, $arch_query);

oci_bind_by_name($rec_arch_query, ':start_date', $req->begin_date);
oci_bind_by_name($rec_arch_query, ':end_date', $req->end_date);


$r = oci_execute($rec_arch_query, OCI_DEFAULT);


$out = array();
while ($row = oci_fetch_array($rec_arch_query, OCI_ASSOC)) {
    array_push($out, $row);
}

echo json_encode($out);

oci_free_statement($rec_arch_query);





oci_close($connect);


?>