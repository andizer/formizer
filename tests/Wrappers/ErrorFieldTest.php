<?php

namespace Andizer\Formizer\Tests\Wrappers;

use Andizer\Formizer\Fields\Field;
use Andizer\Formizer\Fields\Input;
use Andizer\Formizer\Wrappers\ErrorField;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Class ErrorFieldTest
 * @package Andizer\Formizer\Tests\Wrappers
 *
 * @coversDefaultClass \Andizer\Formizer\Wrappers\ErrorField
 */
class ErrorFieldTest extends TestCase {

	/**
	 * @var Field|Mockery\MockInterface
	 */
	protected $field;

	public function setUp(): void {
		parent::setUp();

		$this->field = Mockery::mock( Field::class )->makePartial();
	}

	/**
	 * @covers ::render
	 */
	public function test_render_with_no_set_error(): void {
		$this->field
			->shouldReceive( 'render' )
			->once()
			->andReturn( '' );

		$instance = new ErrorField( $this->field );

		$this->assertEquals( '', $instance->render() );
	}
	/**
	 * @covers ::render
	 * @covers ::setError
	 */
	public function test_render_with_error(): void {
		$field = Mockery::mock( Field::class )
            ->makePartial();

		$field
			->shouldReceive( 'render' )
			->once()
			->andReturn( '' );

		$instance = new ErrorField( $field );
		$instance->setError( '<span>Error message</span>' );

		$this->assertEquals( '<span>Error message</span>', $instance->render() );
	}


}
