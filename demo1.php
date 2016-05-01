<?php
//echo "dumping variables\n";

$candidates = get_defined_vars();

$outfile = fopen("/tmp/dump.txt", "w") or die("file open failure");

fwrite($outfile, "---- start ----\n");

fwrite($outfile, "---- json ----1\n");
$json = file_get_contents('php://input');
fwrite($outfile, $json);
fwrite($outfile, "---- json ----2\n");
$datum = json_decode($json, true);
fwrite($outfile, $datum);
fwrite($outfile, "---- json ----3\n");

//fwrite($outfile, "PHP_SELF::".$_SERVER['PHP_SELF']."\n");

$keys1 = array_keys($_SERVER);
//foreach ($keys1 as $value1) {
//  echo $value1."\n";
//  var_dump($value1);
//  fwrite($outfile, "SERVER::".$value1."\n");
//}

$keys1 = array_keys($candidates);
foreach ($keys1 as $value1) {
//  echo $value1."\n";
//  var_dump($value1);
  fwrite($outfile, $value1."\n");

  if (is_array($candidates[$value1])) {
    $temp1 = $candidates[$value1];
    $keys2 = array_keys($temp1);
    foreach($keys2 as $value2) {
//      var_dump($value2);

      if (is_array($temp1[$value2])) {
        $temp2 = $temp1[$value2];
        $keys3 = array_keys($temp2);
        foreach($keys3 as $value3) {
//          var_dump($value3);
          fwrite($outfile, $value1."::".$value2."::".$value3."\n");
	}
      } else {
          fwrite($outfile, $value1."::".$value2."::".$temp1[$value2]."\n");
      }
    }
  }
}

fwrite($outfile, "---- stop ----\n");
fclose($outfile);

$datum = Array();

$datum['requestTime'] = 2718;
$datum['requestAddress'] = 'bbb2';
$datum['transactionUuid'] = 'ccc2';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type: application/json");

$status = 200;
header("HTTP/1.1 ".$status." ".'extra info');

echo json_encode($datum);
