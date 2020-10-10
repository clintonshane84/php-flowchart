<?php
/**
 * 
 */
namespace Clinton\Wright\PHPFlowchart\Draw;

use Clinton\Wright\PHPFlowchart\Interfaces\IDrawFlowchart;
use Clinton\Wright\PHPFlowchart\Constants\Server;

class DrawFlowchartDecision implements IDrawFlowchart {
	public function __construct()
	{}
	
	public function draw($x, $y, $w = 140, $h = 0)
	{
		
		$font = Server::getServerPath() . "/public/font/RobotoMono-Regular.ttf";
        // create diamond for decision

        // create image
        $w = (!$w) ? 140 : $w;
        $x2 = $w + $x
        $y2 = $h + $y;
        $image = imagecreatetruecolor($w, $w);

        // allocate colors
        $bg   = imagecolorallocate($image, 200, 200, 200);
        $white = imagecolorallocate($image, 255, 255, 255);
        $blk = imagecolorallocate($image, 1, 1, 1);

        // fill the background
        imagefilledrectangle($image, 0, 0, $w-1, $w-1, $bg);

        // prepare local variables
        $c = ($w/2);
        $xc = $x + $c;
		$values = array(
            $xc,	$y,		// Point 1 (x, y)
            $x,		$xc,	// Point 2 (x, y)
			$xc,	$w,		// Point 3 (x, y)
			$w, 	$xc,	// Point 4 (x, y)
			$xc,	$y,		// Point 5 (x, y)
			$x,		$xc,	// Point 6 (x, y)
        );
        
        // draw a diamond and its outline
        imagefilledpolygon($image, $values, 6, $white);
        imageline($image, $c, $y, $x, $c, $blk);
        imageline($image, $c, $w, $w, $c, $blk);
        imageline($image, $w, $c, $c, 0, $blk);
        imageline($image, 0, $c, $c, $w, $blk);
        //RobotoMono-Regular.ttf
        imagettftext($image, 8.00, 0.00, $c/2, $c, $blk, $font, "true/false?");

        // flush image
        header('Content-type: image/png');
        imagepng($image);
        imagedestroy($image);
	}
}
