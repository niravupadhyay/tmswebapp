<?php

$file = file("AlarmFiles/newalarmlog.txt");
for($i = max(0, count($file)-6); $i < count($file); $i++) {
  echo $file[$i] . "\n";
}

?>