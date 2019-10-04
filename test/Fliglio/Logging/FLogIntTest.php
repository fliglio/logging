<?php

namespace Fliglio\Logging;

	class Demo {
		use FLog;
	
		public function __construct() {
			$this->log()->info("hello constructor!");
		}
		
		public function doATask($taskType) {
			$this->log()->context()->add("taskType", $taskType);
			$this->log()->info("Starting Task");
			foreach (["a", "b", "c", "d"] as $subTask) {
				$this->log()->context()->add("subTask", $subTask);
				$this->log()->info("Starting SubTask");

				try {
					//doWork();
					$this->log()->info("SubTask Completed!");
				} catch (\Exception $e) {
					$this->log()->warning("SubtTask Problem!", ["e" => $e]);
				
				}
			}
			$this->log()->context()->remove("subTask");
			$this->log()->info("SubtTask Completed!");
			$this->log()->context()->remove("taskType");
		}
	}

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
	
	public function testExample2() {
		$this->log()->info("Starting...");
		$demo = new Demo();
		$demo->doATask("Foo");
		$this->log()->info("Ending...");
	}
}

