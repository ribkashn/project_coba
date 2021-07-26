<?php
date_default_timezone_set("Asia/Jakarta");
$config['tglhrini'] = date("Y-m-d");
$config['tglbesok'] = date("Y-m-d",strtotime('+1 day'));
$config['tglkemarin'] = date("Y-m-d",strtotime('-1 day'));
$config['versi'] = '1.0.';
//$config['tglhrini'] = '2020-09-01';
