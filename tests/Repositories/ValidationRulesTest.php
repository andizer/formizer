<?php

namespace Andizer\Formizer\Tests\Repositories;

use Andizer\Formizer\Repositories\ValidationRules;
use Andizer\Formizer\Validations\Validation;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Tests the validation rules repository.
 *
 * @coversDefaultClass \Andizer\Formizer\Repositories\ValidationRules
 */
class ValidationRulesTest extends TestCase {

	/**
	 * The instance to test.
	 *
	 * @var ValidationRules
	 */
	protected $instance;

	/**
	 * Sets the instance to test.
	 *
	 * @before
	 */
	public function setTestInstance(): void {
		$this->instance = new ValidationRules();
	}

	/**
	 * Tests the addition of a validation rule.
	 *
	 * @covers ::add
	 */
	public function test_add(): void {
		$validation = Mockery::mock( Validation::class );

		$this->instance->add( 'field', $validation );

		static::assertEquals(
			[
				[ 'field', $validation ]
			],
			$this->instance->get()
		);
	}

	/**
	 * Tests the retrieval of the set validations.
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
