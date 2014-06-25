<?hh

namespace Hackz\Test;

use \Hackz\Option;

class OptionTest extends \PHPUnit_Framework_TestCase {
    public function setup(): void {
        $this->id = $x ==> $x;
        $this->compose = ($f, $g) ==> ($x ==> $f($g($x)));
    }

    /**
     * `fmap id a` equals `a`
     */
    public function testIdentityF(): void {
        $fa = Option::pure(100);
        $x1 = $fa->map($this->id);
        $x2 = $fa;

        $this->assertEquals(Option::pure(100), $x1);
        $this->assertEquals($x1, $x2);
    }

    /**
     * `fmap f $ fmap g a` equals `fmap (f . g) a`
     */
    public function testAssociativeF(): void {
        $compose = $this->compose;
        $f = $x ==> $x + 2;
        $g = $x ==> $x * 3;
        $fa = Option::pure(100);
        $x1 = $fa->map($g)->map($f);
        $x2 = $fa->map($compose($f, $g));

        $this->assertEquals(Option::pure(302), $x1);
        $this->assertEquals($x1, $x2);
    }

    /**
     * `pure id <*> v` equals `v`
     */
    public function testIdentityA(): void {
        $v = Option::pure(100);
        $x1 = $v->ap(Option::pure($this->id));
        $x2 = $v;

        $this->assertEquals(Option::pure(100), $x1);
        $this->assertEquals($x1, $x2);
    }

    /**
     * `pure (.) <*> u <*> v <*> w` equals `u <*> (v <*> w)`
     */
    public function testCompositionA(): void {
        $compose = $this->compose;
        $a = Option::pure(100);
        $fab = Option::pure($a ==> $a + 1);
        $fbc = Option::pure($b ==> $b * 3);
        $x1 = $a->ap($fab)->ap($fbc);
        $x2 = $a->ap($fab->ap($fbc->ap(Option::pure($bc ==> ($ab ==> $compose($bc, $ab))))));

        $this->assertEquals(Option::pure(303), $x1);
        $this->assertEquals($x1, $x2);
    }

    /**
     * `pure f <*> pure x` equals `pure (f x)`
     */
    public function testHomomorphismA(): void {
        $f = $x ==> $x + 3;
        $x1 = Option::pure(100)->ap(Option::pure($f));
        $x2 = Option::pure($f(100));

        $this->assertEquals(Option::pure(103), $x1);
        $this->assertEquals($x1, $x2);
    }

    /**
     * `u <*> pure y` equals `pure ($ y) <*> u`
     */
    public function testInterchangeA(): void {
        $f = Option::pure($x ==> $x * 3);
        $x1 = Option::pure(100)->ap($f);
        $x2 = $f->ap(Option::pure($f ==> $f(100)));

        $this->assertEquals(Option::pure(300), $x1);
        $this->assertEquals($x1, $x2);
    }

    /**
     * `pure f <*> a` equals `fmap f a`
     */
    public function testFmapA(): void {
        $f = $x ==> $x + 1;
        $x1 = Option::pure(100)->ap(Option::pure($f));
        $x2 = Option::pure(100)->map($f);

        $this->assertEquals(Option::pure(101), $x1);
        $this->assertEquals($x1, $x2);
    }

    /**
     * `return a >>= f` equals `f a`
     */
    public function testLightIdentityM(): void {
        $f = $x ==> Option::pure($x + 10000);
        $x1 = Option::pure(3)->bind($f);
        $x2 = $f(3);

        $this->assertEquals(Option::pure(10003), $x1);
        $this->assertEquals($x1, $x2);
    }

    /**
     * `m >>= return` equals `m`
     */
    public function testRightIdentityM(): void {
        $x1 = Option::pure(4)->bind($x ==> Option::pure($x));
        $x2 = Option::pure(4);

        $this->assertEquals(Option::pure(4), $x1);
        $this->assertEquals($x1, $x2);
    }

    /**
     * `(m >>= f) >>= g` equals `m >>= (\x -> f x >>= g)`
     */
    public function testAssociativeM(): void {
        $x1 = Option::pure(5)
            ->bind($x ==> Option::pure($x + 1))
            ->bind($x ==> Option::pure($x * 100));
        $x2 = Option::pure(5)->bind($x ==>
            Option::pure($x + 1)->bind($y ==>
            Option::pure($y * 100)));

        $this->assertEquals(Option::pure(600), $x1);
        $this->assertEquals($x1, $x2);
    }

    public function testPure(): void {
        $x1 = Option::pure(100);
        $x2 = Option::some(100);
        $this->assertEquals($x1, $x2);
    }

    public function testSomeBindSome(): void {
        $x1 = Option::some(200);
        $x2 = Option::some(100)->bind($x ==> Option::some($x + 100));
        $this->assertEquals($x1, $x2);
    }

    public function testSomeBindNone(): void {
        $x1 = Option::none();
        $x2 = Option::some(100)->bind($x ==> Option::none());
        $this->assertEquals($x1, $x2);
    }

    public function testNoneBindNone(): void {
        $x1 = Option::none();
        $x2 = Option::none()->bind($x ==> Option::none());
        $this->assertEquals($x1, $x2);
    }

    public function testNoneBindSome(): void {
        $x1 = Option::none();
        $x2 = Option::none()->bind($x ==> Option::some(100));
        $this->assertEquals($x1, $x2);
    }
}
