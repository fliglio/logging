<?php

namespace Fliglio\Logging;

class FLogContext {

	private $data = [];

	/**
	 * @param string $key
	 * @param string $val
	 * @return FLogContext
	 */
	public function add($key, $val) {
		$this->data[$key] = $val;
		return $this;
	}

	/**
	 * @param [type] $key
	 * @return void
	 */
	public function remove($key) {
		unset($this->data[$key]);
	}
	
	/**
	 * @return array
	 */
	public function toArray() {
		return $this->data;
	}

}
