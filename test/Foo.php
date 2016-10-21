<?php

namespace Fliglio\Logging;


/**
 *
 */
class Foo {
	use FLog;


	public function doIt() {
		$this->log()->info("foo");                     //foo
		$this->log()->context()->add("bar", "baz");
		$this->log()->info("foo");                     //bar=baz, foo
		$this->log()->info("foo", ["bar" => "boo"]);   //bar=boo, foo
		$this->log()->info("foo");                     //bar=baz, foo
	}
}
