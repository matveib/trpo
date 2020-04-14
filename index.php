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

$solver = new matvei\Square();
$roots = $solver->solve(1, 2, -3);
matvei\Log::log("roots: " . implode(" ", $roots));
matvei\Log::write();
?>
