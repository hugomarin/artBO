<?php
$connection  			= Connection::getInstance();
$retrieveusuariosSql 	= "SELECT *  FROM user_artists, user_artists_works WHERE user_artists_works.artist_id = user_artists.artist_id ORDER by user_id";
$retrieveusuariosQry 	= $connection->query($retrieveusuariosSql);	
$retrieveusuariosNum 	= $retrieveusuariosQry['num_rows'];
$resultNum     			= $retrieveusuariosQry['num_rows'];
$result 				= $retrieveusuariosQry['query'];
$retrieveusuariosQry	= $retrieveusuariosQry['query'];
$count 					= mysql_num_fields($retrieveusuariosQry);
$data ='';
$header = '';
for ($i = 0; $i < $count; $i++){
    $header .= mysql_field_name($result, $i)."\t";
}
//$header . = " Departamento"."\t";
//$header . = " Pa�s"."\t";

while($row = mysql_fetch_row($result)){
  $line = '';
  foreach($row as $value){
    if(!isset($value) || $value == ""){
      $value = "\t";
    }else{
# important to escape any quotes to preserve them in the data.
      $value = str_replace('"', '""', $value);
# needed to encapsulate data in quotes because some data might be multi line.
# the good news is that numbers remain numbers in Excel even though quoted.
      $value = '"' . utf8_decode($value) . '"' . "\t";
    }
    $line .= $value;
  }
  $data .= trim($line)."\n"; 
}
# this line is needed because returns embedded in the data have "\r"
# and this looks like a "box character" in Excel
  $data = str_replace("\r", "", $data);

# Nice to let someone know that the search came up empty.
# Otherwise only the column name headers will be output to Excel.
if ($data == "") 
{
  $data = "\nno matching records found\n";
}
# This line will stream the file to the user rather than spray it across the screen
header("Content-type: application/octet-stream");
# replace excelfile.xls with whatever you want the filename to default to
header("Content-Disposition: attachment; filename=excelfile.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $header."\n".$data;
?>