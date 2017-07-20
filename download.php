<?php
$fpath = $_GET['fpath'];
$fname = $_GET['fname'];

header('Content-Type:application/force-download');
header('Content-Length:'.filesize($fpath));
header('Content-Disposition: attachment; filename="'.$fname.'"');

readfile($fpath);
?>