<?php

namespace Andizer\Formizer\Tests\Repositories;

use Andizer\Formizer\Repositories\ValidationErrors;
use Andizer\Formizer\Validations\Validation;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Tests the validation rules repository.
 *
 * @coversDefaultClass \Andizer\Formizer\Repositories\ValidationErrors
 */
class ValidationErrorsTest extends TestCase {

	/**
	 * The instance to test.
	 *
	 * @var ValidationErrors
	 */
	protected $instance;

	/**
	 * Sets the instance to test.
	 *
	 * @before
	 */
	public function setTestInstance(): void {
		$this->instance = new ValidationErrors();
	}

	/**
	 * Tests the addition of a validation error.
	 *
	 * @covers ::add
	 */
	public function test_add(): void {
		$this->instance->add( 'field', 'error' );

		static::assertEquals(
			[
				'field' => [ 'error' ]
			],
			$this->instance->get()
		);
	}

	/**
	 * Tests the if there are errors.
	 *
	 * @covers ::has
	 */
	public function test_has_with_no_errors_set(): void {
		static::assertFalse( $this->instance->has() );
	}

	/**
	 * Tests the if there are errors.
	 *
	 * @covers ::has
	 */
	public function test_has_with_errors_set(): void {
		$this->instance->add( 'field', 'error' );

		static::assertTrue( $this->instance->has() );
	}

	/**
	 * Tests the retrieval of the errors.
	 *
	 * @covers ::get
	 */
	public function test_get(): void {
		static::assertEquals(
			[],
			$this->instance->get()
		);
	}
}
