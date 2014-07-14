<?hh

namespace Akiomik\Hackz;

interface Functor<Ta>
{
    public function map<Tb>((function(Ta): Tb) $f): Functor<Tb>;

    public static function lift<Tb>((function(Ta): Tb) $f): (function(this): Functor<Tb>);
}

