<?php

namespace Andizer\Formizer\Tests\Wrappers;

use Andizer\Formizer\Fields\Field;
use Andizer\Formizer\Label\Label;
use Andizer\Formizer\Wrappers\FieldGroup;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Class ErrorFieldTest
 * @package Andizer\Formizer\Tests\Wrappers
 *
 * @coversDefaultClass \Andizer\Formizer\Wrappers\FieldGroup
 */
class FieldGroupTest extends TestCase {

	/**
	 * @var Field|Mockery\MockInterface
	 */
	protected $field;

	/**
	 * @var Label|Mockery\MockInterface
	 */
	protected $label;

	public function setUp(): void {
		parent::setUp();

		$this->field = Mockery::mock( Field::class )->makePartial();
		$this->label = Mockery::mock( Label::class )->makePartial();
	}

	/**
	 * @covers ::render
	 */
	public function test_render(): void {
		$this->field
			->shouldReceive( 'render' )
			->once()
			->andReturn( '[field]' );

		$this->label
			->shouldReceive( 'render' )
			->once()
			->andReturn( '[label]' );

		$instance = new FieldGroup( $this->field, $this->label );
		$instance->class = 'fieldgroup';

		$this->assertEquals(
			'<div class="fieldgroup">[label][field]</div>',
			$instance->render() );
	}

}
