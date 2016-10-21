<?php

namespace Fliglio\Logging;

use Psr\Log\AbstractLogger;

class StubLogger extends AbstractLogger {

	public $store = [];

	public function log($l, $m, array $c = []) {
		$this->store[] = [$l, $m, $c];
	}
}
