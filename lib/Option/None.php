<?hh // strict

namespace Akiomik\Hackz\Option;

use \Akiomik\Hackz\Option;
use \Akiomik\Hackz\Apply;
use \Akiomik\Hackz\Monad;

final class None<Ta> extends Option<Ta>
{
    public function map<Tb>((function(Ta): Tb) $f): None<Tb>
    {
        return $this;
    }

    public function ap<Tb>(Apply<(function(Ta): Tb)> $f): None<Tb>
    {
        return $this;
    }

    public function bind((function(Ta): Monad<Ta>) $f): this
    {
        return $this;
    }
}

