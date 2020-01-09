<?php

namespace Fliglio\Logging;

use Psr\Log\LoggerInterface;

interface FLoggerInterface extends LoggerInterface {

	public function context();

}