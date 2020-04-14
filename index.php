<?php
ini_set("display_errors",1);
error_reporting(-1);
require_once("core/EquationInterface.php");
require_once("core/LogInterface.php");
require_once("core/LogAbstract.php");
require_once("matvei/matveiException.php");
require_once("matvei/Linear.php");
require_once("matvei/Square.php");
require_once("matvei/Log.php");

if (file_exists('./version')) {
	matvei\Log::log('Version '.trim(file_get_contents('./version')));
}

$co_arr = [];
foreach(["a", "b", "c"] as $co) {
	echo "Enter ".$co.": ";
	$line = stream_get_line(STDIN, 1024, PHP_EOL);
	$co_arr[$co] = $line === "" ? 0 : $line;
}
$a = $co_arr["a"];
$b = $co_arr["b"];
$c = $co_arr["c"];
try {
  $solver = new matvei\Square();
	matvei\Log::log("Equation: $a*x^2 + $b*x + $c = 0");
	matvei\Log::log("roots: " . implode(" ", $solver->solve($a, $b, $c)));
}catch(matvei\matveiException $ex) {
	matvei\Log::log($ex->getMessage());
}

matvei\Log::write();
?>
