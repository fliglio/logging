<?php

namespace Fliglio\Logging;

trait FLog {

	/**
	 * @return FLoggerInterface
	 */
	public function log() {
		return FLogRegistry::get();
	}

}
