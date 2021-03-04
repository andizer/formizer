<?php

namespace Andizer\Formizer\Tests\Repositories;

use Andizer\Formizer\Fields\Field;
use Andizer\Formizer\Fields\NullField;
use Andizer\Formizer\Repositories\Fields;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Tests the fields repository.
 *
 * @coversDefaultClass \Andizer\Formizer\Repositories\Fields
 */
class FieldsTest extends TestCase {

	/**
	 * The instance to test.
	 *
	 * @var Fields
	 */
	protected $instance;

	/**
	 * Sets the instance to test.
	 *
	 * @before
	 */
	public function setTestInstance(): void {
		$this->instance = new Fields();
	}

	/**
	 * Tests the addition of a field.
	 *
	 * @covers ::add
	 */
	public function test_add(): void {
		$field = Mockery::mock( Field::class );
		$field
			->expects( 'getFieldName' )
			->once()
			->andReturn( 'field' );


		$this->instance->add( $field );

		static::assertEquals(
			[
				'field' => $field
			],
			$this->instance->get()
		);
	}

	/**
	 * Tests the retrieval of the set fields.
	 *
	 * @covers ::get
	 */
	public function test_get(): void {
		static::assertEquals(
			[],
			$this->instance->get()
		);
	}

	/**
	 * Tests the search of a set field
	 *
	 * @covers ::find
	 */
	public function test_find(): void {
		$field = Mockery::mock( Field::class );
		$field
			->expects( 'getFieldName' )
			->once()
			->andReturn( 'field' );

		$this->instance->add( $field );

		static::assertEquals(
			$field,
			$this->instance->find( 'field' )
		);
	}

	/**
	 * Tests the search of a field that isn't added (yet).
	 *
	 * @covers ::find
	 */
	public function test_find_nothing_found(): void {
		static::assertInstanceOf(
			NullField::class,
			$this->instance->find( 'non-field' )
		);
	}
}
