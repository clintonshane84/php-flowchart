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
	
	public function draw()
	{
		$font = Server::getServerPath() . "/public/font/RobotoMono-Regular.ttf";
        // create diamond for decision
		$values = array(
            50, 0,  // Point 1 (x, y)
            0, 50, // Point 2 (x, y)
			50,100, // Point 3 (x, y)
			100, 50, // Point 4 (x, y)
			50, 0, // Point 5 (x, y)
			0, 50, // Point 6 (x, y)
        );
        // create image
        $image = imagecreatetruecolor(100, 100);

        // allocate colors
        $bg   = imagecolorallocate($image, 200, 200, 200);
        $white = imagecolorallocate($image, 255, 255, 255);
        $blk = imagecolorallocate($image, 1, 1, 1);

        // fill the background
        imagefilledrectangle($image, 0, 0, 99, 99, $bg);

        // draw a polygon
        imagefilledpolygon($image, $values, 6, $white);
        imageline($image, 50, 0, 0, 50, $blk);
        imageline($image, 50, 100, 100, 50, $blk);
        imageline($image, 100, 50, 50, 0, $blk);
        imageline($image, 0, 50, 50, 100, $blk);
        //RobotoMono-Regular.ttf
        imagettftext($image, 12.00, 0.00, 50, 50, $blk, $font, "True/False?");

        // flush image
        header('Content-type: image/png');
        imagepng($image);
        imagedestroy($image);
	}
}
