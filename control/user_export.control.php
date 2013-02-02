<?php
$connection  			= Connection::getInstance();
$retrieveusuariosSql 	= "SELECT *  FROM user_users  ORDER by user_id";
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
//$header . = " País"."\t";

while($row = mysql_fetch_row($result)){
  $line = '';
  foreach($row as $key=>$value){

    if(!isset($value) || $value == ""){
      $value = "\t";
    }
	else{
# important to escape any quotes to preserve them in the data.
      if ($key == 1)
	  {
	  	if ($value == '0')
			  $value = "Sin selección";
	  	elseif ($value == '1')
			  $value = "Galería";	
	  	else
			  $value = "Nueva Galería";	

	  }
	  else if ($key == 5)
	  {
	  	if ($value != '\t')
			  $value = str_replace('"', '""', "http://www.activemgmd.com/ccb/ccb-galerias/resources/images/".$value);
	  	else
			  $value = str_replace('"', '""', $value);	
	  }
	 else if ($key == 9)
	  {
	  	if ($value != '0')
		{

			  $country	= new Country($value);
			  $value 	= $country->__get('country_name');
		}
		else
			  $value = str_replace('"', '""', $value);	
	  }	  
      else if ($key == 17)
	  {
	  	if ($value != '\t')
			  $value = str_replace('"', '""', "http://www.activemgmd.com/ccb/ccb-galerias/resources/images/".$value);
	  	else
			  $value = str_replace('"', '""', $value);	
	  }	
      else if ($key == 24)
	  {
	  	if ($value != '0')
		{
			switch ($value):
				case '1':
					$value	= 'Plus 63 mts2';
				break;
				case '2':
					$value	= '63 mts2';
				break;				
				case '3':
					$value	= '45 mts2';
				break;				
				case '4':
					$value	= '33.75 mts2';
				break;					
				case '5':
					$value	= '31,50 mts2';
				break;					
				case '6':
					$value	= '21 mts2';
				break;									
			endswitch;
		}
	  	else
			  $value = 'sin seleccionar';	
	  }		 
      else if ($key == 25)
	  {
	  	if ($value != '\t')
			  $value = str_replace('"', '""', "http://www.activemgmd.com/ccb/ccb-galerias/resources/documents/".$value);
	  	else
			  $value = str_replace('"', '""', $value);	
	  }	 
      else if ($key == 26)
	  {
	  	if ($value != '\t')
			  $value = str_replace('"', '""', "http://www.activemgmd.com/ccb/ccb-galerias/resources/documents/".$value);
	  	else
			  $value = str_replace('"', '""', $value);	
	  }	 	  
      else if ($key == 27)
	  {
	  	if ($value != '\t')
			  $value = str_replace('"', '""', "http://www.activemgmd.com/ccb/ccb-galerias/resources/documents/".$value);
	  	else
			  $value = str_replace('"', '""', $value);	
	  }	 
      else if ($key == 28)
	  {
	  	if ($value != '\t')
			  $value = str_replace('"', '""', "http://www.activemgmd.com/ccb/ccb-galerias/resources/documents/".$value);
	  	else
			  $value = str_replace('"', '""', $value);	
	  }	
      else if ($key == 31)
	  {
	  	if ($value != '\t')
		{
			  $value = str_replace('0', 'No', $value);
			  $value = str_replace('1', 'Si', $value);			  
		}
		else
			  $value = str_replace('"', '""', $value);	
	  }		  
      else if ($key == 36)
	  {
	  	if ($value != '0')
			  $value = 'Si';
	  	else
			  $value = 'No';	
	  }	 	  
	 else
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