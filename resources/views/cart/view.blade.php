<?php  
$total_amount = 1;

if (isset($infocart)) {
	foreach ($infocart as $key => $value) {
		$total_amount += $value['amount'];
	}
}
echo $total_amount;
?>