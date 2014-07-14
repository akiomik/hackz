<?hh

namespace Akiomik\Hackz;

abstract class Apply<Ta> extends Functor<Ta>
{
    abstract public function ap<Tb>(Apply<(function(Ta): Tb)> $f): Apply<Tb>;
}

