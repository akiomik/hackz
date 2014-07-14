<?hh

namespace Akiomik\Hackz;

interface Apply<Ta>
{
    public function ap<Tb>(Apply<(function(Ta): Tb)> $f): Apply<Tb>;
}

