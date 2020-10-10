<?php
/**
 * 
 */
namespace Clinton\Wright\PHPFlowchart\Constants;

class Server {
	private static $serverPath = "";
	public static function getServerPath()
	{
		return self::$serverPath;
	}
	
	public static function setServerPath($dir)
	{
		if (is_dir($dir) && is_readable($dir)) {
			self::$serverPath = $dir;
			return true;
		}
		return false;
	}
}
