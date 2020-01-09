<?php

namespace Fliglio\Logging;

class FlogTest extends \PHPUnit_Framework_TestCase {
	use FLog;

	private $l;

	public function setUp() {
		$this->l = new StubLogger();
		FLogRegistry::set(new FLogger($this->l, new FLogContext()));
	}

	public function testFlog() {
		// given
		$ex = [
			["info", "foo", []],
			["info", "foo", ["bar" => "baz"]],
			["info", "foo", ["bar" => "boo"]],
			["info", "foo", ["bar" => "baz"]],
		];
		// when
		$this->log()->info("foo");                     //foo
		$this->log()->context()->add("bar", "baz");
		$this->log()->info("foo");                     //bar=baz, foo
		$this->log()->info("foo", ["bar" => "boo"]);   //bar=boo, foo
		$this->log()->info("foo");                     //bar=baz, foo


		// then
		$this->assertEquals($this->l->store, $ex, "these should match");
	}

}