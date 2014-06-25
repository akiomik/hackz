<?hh

namespace Hackz\Option;

use \Hackz\Option;
use \Hackz\Applicative;

final class None<Ta> extends Option<Ta> {
    public function map<Tb>((function(Ta): Tb) $f): Option<Ta> {
       return $this;
    }

    public function bind<Tb>((function(Ta): Option<Ta>) $f): Option<Ta> {
        return $this;
    }

    public function ap<Tb>(Applicative<(function(Ta): Tb)> $f): Applicative<Tb> {
        return $this;
    }
}

