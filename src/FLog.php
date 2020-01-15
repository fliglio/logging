<?php

namespace Fliglio\Logging;

trait FLog {

	/**
	 * @return FLogRegistry
	 */
	public function log() {
		return FLogRegistry::get();
	}

}
