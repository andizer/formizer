<?php

namespace Andizer\Formizer\Tests\Decorations;

use Andizer\Formizer\Decorations\ClassName;
use Andizer\Formizer\Fields\Field;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Class ButtonTest
 *
 * @coversDefaultClass \Andizer\Formizer\Decorations\ClassName
 */
class ClassNameTest extends TestCase {

	/**
	 * @covers ::decorate
	 */
	public function test_decorate(): void {
		$button        = Mockery::mock( Field::class );
		$button->class = 'classname';

		$instance = new ClassName( 'extra-classname', [ get_class( $button ) ] );
		$button   = $instance->decorate( $button );

		static::assertEquals(
			'classname extra-classname',
			$button->class
		);
	}
}
