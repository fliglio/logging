<?php

namespace Fliglio\Logger;

namespace Psr\Log\LoggerInterface;

interface FloggerInterface extends LoggerInterface {

	public function context();
}
