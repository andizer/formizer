<?php

namespace Andizer\Formizer\Tests\Decorations;

use Andizer\Formizer\Decorations\ClassName;
use Andizer\Formizer\Fields\Button;
use PHPUnit\Framework\TestCase;

/**
 * Class ButtonTest
 * @package Andizer\Formizer\Tests
 *
 * @coversDefaultClass \Andizer\Formizer\Fields\Button
 */
class ClassNameTest extends TestCase {

	/**
	 * @covers ::render
	 */
	public function test_render(): void {
		$instance = new ClassName( 'extra-classname', [ Button::class ] );
		$button   = new Button( 'button', [ 'class' => 'classname' ] );

		$button = $instance->decorate( $button );

		$this->assertEquals(
			'classname extra-classname',
			$button->class
		);
	}
}
