<?php
/**
 * 
 */
namespace Clinton\Wright\PHPFlowchart\Draw;

use Clinton\Wright\PHPFlowchart\Interfaces\IDrawFlowchart;
use Clinton\Wright\PHPFlowchart\Constants\Server;

class DrawFlowchartProcess implements IDrawFlowchart {
	public function __construct()
	{}
	
	/** 
	 *  create rectangle with rounded corners for process
	 * 
	 */
	public function draw($x, $y, $w = 0, $h = 0)
	{
		$x1 = $x = (!$x) ? 0 : $x;
		$y1 = $y = (!$y) ? 0 : $y;
		$w = (!$w) ? 140.0 : $w;
		$h = (!$h) ? $w / 2.00 : $h;
		$font = Server::getServerPath() . "/public/font/RobotoMono-Regular.ttf";

        // create image
        $image = imagecreatetruecolor($w, $h);

        // allocate colors
        $bg   = imagecolorallocate($image, 200, 200, 200);
        $fill = imagecolorallocate($image, 255, 255, 255);
        $outline = imagecolorallocate($image, 1, 1, 1);

        // prepare local variables
        $x2 = $w + $x;
        $y2 = $h + $y;
		
		$r = min(15, floor(min(($x2-$x1)/2, ($y2-$y1)/2)));

		// top border
		imageline($image, $x1+$r, $y1, $x2-$r, $y1, $outline);
		// right border
		imageline($image, $x2, $y1+$r, $x2, $y2-$r, $outline);
		// bottom border
		imageline($image, $x1+$r, $y2, $x2-$r, $y2, $outline);
		// left border
		imageline($image, $x1, $y1+$r, $x1, $y2-$r, $outline);

		// top-left arc
		imagearc($image, $x1+$r, $y1+$r, $r*2, $r*2, 180, 270, $outline);
		// top-right arc
		imagearc($image, $x2-$r, $y1+$r, $r*2, $r*2, 270, 0, $outline);
		// bottom-right arc
		imagearc($image, $x2-$r, $y2-$r, $r*2, $r*2, 0, 90, $outline);
		// bottom-left arc
		imagearc($image, $x1+$r, $y2-$r, $r*2, $r*2, 90, 180, $outline);
	}
}
