<?php
/**
 * Baseline Pseudo Element Generator
 * Thanks to Michael Wright <michael@wserver.co.uk> for the image generation code
 * @author Daniel Eden <dan.eden@me.com>
 */

// Check if GET h is set as it is required.
if (!isset($_GET['columnWidth']) || !isset($_GET['gutterWidth'])) {
	die('/* Column and gutter width parameters are required. */');
}

$queryString = array();
foreach ($_GET as $key => $value) {
	$queryString[] = $key . '=' . $value;
}

$totalWidth = 0;
if (isset($_GET['columnNum']) && $_GET['columnNum'] > 0) {
        $gutterWidth = $_GET['gutterWidth'];
        $totalWidth = $_GET['columnNum'] * ($_GET['columnWidth'] + $gutterWidth);
}

// Set the content-type to css
header("Content-type: text/css");
?>
html {
	position: relative;
}

html:after {
	position: absolute;
<?php 
if($totalWidth) {
        echo "        width: $totalWidth"."px;\n";
        echo "        background: url(/image.php?".implode('&', $queryString).") repeat top left;\n";
}
else {
        echo "        width: auto;\n";
        echo "        background: url(/image.php?".implode('&', $queryString).") repeat top left;\n";
}
?>
        margin-left: auto; margin-right: auto;
	height: auto;
	z-index: 9999;
	content: '';
	display: block;
	pointer-events: none;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
}

html:active:after {
	display: none;
}