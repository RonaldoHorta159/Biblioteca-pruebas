<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase
{
    /**
     * Colección de pruebas sencillas para demostrar afirmaciones básicas.
     * No ejercitan la lógica de la aplicación, solo sirven como ejemplos
     * de pruebas de caja blanca.
     */

    public function test_case_01()
    {
        $this->assertTrue(true);
    }

    public function test_case_02()
    {
        $this->assertEquals(2, 1 + 1);
    }

    public function test_case_03()
    {
        $this->assertFalse(false);
    }

    public function test_case_04()
    {
        $this->assertSame('a', strtolower('A'));
    }

    public function test_case_05()
    {
        $this->assertContains(3, [1, 2, 3]);
    }

    public function test_case_06()
    {
        $this->assertGreaterThan(0, strlen('test'));
    }

    public function test_case_07()
    {
        $this->assertIsArray([]);
    }

    public function test_case_08()
    {
        $this->assertStringContainsString('bar', 'foobar');
    }

    public function test_case_09()
    {
        $this->assertCount(3, [1, 2, 3]);
    }

    public function test_case_10()
    {
        $this->assertTrue(in_array('x', ['x', 'y', 'z']));
    }

    public function test_case_11()
    {
        $this->assertSame(5, max(2, 5, 1));
    }

    public function test_case_12()
    {
        $this->assertNotEmpty('hello');
    }

    public function test_case_13()
    {
        $this->assertLessThan(10, 5);
    }

    public function test_case_14()
    {
        $this->assertIsString('Laravel');
    }

    public function test_case_15()
    {
        $this->assertEqualsCanonicalizing([1,2,3], [3,2,1]);
    }

    public function test_case_16()
    {
        $this->assertEqualsWithDelta(3.14, 3.1415, 0.01);
    }

    public function test_case_17()
    {
        $this->assertTrue(is_numeric('123'));
    }

    public function test_case_18()
    {
        $this->assertTrue(is_null(null));
    }

    public function test_case_19()
    {
        $this->assertTrue(ctype_alpha('abc'));
    }

    public function test_case_20()
    {
        $this->assertEquals('Hello World', trim(' Hello World '));
    }

    public function test_case_21()
    {
        $this->assertIsInt(42);
    }

    public function test_case_22()
    {
        $this->assertSame('foo', substr('foobar', 0, 3));
    }

    public function test_case_23()
    {
        $this->assertGreaterThanOrEqual(10, 10);
    }

    public function test_case_24()
    {
        $this->assertEquals([1 => 'a', 2 => 'b'], [1 => 'a', 2 => 'b']);
    }

    public function test_case_25()
    {
        $this->assertTrue(is_array(explode(',', 'a,b')));
    }

    public function test_case_26()
    {
        $this->assertEmpty([]);
    }

    public function test_case_27()
    {
        $this->assertNotEquals(1, 2);
    }

    public function test_case_28()
    {
        $this->assertFalse(in_array('d', ['a','b','c']));
    }

    public function test_case_29()
    {
        $this->assertSameSize([1,2], ['a','b']);
    }

    public function test_case_30()
    {
        $this->assertTrue(is_bool(false));
    }

    public function test_case_31()
    {
        $this->assertTrue(class_exists(TestCase::class));
    }

    public function test_case_32()
    {
        $this->assertTrue(method_exists($this, 'test_case_32'));
    }

    public function test_case_33()
    {
        $this->assertNotSame('foo', 'bar');
    }

    public function test_case_34()
    {
        $this->assertContainsOnly('int', [1, 2, 3]);
    }

    public function test_case_35()
    {
        $this->assertGreaterThan(99, 100);
    }

    public function test_case_36()
    {
        $this->assertStringStartsWith('foo', 'foobar');
    }

    public function test_case_37()
    {
        $this->assertStringEndsWith('bar', 'foobar');
    }

    public function test_case_38()
    {
        $this->assertTrue(is_dir(__DIR__));
    }

    public function test_case_39()
    {
        $this->assertFileExists(__FILE__);
    }

    public function test_case_40()
    {
        $this->assertMatchesRegularExpression('/^foo/', 'foobar');
    }

    public function test_case_41()
    {
        $this->assertTrue(is_readable(__FILE__));
    }

    public function test_case_42()
    {
        $this->assertTrue(is_writable(sys_get_temp_dir()));
    }

    public function test_case_43()
    {
        $this->assertLessThanOrEqual(5, 5);
    }

    public function test_case_44()
    {
        $this->assertSame('bar', str_replace('foo', 'bar', 'foo'));
    }

    public function test_case_45()
    {
        $this->assertEquals(0, strpos('hello', 'h'));
    }

    public function test_case_46()
    {
        $this->assertIsFloat(1.5);
    }

    public function test_case_47()
    {
        $this->assertIsNumeric('42');
    }

    public function test_case_48()
    {
        $this->assertDirectoryExists(__DIR__);
    }

    public function test_case_49()
    {
        $this->assertContains('b', ['a', 'b', 'c']);
    }

    public function test_case_50()
    {
        $this->assertEquals('abc', implode('', ['a','b','c']));
    }
}

