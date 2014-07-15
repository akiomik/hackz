<?hh // strict

namespace Akiomik\Hackz;

abstract class Monad<Ta> extends Applicative<Ta>
{
    abstract public function bind((function(Ta): Monad<Ta>) $f): this;

    /**
     * alias for bind
     */
    public function flatMap((function(Ta): Monad<Ta>) $f): this
    {
        return $this->bind($f);
    }
}

