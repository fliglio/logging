<?php
namespace Fliglio\Logging;


class FlogTest extends \PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	/**
	 * Test that a simple model can be validated
	 */
	public function testValidation() {

		// given
		$foo = new Foo();

		// when
		$foo->doIt();
	}
}
