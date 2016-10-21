<?php

namespace Fliglo\Logging;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class Flogger extends AbstractLogger {
	private $log;
	private $ctx;
	public function __construct(LoggerInterface $log, FlogContext $ctx) {
		$this->log = $log;
		$this->ctx = $ctx;
	}

	public function context() {
		return $this->ctx;
	}

	public function log($l, $m, array $c = []) {
		$this->log->log($l, $m, $c);
	}


}
