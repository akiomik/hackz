<?hh

namespace Akiomik\Hackz;

use \Akiomik\Hackz\Option\Some;
use \Akiomik\Hackz\Option\None;

abstract class Option<Ta>
    implements Functor<Ta>,
               Apply<Ta>,
               Applicative<Ta>,
               Monad<Ta>
{
    use FunctorTrait<Ta>;
    use ApplyTrait<Ta>;
    use ApplicativeTrait<Ta>;
    use MonadTrait<Ta>;

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

