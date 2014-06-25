<?hh

namespace Akiomik\Hackz;

interface Applicative<Ta> {
    public static function pure(Ta $a): this;

    public static function point(Ta $a): this;

    public function ap<Tb>(Applicative<(function(Ta): Tb)> $f): this;
}

