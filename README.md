# jelai.php-session

jelai.php Session abstraction

## What is jelai.php?

Please see this [gist](https://gist.github.com/srph/2e2d51d46dadfdbc38e3).

## Usage

The package provides a built-in for the native session (```$_SESSION```).

```php
require __DIR__ . '/path/to/src/SRPH/Jelai/Session\NativeSession.php';
$session = new SRPH\Jelai\Session\NativeSession;

$session->put('login', 1);
$session->get('login'); // 1
$session->forget('login');
$session->has('login') // false
$session->all(); // empty
```

The abstraction simply provides an interface (```SessionInterface```).

```php
<?php namespace MyApp\Session;

use SRPH\Jelai\Session\SessionInterface;

class FileSession implements SessionInterface {
	
	public function get()
	{
		//
	}
	
	public function put()
	{
		//
	}
	
	// other..
}
```

The interface is much more appreciated when paired with an *IoC Container*, wherein you can *dependency inject* stuff. For instance, in Laravel, you can bind an interface to a class when called, like so:

```php
# Laravel 4.x
<?php namespace MyApp\Session;

use Illuminate\Support\ServiceProvider;

class HashingServiceProvider extends ServiceProvider {
	
	/**
	 * Bind `SRPH\Jelai\Hashing\HashingInterface` to `MyApp\Hashing\BycryptHasher`
	 */
	public function register()
	{
		$this->app->bind('SRPH\Jelai\Session\SessionInterface', 'SRPH\Jelai\Session\NativeSession');
	}
}
```

\* *This hashing abstraction is mostly a mimic of Laravel's hashing abstraction.*

## API

#### ```SessionInterface```

Abstraction.

- ```all``` (*```void```*)

Get the whole session bag 

- ```get``` (*```string```* ```$key```)

Get the value of the given key.

- ```put``` (*```string```* ```$key```, *```mixed```* ```$value```) 

Put the key to the session with the given value

- ```forget``` (*```string```* ```$key```);

Remove the provided key from the session.

- ```clear``` (*```void```*);

Clears the bag

- ```has``` (*```string```* ```$key```)

Checks if the given key exists

 
#### ```NativeSession```

- ```all``` (*```void```*)
- ```get``` (*```string```* ```$key```)
- ```put``` (*```string```* ```$key```, *```mixed```* ```$value```) 
- ```forget``` (*```string```* ```$key```);
- ```clear``` (*```void```*);
- ```has``` (*```string```* ```$key```)

\* *Check the example, [MD5Hasher](https://github.com/srph/jelai.php-hashing/blob/master/src/SRPH/Jelai/Hashing/MD5Hasher.php).*

## Acknowledgement

**jelai.php-hashing** © 2015+, Kier Borromeo (srph). **jelai.php** is released under the [MIT](mit-license.org) license.

> [srph.github.io](http://srph.github.io) &nbsp;&middot;&nbsp;
> GitHub [@srph](https://github.com/srph) &nbsp;&middot;&nbsp;
> Twitter [@_srph](https://twitter.com/_srph)
