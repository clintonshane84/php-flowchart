<?php
namespace Clinton\Wright\PHPFlowchart\Traits;

trait DrawDefaultParamsTrait {
	public function defaultParams($x, $y) {
		$x = ($x === 0) ? 0 : $x;
		$y = ($y === 0) ? 0 : $y;
	}
}
