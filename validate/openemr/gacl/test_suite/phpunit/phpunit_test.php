<?php

require "phpunit.php";

class SelfTestResult extends TextTestResult
{
    /* Specialize result class for use in self-tests, to handle
       special situation where many tests are expected to fail. */
    public function SelfTestResult()
    {
        $this->TextTestResult();
        echo '<table class="details">';
        echo '<tr><th>Test name</th><th>Result</th><th>Meta-result</th></tr>';
    }

    public function _startTest($test)
    {
        print('<tr><td>');
        if (phpversion() > '4') {
            printf("%s - %s ", get_class($test), $test->name());
        } else {
            printf("%s ", $test->name());
        }
        print('</td>');
        flush();
    }

    public function _endTest($test)
    {
        /* Report both the test result and, for this special situation
           where some tests are expected to fail, a "meta" test result
           which indicates whether the test result matches the
           expected result. */
        $expect_failure = preg_match('/fail/i', $test->name());
        $test_passed = ($test->failed() == 0);

        if ($test->errored()) {
            $outcome = "<span class=\"Error\">ERROR</span>";
        } elseif ($test->failed()) {
            $outcome = "<span class=\"Failure\">FAIL</span>";
        } else {
            $outcome = "<span class=\"Pass\">OK</span>";
        }

        if ($test->errored()) {
            $meta_outcome = '<span class="Unknown">unknown</span>';
        } else {
            $meta_outcome = ($expect_failure xor $test_passed)
            ? '<span class="Expected">as expected</span>'
            : '<span class="Unexpected">UNEXPECTED</span>';
        }

        printf("<td>$outcome</td><td>$meta_outcome</td></tr>\n");
        flush();
    }
}


class TestFixture extends TestCase
{
    public function TestFixture($name)
    {
        $this->TestCase($name);
    }

    public function setUp()
    {
        /* put any common setup here */
        $this->intVal = 1;
        $this->strVal = 'foo';
    }

    public function testFail1()
    {
        $this->assert($this->intVal == 0, "1 == 0");
    }

    public function testFail2()
    {
        $this->assert($this->strVal == 'bar');
    }

    public function testPass1()
    {
        $this->assert($this->intVal == 1);
    }
}

$suite = new TestSuite();
$suite->addTest(new TestFixture("testFail1"));
$suite->addTest(new TestFixture("testFail2"));
$suite->addTest(new TestFixture("testPass1"));
//$suite->addTest(new TestFixture("testNotExistFail"));


class Fixture2 extends TestCase
{
    public function Fixture2($name)
    {
        $this->TestCase($name);
    }
    public function setUp()
    {
        $this->str1 = 'foo';
        $this->str2 = 'bar';
    }
    public function runTest()
    {
        $this->testStrNotEqual();
        $this->testStrAppend();
    }
    public function testStrNotEqual()
    {
        $this->assert($this->str1 == $this->str2, 'str equal');
    }
    public function testStrAppend()
    {
        $this->assertEquals($this->str1 . 'bar', 'foobars', 'str append');
    }
}

$suite->addTest(new Fixture2("Fail3"));


class TestPass2 extends TestFixture
{
    public function TestPass2($name)
    {
        $this->TestFixture($name);
    }
    public function runTest()
    {
        $this->assertEquals($this->strVal . 'x', $this->strVal . 'x');
        $this->assertEquals($this->strVal . 'x', $this->strVal . 'y');
        $this->assertEquals(1, 0);
        $this->assertEquals(1, "1", 'equals int and str');
    }
}
$suite->addTest(new TestPass2("Fail4"));


class MoreTesterTests extends TestCase
{
    public function MoreTesterTests($name)
    {
        $this->TestCase($name);
    }

    public function testRegexpPass()
    {
        $this->assertRegexp('/fo+ba[^a-m]/', 'foobar');
    }

    public function testRegexpFail()
    {
        $this->assertRegexp('/fo+ba[^m-z]/', 'foobar');
    }

    public function testRegexpFailWithMessage()
    {
        $this->assertRegexp('/fo+ba[^m-z]/', 'foobar', "This is the message");
    }
}
$suite->addTest(new TestSuite("MoreTesterTests"));

class ManyFailingTests extends TestCase
{
    public function ManyFailingTests($name)
    {
        $this->TestCase($name);
    }

