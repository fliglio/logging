<?php

namespace Fliglio\Logging;


class FLogRegistry {

	private static $l;

	private function __construct() {}

	public static function set(FLoggerInterface $l) {
		self::$l = $l;
	}

	public static function get() {
		if (!isset(self::$l)) {
			throw new FLogException('Logger not set');
		}
		return self::$l;
	}

}
