<?hh

namespace Akiomik\Hackz\Option;

use \Akiomik\Hackz\Option;
use \Akiomik\Hackz\Apply;

final class Some<Ta> extends Option<Ta> {
    public function __construct(private Ta $x) {}

    public function map<Tb>((function(Ta): Tb) $f): Option<Ta> {
       return new Some($f($this->x));
    }

    public function ap<Tb>(Apply<(function(Ta): Tb)> $f): Apply<Tb> {
        return $f->map($ff ==> $ff($this->x));
    }

    public function bind<Tb>((function(Ta): Option<Ta>) $f): Option<Ta> {
        return $f($this->x);
    }
}

