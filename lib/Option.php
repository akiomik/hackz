<?hh

namespace Akiomik\Hackz;

use \Akiomik\Hackz\Option\Some;
use \Akiomik\Hackz\Option\None;

abstract class Option<Ta> extends Monad<Ta>
{
    public static function pure(Ta $a): this
    {
        return static::some($a);
    }

    public static function some(Ta $a): Some<Ta>
    {
        return new Some($a);
    }

    public static function none(): None<Ta>
    {
        return new None();
    }
}

