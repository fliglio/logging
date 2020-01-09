<?php

namespace Fliglio\Logging;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class FLogger extends AbstractLogger implements FLoggerInterface {

	private $log;
	private $ctx;

	/**
	 * @param LoggerInterface $log
	 * @param FLogContext $ctx
	 */
	public function __construct(LoggerInterface $log, FLogContext $ctx) {
		$this->log = $log;
		$this->ctx = $ctx;
	}

	/**
	 * @return FLogContext
	 */
	public function context() {
		return $this->ctx;
	}

	/**
	 * @param string $level
	 * @param string $message
	 * @param array $context
	 * @return void
	 */
	public function log($level, $message, array $context = []) {
		
		$cMerged = array_merge($this->context()->toArray(), $context);

		$this->log->log($level, $message, $cMerged);
	}

}