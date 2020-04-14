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

final class TestSquare extends TestCase
{
  public function testSquare1(): void
  {
    $solver = new matvei\Square(5, 5, -10);
    $roots = $solver->solve(5, 5, -10);

    $this->assertEquals($roots, [1, -2]);
  }

  public function testSquareNegative(): void
  {
    $this->expectException(matvei\matveiException::class);
    
    $solver = new matvei\Square(-1, -1, -1);
    $roots = $solver->solve(-1, -1, -1);
  }

  public function testSquareZeros(): void
  {
    $this->expectException(matvei\matveiException::class);
    
    $solver = new matvei\Square(0, 0, 0);
    $roots = $solver->solve(0, 0, 0);
  }
}
