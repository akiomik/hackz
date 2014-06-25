<?hh

namespace Akiomik\Hackz;

use \Akiomik\Hackz\Option\Some;
use \Akiomik\Hackz\Option\None;

abstract class Option<Ta> implements Functor<Ta>, Applicative<Ta>, Monad<Ta> {
    use FunctorTrait<Ta>;
    use ApplicativeTrait<Ta>;
    use MonadTrait<Ta>;

    public static function pure(Ta $a): Option<Ta> {
        return new Some($a);
    }

    public static function some(Ta $a): Option<Ta> {
        return new Some($a);
    }

    public static function none(): Option<Ta> {
        return new None();
    }
}

