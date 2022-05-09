<?php

function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
}

$fileName = "challan-details_". date('Y-m-d') . ".xls";

$fields = array("Challan ID","Full Name","Place","License No.","Vehicle Number","Vehicle Type","Phone Number","Violation Type","Violation Description","Violation Date","Fine Amount","Created By");

$excelData = implode("\t", array_values($fields)) . "\n";

include_once 'database_connect.php';
// Fetch records from database 
$query = $con->query("SELECT * FROM challan ORDER BY challan_id ASC") ;
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 

        $lineData = array($row['challan_id'], $row['name'], $row['place'], 
                        $row['license_no'], $row['vehicle_no'], $row['vehicle_type'], $row['phone_no'],
                        $row['violation_type'],$row['violation_desc'],$row['violation_date'],
                        $row['fine_amount'],$row['created_by'] ); 

        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;
?>