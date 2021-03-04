<?php

namespace Andizer\Formizer\Tests;

use Andizer\Formizer\Decorations\Decoration;
use Andizer\Formizer\Decorator;
use Andizer\Formizer\Fields\Field;
use Andizer\Formizer\Repositories\Decorations;
use Andizer\Formizer\Repositories\Fields;
use Mockery;

/**
 * Tests the decorator.
 *
 * @coversDefaultClass \Andizer\Formizer\Decorator
 */
class DecoratorTest extends TestCase {


	/**
	 * The instance to test.
	 *
	 * @var Decorator
	 */
	protected $instance;

	/**
	 * The fields dependency.
	 *
	 * @var Mockery\MockInterface|Fields
	 */
	protected $fields;

	/**
	 * The decorations dependency.
	 *
	 * @var Mockery\MockInterface|Decorations
	 */
	protected $decorations;

	/**
	 * Sets the instance to test.
	 *
	 * @before
	 */
	public function setTestInstance(): void {
		$this->fields      = Mockery::mock( Fields::class );
		$this->decorations = Mockery::mock( Decorations::class );
		$this->instance    = new Decorator( $this->decorations, $this->fields );
	}

	/**
	 * Tests the decoration.
	 *
	 * @covers ::__construct
	 * @covers ::decorate
	 * @covers ::applyDecoration
	 */
	public function test_decorate(): void {
		$field      = Mockery::mock( Field::class );
		$decoration = Mockery::mock( Decoration::class );

		$decoration
			->expects( 'decorate' )
			->once()
			->with( $field )
			->andReturn( $field );

		$this->decorations
			->expects( 'get' )
			->once()
			->andReturn( [ $decoration ] );

		$this->fields
			->expects( 'get' )
			->andReturn( [ $field ] );

		$this->instance->decorate();
	}


}
