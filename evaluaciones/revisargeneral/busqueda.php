<?php 
include_once '../../login/check.php';
if (!empty($_POST)) {
	$folder="../../";
	include_once '../../class/estudiante.php';
	extract($_POST);

    $codparalelo=$codparalelo!=""?$codparalelo:"%";

}
?>
<iframe src="vernota.php?codparalelo=<?php echo $codparalelo?>" width="100%" height="600"></iframe>