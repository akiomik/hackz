<?hh

namespace Akiomik\Hackz;

trait FunctorTrait<Ta>
{
    require implements Functor<Ta>;

    abstract public function map<Tb>((function(Ta): Tb) $f): this;

    public static function lift<Tb>((function(Ta): Tb) $f): (function(this): this)
    {
        return $x ==> $x->map($f);
    }
}

