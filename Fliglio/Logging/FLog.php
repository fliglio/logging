<?php

namespace Fliglio\Logging;


trait FLog {

	public function log() {
		return FLogRegistry::get();
	}

}
