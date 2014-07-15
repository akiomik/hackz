<?hh // strict

namespace Akiomik\Hackz\Option;

use \Akiomik\Hackz\Option;
use \Akiomik\Hackz\Apply;
use \Akiomik\Hackz\Monad;

final class Some<Ta> extends Option<Ta>
{
    public function __construct(private Ta $x)
    {
    }

    public function map<Tb>((function(Ta): Tb) $f): Some<Tb>
    {
       return new static($f($this->x));
    }

    public function ap<Tb>(Apply<(function(Ta): Tb)> $f): Some<Tb>
    {
        return $f->map($ff ==> $ff($this->x));
    }

    public function bind((function(Ta): Monad<Ta>) $f): this
    {
        return $f($this->x);
    }
}

