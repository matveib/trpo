<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once("core/EquationInterface.php");
require_once("core/LogAbstract.php");
require_once("core/LogInterface.php");
require_once("matvei/matveiException.php");
require_once("matvei/Linear.php");
require_once("matvei/Log.php");
require_once("matvei/Square.php");

final class TestLog extends TestCase
{
  public function testLog1(): void
  {
    matvei\Log::Instance()->log("testing");
    matvei\Log::Instance()->log("log");

    ob_start();
    matvei\Log::Instance()->write();
    $log = ob_get_contents();
    ob_end_clean();

    $this->assertEquals($log, "testing\nlog\n");
  }

  public function testLog2(): void
  {
    matvei\Log::Instance()->log("test 1");
    matvei\Log::Instance()->log("test 2");
    matvei\Log::Instance()->log("test 3");
    matvei\Log::Instance()->log("test 4");

    ob_start();
    matvei\Log::Instance()->write();
    $log = ob_get_contents();
    ob_end_clean();

    $this->assertEquals($log, "testing\nlog\ntest 1\ntest 2\ntest 3\ntest 4\n");
  }
}
