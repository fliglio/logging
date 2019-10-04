[![Build Status](https://travis-ci.org/fliglio/logging.svg?branch=master)](https://travis-ci.org/fliglio/logging)
[![Latest Stable Version](https://poser.pugx.org/fliglio/logging/v/stable.svg)](https://packagist.org/packages/fliglio/logging)

# Fliglio.Logging

Run tests using:

	$ make test

 supplies the `\Fliglio\Logging\Flog` trait to add in a psr compatible `log()` method.


Configure with monolog

	$ composer require monolog/monolog

	//index.php
	$logger = new Logger("Demo");¬
	$handler = new StreamHandler('php://stderr');¬
	$logger->pushHandler($handler);¬
	
	FLogRegistry::set(new FLogger($logger , new FLogContext()));


Configure with KLogger

	$ composer require katzgrau/klogger

	//index.php
	$logger = new \Katzgrau\KLogger\Logger('php://stderr');
	
	FLogRegistry::set(new FLogger($logger , new FLogContext()));



Use in a class (with the trait)

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
					doWork();
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


	$logger = new \Katzgrau\KLogger\Logger('php://stderr');
	$flogger = new FLogger($logger , new FLogContext()));
	FLogRegistry::set($flogger);


	$flogger->info("Starting...");
	
	$demo = new Demo();
	$demo->doATask("Foo");

	$flogger->info("Ending...");


Output:

	[2019-10-04 20:25:28.001557] [info] Starting...
	[2019-10-04 20:25:28.001606] [info] hello constructor!
	[2019-10-04 20:25:28.001641] [info] Starting Task
	    taskType: 'Foo'
	[2019-10-04 20:25:28.001688] [info] Starting SubTask
	    taskType: 'Foo'
	    subTask: 'a'
	[2019-10-04 20:25:28.001739] [info] SubTask Completed!
	    taskType: 'Foo'
	    subTask: 'a'
	[2019-10-04 20:25:28.001780] [info] Starting SubTask
	    taskType: 'Foo'
	    subTask: 'b'
	[2019-10-04 20:25:28.001821] [info] SubTask Completed!
	    taskType: 'Foo'
	    subTask: 'b'
	[2019-10-04 20:25:28.001862] [info] Starting SubTask
	    taskType: 'Foo'
	    subTask: 'c'
	[2019-10-04 20:25:28.001902] [info] SubTask Completed!
	    taskType: 'Foo'
	    subTask: 'c'
	[2019-10-04 20:25:28.001945] [info] Starting SubTask
	    taskType: 'Foo'
	    subTask: 'd'
	[2019-10-04 20:25:28.001985] [info] SubTask Completed!
	    taskType: 'Foo'
	    subTask: 'd'
	[2019-10-04 20:25:28.002028] [info] SubtTask Completed!
	    taskType: 'Foo'
	[2019-10-04 20:25:28.002070] [info] Ending...



