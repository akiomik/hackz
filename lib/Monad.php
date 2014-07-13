<?hh

namespace Akiomik\Hackz;

interface Monad<Ta>
{
    public function bind((function(Ta): Monad<Ta>) $f): this;

    public function flatMap((function(Ta): Monad<Ta>) $f): this;
}

