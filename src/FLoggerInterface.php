<?php

namespace Fliglio\Logging;

use Psr\Log\LoggerInterface;

interface FLoggerInterface extends LoggerInterface {

	/** 
	 * @return FLogContext 
	 */
	public function context();

}