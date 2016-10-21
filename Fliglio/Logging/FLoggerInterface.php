<?php

namespace Fliglio\Logging;


interface FLoggerInterface extends \Psr\Log\LoggerInterface {

	public function context();
}
