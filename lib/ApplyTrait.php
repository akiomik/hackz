<?hh

namespace Akiomik\Hackz;

trait ApplyTrait<Ta> {
    require implements Functor<Ta>;
    require implements Apply<Ta>;

    abstract public function ap<Tb>(Apply<(function(Ta): Tb)> $f): this;
}

