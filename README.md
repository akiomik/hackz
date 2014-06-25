hackz
=====

A library of hhvm/hack for functional programming.

## Installation

Add following lines to your `composer.json`:

```json
{
    "repositories": [{
        "type": "vcs",
        "url": "https://github.com/akiomik/hackz"
    }],
    "require": {
        "akiomik/hackz": "dev-master"
    }
}
```

## Usage

### Option

```php
<?hh

use \Akiomik\Hackz\Option;

$foo = Option::pure(100);                       // Some(100)
$foo->map($x ==> $x + 1)->map($x ==> $x * 2);   // Some(202)
$foo->bind($x ==> Option::some($x ==> $x + 1))
    ->bind($x ==> Option::some($x ==> $x * 2);  // Some(202)
$foo->bind($x ==> Option::none());              // None
```

### Create your monads

TODO

## License

The MIT License. See `LICENSE`.
