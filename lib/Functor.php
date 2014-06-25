<?hh

namespace Akiomik\Hackz;

interface Functor<Ta> {
    public function map<Tb>((function(Ta): Tb) $f): this;

    public static function lift<Tb>((function(Ta): Tb) $f): (function(this): this);
}

