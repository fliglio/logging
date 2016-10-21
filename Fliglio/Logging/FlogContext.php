<?php

namespace Fliglio\Logging;

class FlogContext implement unset {

	private $data = [];

	public function set($key, $val) {
		$this->data[$key] = $val;
	}

	public function unset($key) {
		unset($this->data[$key]);
	}


}
