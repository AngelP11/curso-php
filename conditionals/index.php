<?php 
	$color = 'golden';

/*	if ($color == 'green') {
		echo 'Color is green';
	} elseif ($color == 'blue') {
		echo 'Color is blue';
	} else {
		echo 'Color...';
	}*/

	switch ($color) {
		case 'green':
			echo 'Color is green';
			break;
		case 'blue':
			echo 'Color is blue';
			break;
		case 'yellow':
			echo 'Color is yellow';
			break;
		default:
			echo 'Other...';
			break;
	}
?>