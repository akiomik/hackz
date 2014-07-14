<?hh

namespace Akiomik\Hackz;

abstract class Functor<Ta>
{
    abstract public function map<Tb>((function(Ta): Tb) $f): Functor<Tb>;

    public static function lift<Tb>((function(Ta): Tb) $f): (function(this): Functor<Tb>)
    {
        return $x ==> $x->map($f);
    }
}

