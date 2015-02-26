<?php namespace SRPH\Jelai\Session;

use Core\Session\SessionInterface;

class NativeSession implements SessionInterface {

	/**
	 * Session implementation itself
	 */
	protected $bag;

	/**
	 * Class constructor. Calls `session_start`
	 * when instantiated.
	 */
	public function __construct()
	{
		\session_start();

		$this->bag = & $_SESSION;
	}

	/**
	 * Gets everything in the Session Bag
	 *
	 * @return array ($_SESSION)
	 */
	public function all()
	{
		return $this->bag;
	}

	/**
	 * Get the value of a certain key
	 *
	 * @param string $key Offset in the session bag
	 * @return mixed
	 */
	public function get($key)
	{
		return isset($this->bag[$key])
			? $this->bag[$key]
			: null;
	}

	/**
	 * Sets the value of a certain key
	 *
	 * @param string $key Session key
	 * @param mixed $value Value of the session key
	 * @return NativeSession ($this) For method chaining
	 */
	public function put($key, $value)
	{
		$this->bag[$key] =  $value;

		return $this;
	}

	/**
	 * Removes a certain key
	 *
	 * @param mixed(string|array) $key Offset(s) / key(s) in the bag to unset.
	 */
	public function forget($key)
	{
		if ( is_array($key) )
		{
			foreach($key as $offset)
			{
				unset($this->bag[$key]);
				// session_unset($key);
			}
		}
		else
		{
			unset($this->bag[$key]);
			// session_unset($key);
		}


		return $this;
	}

	/**
	 * Clear the bag
	 */
	public function clear()
	{
		$this->bag = array();
	}

	/**
	 * Checks the existence of the key
	 *
	 * @param $key Offset / key in the bag to check
	 * @return boolean
	 */
	public function has($key)
	{
		return array_key_exists($key, $this->bag);
	}


}
