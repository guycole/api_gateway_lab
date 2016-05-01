<?php
//echo "dumping variables\n";

$candidates = get_defined_vars();

$outfile = fopen("/tmp/dump.txt", "w") or die("file open failure");

fwrite($outfile, "---- start ----\n");

fwrite($outfile, "---- json ----\n");
$json = file_get_contents('php://input');
fwrite($outfile, $json."\n");
fwrite($outfile, "---- json ----\n");

$decoded = json_decode($json, true);
$pathArg = trim($decoded['pathArg']);
$sourceIp = trim($decoded['sourceIp']);

fwrite($outfile, "---- outvar----\n");
fwrite($outfile, "pathArg::".$pathArg."\n");
fwrite($outfile, "sourceIp::".$sourceIp."\n");
fwrite($outfile, "---- outvar----\n");

fwrite($outfile, "PHP_SELF::".$_SERVER['PHP_SELF']."\n");

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

$datum['requestTime'] = time();
$datum['requestAddress'] = $sourceIp;
$datum['transactionUuid'] = '6c5790e4-80e9-4ffe-b583-d8f50caafcd3';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type: application/json");

if ($pathArg == 200) {
   $status = 200;
} elseif ($pathArg == 404) {
   $status = 404;
} else {
   $status = 200;
}

header("HTTP/1.1 ".$status." ".'extra info');

echo json_encode($datum);
