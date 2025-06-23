<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\test;

class TestSimpleCasesTest extends TestCase
{
    /** @test */
    public function se_puede_instanciar_un_test()
    {
        $test = new test();
        $this->assertInstanceOf(test::class, $test);
    }

    /** @test */
    public function el_modelo_test_tiene_la_tabla_correcta()
    {
        $test = new test();
        $this->assertEquals('tests', $test->getTable());
    }

    /** @test */
    public function el_modelo_test_usa_hasfactory()
    {
        $traits = class_uses(test::class);
        $this->assertContains('Illuminate\Database\Eloquent\Factories\HasFactory', $traits);
    }

    /** @test */
    public function el_modelo_puede_asignar_atributos()
    {
        $test = new test(['foo' => 'bar']);
        $this->assertEquals('bar', $test->foo);
    }

    /** @test */
    public function el_modelo_puede_guardar_un_registro_mock()
    {
        $mock = $this->getMockBuilder(test::class)
            ->onlyMethods(['save'])
            ->getMock();
        $mock->expects($this->once())->method('save')->willReturn(true);
        $this->assertTrue($mock->save());
    }

    /** @test */
    public function el_modelo_puede_eliminar_un_registro_mock()
    {
        $mock = $this->getMockBuilder(test::class)
            ->onlyMethods(['delete'])
            ->getMock();
        $mock->expects($this->once())->method('delete')->willReturn(true);
        $this->assertTrue($mock->delete());
    }

    /** @test */
    public function el_modelo_puede_actualizar_un_registro_mock()
    {
        $mock = $this->getMockBuilder(test::class)
            ->onlyMethods(['update'])
            ->getMock();
        $mock->expects($this->once())->method('update')->willReturn(true);
        $this->assertTrue($mock->update([]));
    }

    /** @test */
    public function el_modelo_retorna_array_al_llamar_toArray()
    {
        $test = new test(['foo' => 'bar']);
        $this->assertIsArray($test->toArray());
    }

    /** @test */
    public function el_modelo_retorna_null_si_no_existe_registro_mock()
    {
        $mock = $this->getMockBuilder(test::class)
            ->onlyMethods(['find'])
            ->getMock();
        $mock->expects($this->once())->method('find')->willReturn(null);
        $this->assertNull($mock->find(999));
    }

    /** @test */
    public function el_modelo_puede_serializar_a_json()
    {
        $test = new test(['foo' => 'bar']);
        $json = $test->toJson();
        $this->assertJson($json);
    }

    /** @test */
    public function el_modelo_tiene_fillable_correctos_si_aplica()
    {
        $test = new test();
        $this->assertIsArray($test->getFillable());
    }

    /** @test */
    public function el_modelo_tiene_timestamps_habilitados()
    {
        $test = new test();
        $this->assertTrue($test->timestamps);
    }

    /** @test */
    public function el_modelo_puede_ser_clonado()
    {
        $test = new test(['foo' => 'bar']);
        $clone = clone $test;
        $this->assertEquals($test->foo, $clone->foo);
    }

    /** @test */
    public function el_modelo_puede_ser_convertido_a_string()
    {
        $test = new test(['foo' => 'bar']);
        $this->assertIsString((string) $test);
    }

    /** @test */
    public function el_modelo_puede_ser_convertido_a_array()
    {
        $test = new test(['foo' => 'bar']);
        $this->assertIsArray($test->toArray());
    }

    /** @test */
    public function el_modelo_puede_ser_convertido_a_coleccion()
    {
        $test = new test(['foo' => 'bar']);
        $collection = collect([$test]);
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $collection);
    }

    /** @test */
    public function el_modelo_puede_ser_consultado_por_id_mock()
    {
        $mock = $this->getMockBuilder(test::class)
            ->onlyMethods(['find'])
            ->getMock();
        $mock->expects($this->once())->method('find')->with(1)->willReturn(new test());
        $this->assertInstanceOf(test::class, $mock->find(1));
    }

    /** @test */
    public function el_modelo_puede_ser_consultado_por_atributo_mock()
    {
        $mock = $this->getMockBuilder(test::class)
            ->onlyMethods(['where'])
            ->getMock();
        $mock->expects($this->once())->method('where')->with('foo', 'bar')->willReturnSelf();
        $this->assertInstanceOf(test::class, $mock->where('foo', 'bar'));
    }

    /** @test */
    public function el_modelo_puede_ser_consultado_por_varios_atributos_mock()
    {
        $mock = $this->getMockBuilder(test::class)
            ->onlyMethods(['where'])
            ->getMock();
        $mock->expects($this->once())->method('where')->with(['foo' => 'bar', 'baz' => 'qux'])->willReturnSelf();
        $this->assertInstanceOf(test::class, $mock->where(['foo' => 'bar', 'baz' => 'qux']));
    }

    /** @test */
    public function el_modelo_puede_ser_consultado_por_fecha_mock()
    {
        $mock = $this->getMockBuilder(test::class)
            ->onlyMethods(['whereDate'])
            ->getMock();
        $mock->expects($this->once())->method('whereDate')->with('created_at', '2022-01-01')->willReturnSelf();
        $this->assertInstanceOf(test::class, $mock->whereDate('created_at', '2022-01-01'));
    }

    /** @test */
    public function el_modelo_puede_ser_consultado_por_rango_de_fechas_mock()
    {
        $mock = $this->getMockBuilder(test::class)
            ->onlyMethods(['whereBetween'])
            ->getMock();
        $mock->expects($this->once())->method('whereBetween')->with('created_at', ['2022-01-01', '2022-01-31'])->willReturnSelf();
        $this->assertInstanceOf(test::class, $mock->whereBetween('created_at', ['2022-01-01', '2022-01-31']));
    }

    /** @test */
    public function el_modelo_puede_ser_consultado_por_estado_mock()
    {
        $mock = $this->getMockBuilder(test::class)
            ->onlyMethods(['where'])
            ->getMock();
        $mock->expects($this->once())->method('where')->with('estado', 'activo')->willReturnSelf();
        $this->assertInstanceOf(test::class, $mock->where('estado', 'activo'));
    }

    /** @test */
    public function el_modelo_puede_ser_consultado_por_usuario_mock()
    {
        $mock = $this->getMockBuilder(test::class)
            ->onlyMethods(['where'])
            ->getMock();
        $mock->expects($this->once())->method('where')->with('user_id', 1)->willReturnSelf();
        $this->assertInstanceOf(test::class, $mock->where('user_id', 1));
    }

    /** @test */
    public function el_modelo_puede_ser_consultado_por_relacion_mock()
    {
        $mock = $this->getMockBuilder(test::class)
            ->onlyMethods(['with'])
            ->getMock();
        $mock->expects($this->once())->method('with')->with('relacion')->willReturnSelf();
        $this->assertInstanceOf(test::class, $mock->with('relacion'));
    }

    /** @test */
    public function el_modelo_puede_ser_consultado_por_relacion_inversa_mock()
    {
        $mock = $this->getMockBuilder(test::class)
            ->onlyMethods(['with'])
            ->getMock();
        $mock->expects($this->once())->method('with')->with('relacionInversa')->willReturnSelf();
        $this->assertInstanceOf(test::class, $mock->with('relacionInversa'));
    }
}
