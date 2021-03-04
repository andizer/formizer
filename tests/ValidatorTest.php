<?php

namespace Andizer\Formizer\Tests;

use Andizer\Formizer\Exception;
use Andizer\Formizer\Fields\Field;
use Andizer\Formizer\Repositories\ValidationRules;
use Andizer\Formizer\Validations\Validation;
use Andizer\Formizer\Validator;
use Andizer\Formizer\Repositories\Fields;
use Mockery;

/**
 * Tests the validator.
 *
 * @coversDefaultClass \Andizer\Formizer\Validator
 */
class ValidatorTest extends TestCase {
	/**
	 * The instance to test.
	 *
	 * @var Validator
	 */
	protected $instance;

	/**
	 * The validation rules dependency.
	 *
	 * @var Mockery\MockInterface|ValidationRules
	 */
	protected $validationRules;

	/**
	 * Sets the instance to test.
	 *
	 * @before
	 */
	public function setTestInstance(): void {
		$this->validationRules  = Mockery::mock( ValidationRules::class );
		$this->instance         = new Validator( $this->validationRules );
	}

	/**
	 * Tests the validate method with a valid outcome.
	 *
	 * @covers ::__construct
	 * @covers ::validate
	 * @covers ::validateField
	 */
	public function test_validate_result_valid(): void {
		$validation = Mockery::mock( Validation::class );

		$this->validationRules
			->expects( 'get' )
			->once()
			->andReturn(
				[
					[ 'field', $validation ],
				]
			);

		$field = Mockery::mock( Field::class );

		$validation
			->expects( 'validate' )
			->with( $field );

		$fields = Mockery::mock( Fields::class );
		$fields
			->expects( 'find' )
			->with( 'field' )
			->andReturn( $field );

		static::assertTrue( $this->instance->validate( $fields ) );
	}

	/**
	 * Tests the validate method with an invalid outcome.
	 *
	 * @covers ::__construct
	 * @covers ::validate
	 * @covers ::validateField
	 */
	public function test_validate_result_invalid(): void {
		$validation = Mockery::mock( Validation::class );

		$this->validationRules
			->expects( 'get' )
			->once()
			->andReturn(
				[
					[ 'field', $validation ],
				]
			);

		$field = Mockery::mock( Field::class );
		$field
			->expects( 'addError' )
			->with( 'Invalid field' );

		$validation
			->expects( 'validate' )
			->with( $field )
			->andThrow( new Exception( 'Invalid field' ) );

		$fields = Mockery::mock( Fields::class );
		$fields
			->expects( 'find' )
			->with( 'field' )
			->andReturn( $field );

		static::assertFalse( $this->instance->validate( $fields ) );
	}
}
