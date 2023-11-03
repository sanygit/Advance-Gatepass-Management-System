<?php 
function countrecords($tablename)
{
	include("countervalidate.php");
	$sql="SELECT * FROM $tablename ORDER BY id";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf("%d",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

mysqli_close($con);
}
function customquery($table,$queryitem)
{
	include("countervalidate.php");
	$sql="SELECT * FROM $table WHERE status='$queryitem' ORDER BY id";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf("%d",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

mysqli_close($con);

}

 ?>
