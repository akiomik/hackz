<?hh

namespace Akiomik\Hackz;

trait ApplicativeTrait<Ta>
{
    require implements Functor<Ta>;
    require implements Apply<Ta>;
    require implements Applicative<Ta>;

    abstract public static function pure(Ta $a): this;

    /**
     * alias for pure
     */
    public static function point(Ta $a): this
    {
        return static::pure($a);
    }
}

