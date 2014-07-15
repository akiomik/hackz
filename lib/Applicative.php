<?hh // strict

namespace Akiomik\Hackz;

abstract class Applicative<Ta> extends Apply<Ta>
{
    abstract public static function pure(Ta $a): this;

    /**
     * alias for pure
     */
    public static function point(Ta $a): this
    {
        return static::pure($a);
    }
}

