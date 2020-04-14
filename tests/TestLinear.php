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

final class TestLinear extends TestCase
{
  public function testLinear1(): void
  {
    $solver = new matvei\Linear();
    $root = $solver->ur(1, 2);

    $this->assertEquals($root, -2);
  }

  public function testLinear2(): void
  {
    $this->expectException(matvei\matveiException::class);
    
    $solver = new matvei\Linear();
    $root = $solver->ur(0, 0);
  }

  public function testLinear3(): void
  {
    $solver = new matvei\Linear();
    $root = $solver->ur(5, 20);

    $this->assertEquals($root, -4);
  }
}
