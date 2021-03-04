<?php

namespace Andizer\Formizer\Tests\Repositories;

use Andizer\Formizer\Decorations\Decoration;
use Andizer\Formizer\Repositories\Decorations;
use PHPUnit\Framework\TestCase;

/**
 * Tests the decorations repository.
 *
 * @coversDefaultClass \Andizer\Formizer\Repositories\Decorations
 */
class DecorationsTest extends TestCase {

	/**
	 * The instance to test.
	 *
	 * @var Decorations
	 */
	protected $instance;

	/**
	 * Sets the instance to test.
	 *
	 * @before
	 */
	public function setTestInstance(): void {
		$this->instance = new Decorations();
	}

	/**
	 * Tests the addition of a decorations.
	 *
	 * @covers ::add
	 */
	public function test_add(): void {
		$decoration = \Mockery::mock( Decoration::class );

		$this->instance->add( $decoration );

		static::assertEquals(
			[
				$decoration
			],
			$this->instance->get()
		);
	}

	/**
	 * Tests the retrieval of the set decorations.
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
