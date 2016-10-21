<?php

namespace Fliglio\Logging;

class FlogIntTest extends \PHPUnit_Framework_TestCase {
	use FLog;


	public function setUp() {
		$d = new \Katzgrau\KLogger\Logger('php://stdout');

		FLogRegistry::set(new FLogger($d , new FLogContext()));
	}

	public function testExample() {
		$this->log()->info("foo");                     //foo
		$this->log()->context()->add("bar", "baz");
		$this->log()->info("foo");                     //bar=baz, foo
		$this->log()->info("foo", ["bar" => "boo"]);   //bar=boo, foo
		$this->log()->info("foo");                     //bar=baz, foo


	}
}

