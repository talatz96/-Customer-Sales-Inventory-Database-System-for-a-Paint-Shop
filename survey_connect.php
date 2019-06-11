<?php

$connect = new MongoClient();
$db = $connect -> local;
$collection = $db -> survey_form;
$cursor = $collection -> find();
foreach($cursor as $result)
{
	print_r(result);
}

?>


