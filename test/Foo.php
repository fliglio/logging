<?php

namespace Fliglio\Logging;


/**
 *
 */
class Foo {
	use FLog;


	public function doIt() {
		$this->log();
	}
}
