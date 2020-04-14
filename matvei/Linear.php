<?php
namespace matvei;

class Linear {
	protected $x;
	function ur($a, $b){
		if ($a != 0) {
			$x = -1*$b/$a;
			$this->x = $x;
			return $x;
		}
		throw new matveiException("No solutions");	
	}
}
?>