    public function testPass1()
    {
        $this->assertEquals(0, 0);
    }
    public function testPass2()
    {
        $this->assertEquals(0, 0);
    }
    public function testFail1()
    {
        $this->assertEquals(1, 0);
    }
    public function testFail2()
    {
        $this->assertEquals(1, 0);
    }
    public function testFail3()
    {
        $this->assertEquals(1, 0);
    }
    public function testFail4()
    {
        $this->assertEquals(1, 0);
    }
    public function testFail5()
    {
        $this->assertEquals(1, 0);
    }
    public function testFail6()
    {
        $this->assertEquals(1, 0);
    }
    public function testPass3()
    {
        $this->assertEquals(0, 0);
    }
    public function testFail7()
    {
        $this->assertEquals(1, 0);
    }
    public function testPass4()
    {
        $this->assertEquals(0, 0);
    }
    public function testFail8()
    {
        $this->assertEquals(1, 0);
    }
    public function testPass5()
    {
        $this->assertEquals(0, 0);
    }
    public function testPass6()
    {
        $this->assertEquals(0, 0);
    }
    public function testFail9()
    {
        $this->assertEquals(1, 0);
    }
    public function testPass7()
    {
        $this->assertEquals(0, 0);
    }
    public function testPass8()
    {
        $this->assertEquals(0, 0);
    }
}

$suite->addTest(new TestSuite("ManyFailingTests"));

class DummyClass1
{
    public $fX;
}

class DummyClass2
{
    public $fX;
    public $fY;
    public function DummyClass2($x = "", $y = "")
    {
        $this->fX = $x;
        $this->fY = $y;
    }
    public function equals($another)
    {
        return $another->fX == $this->fX;
    }
    public function toString()
    {
        return sprintf("DummyClass2(%s, %s)", $this->fX, $this->fY);
    }
}

class AssertEqualsTests extends TestCase
{
    public function AssertEqualsTests($name)
    {
        $this->TestCase($name);
    }

    public function testDiffTypesFail()
    {
        $this->assertEquals(0, "");
    }
    public function testMultiLinePass()
    {
        $str1 = "line1\nline2\nline3";
        $str2 = "line1\nline2\nline3";
        $this->assertEqualsMultilineStrings($str1, $str2);
    }
    public function testMultiLineFail()
    {
        $str1 = "line1\nline2\nline3";
        $str2 = "line1\nline2 modified\nline3";
        $this->assertEqualsMultilineStrings($str1, $str2);
    }
    public function testMultiLineFail2()
    {
        $str1 = "line1\nline2\nline3";
        $str2 = "line1\nline2\nline3\nline4";
        $this->assertEqualsMultilineStrings($str1, $str2);
    }
}
$suite->addTest(new TestSuite("AssertEqualsTests"));

class AssertEqualsPhp3ErrorTests extends TestCase
{
    /* These tests create an ERROR in PHP3 and work as expected in PHP4. */
    public function AssertEqualsPhp3ErrorTests($name)
    {
        $this->TestCase($name);
    }
    public function testDiffClassFail()
    {
        $this->assertEquals(new DummyClass1(), new DummyClass2());
    }
    public function testSameClassPass()
    {
        $this->assertEquals(new DummyClass1(), new DummyClass1());
    }
    public function testSameClassFail()
    {
        $dummy1 = new DummyClass1();
        $dummy2 = new DummyClass1();
        $dummy1->fX = 1;
        $dummy2->fX = 2;
        $this->assertEquals($dummy1, $dummy2);
    }
    public function testSameClassEqualsFail()
    {
        $dummy1 = new DummyClass2(3);
        $dummy2 = new DummyClass2(4);
        $this->assertEquals($dummy1, $dummy2);
    }
    public function testSameClassEqualsPass()
    {
        $dummy1 = new DummyClass2(5, 6);
        $dummy2 = new DummyClass2(5, 7);
        $this->assertEquals($dummy1, $dummy2);
    }
}
$suite->addTest(new TestSuite("AssertEqualsPhp3ErrorTests"));

if (phpversion() >= '4') {
    class AssertEqualsTests4 extends TestCase
    {
        /* these tests only make sense starting with PHP4 */
        public function AssertEqualsTests($name)
        {
            $this->TestCase($name);
        }

        public function testNullFail()
        {
            $this->assertEquals(0, null);
        }
        public function testNullPass()
        {
            $this->assertEquals(null, null);
        }
        public function testArrayValuesPass1()
        {
            $a1 = array('first' => 10, 'second' => 20);
            $a2 = array('first' => 10, 'second' => 20);
            $this->assertEquals($a1, $a2);
        }
        public function testArrayValuesFail1()
        {
            $a1 = array('first' => 10, 'second' => 20);
            $a2 = array('first' => 10, 'second' => 22);
            $this->assertEquals($a1, $a2);
        }
    }
    $suite->addTest(new TestSuite("AssertEqualsTests4"));

    class TestClassNameStartingWithTest extends TestCase
    {
        public function TestClassNameStartingWithTest($name)
        {
            $this->TestCase($name);
        }
        public function testWhateverPass()
        {
            $this->assert(true);
        }
    }
    $suite->addTest(new TestSuite("TestClassNameStartingWithTest"));
}


// $suite now consists of phpUnit self-test suite
