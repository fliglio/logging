<?php

namespace Fliglio\Logging;

class FLogFailureTest extends \PHPUnit_Framework_TestCase {
	use FLog;

	/** @expectedException Fliglio\Logging\FLogException */
	public function testFlog() {
		// when
		$this->log()->info("foo");                     //foo
		
		// then
		$this->assertTrue(false);
	}

}