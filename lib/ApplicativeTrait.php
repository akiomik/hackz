<?hh

namespace Akiomik\Hackz;

trait ApplicativeTrait<Ta> {
    require implements Functor<Ta>;
    require implements Applicative<Ta>;

    abstract public static function pure(Ta $a): this;

    /**
     * alias for pure
     */
    public static function point(Ta $a): this {
        return self::pure($a);
    }

    abstract public function ap<Tb>(Applicative<(function(Ta): Tb)> $f): this;
}

