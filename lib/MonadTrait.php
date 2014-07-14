<?hh

namespace Akiomik\Hackz;

trait MonadTrait<Ta>
{
    require implements Functor<Ta>;
    require implements Applicative<Ta>;
    require implements Monad<Ta>;

    abstract public function bind((function(Ta): Monad<Ta>) $f): this;

    /**
     * alias for bind
     */
    public function flatMap((function(Ta): Monad<Ta>) $f): this
    {
        return $this->bind($f);
    }
}

