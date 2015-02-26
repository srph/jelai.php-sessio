<?php namespace Core\Session;

interface SessionInterface {

	/**
	 * Gets everything in the Session Bag
	 *
	 * @return array
	 */
	public function all();

	/**
	 * Get the value of a certain key
	 *
	 * @param string $key Offset in the session bag
	 * @return mixed
	 */
	public function get($key);

	/**
	 * Sets the value of a certain key
	 *
	 * @param string $key Session key
	 * @param mixed $value Value of the session key
	 */
	public function put($key, $value);

	/**
	 * Removes a certain key
	 *
	 * @param string $key Offset / key in the bag to unset
	 */
	public function forget($key);

	/**
	 * Clear the bag
	 */
	public function clear();

	/**
	 * Checks the existence of the key
	 *
	 * @param $key Offset / key in the bag to check
	 * @return boolean
	 */
	public function has($key);

}
