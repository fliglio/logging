<?php

namespace Fliglio\Logging;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class FLogger extends AbstractLogger implements FLoggerInterface {

	private $log;
	private $ctx;

	public function __construct(LoggerInterface $log, FLogContext $ctx) {
		$this->log = $log;
		$this->ctx = $ctx;
	}

	public function context() {
		return $this->ctx;
	}

	public function log($l, $m, array $c = []) {
		
		$cMerged = array_merge($this->context()->toArray(), $c);

		$this->log->log($l, $m, $cMerged);
	}


}
