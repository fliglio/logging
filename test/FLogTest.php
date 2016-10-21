<?php
namespace Fliglio\Logging;


class FlogTest extends \PHPUnit_Framework_TestCase {
	use Flog;

	private $l;

	public function setUp() {
		$l = new StubLogger();
		FlogRegistry::set(new Flogger($this->l));

	}

	public function testFlog() {

		// when
		$this->log()->info("foo");                     //foo
		$this->log()->context()->add("bar", "baz");
		$this->log()->info("foo");                     //bar=baz, foo
		$this->log()->info("foo", ["bar" => "boo"]);   //bar=boo, foo
		$this->log()->info("foo");                     //bar=baz, foo


		// then
		$this->assertEquals($this->l->store, [], "these should match");
	}
}
