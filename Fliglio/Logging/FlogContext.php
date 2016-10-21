<?php

namespace Fliglio\Logging;

class FlogContext {

	private $data = [];

	public function add($key, $val) {
		$this->data[$key] = $val;
		return $this;
	}

	public function remove($key) {
		unset($this->data[$key]);
	}
	
	public function toArray() {
		return $this->data;
	}

}
