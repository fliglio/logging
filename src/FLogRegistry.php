<?php

namespace Fliglio\Logging;

class FLogRegistry {

	/** @var FLoggerInterface */
	private static $l;

	private function __construct() {}

	public static function set(FLoggerInterface $l) {
		self::$l = $l;
	}

	/**
	 * @return FLoggerInterface
	 * @throws FlogException
	 */
	public static function get() {
		if (!isset(self::$l)) {
			throw new FLogException('Logger not set');
		}
		return self::$l;
	}

}