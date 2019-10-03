<?php

namespace Andizer\Formizer\Tests;

use Andizer\Formizer\Decorations\Decoration;
use Andizer\Formizer\Fields\Field;
use Andizer\Formizer\Form;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Class ErrorFieldTest
 * @package Andizer\Formizer\Tests\Wrappers
 *
 * @coversDefaultClass \Andizer\Formizer\Form
 */
class FormTest extends TestCase {

	public function test_applyDecorations(): void {
		$field = Mockery::mock( Field::class )->makePartial();

		$decoration = Mockery::mock( Decoration::class )->makePartial();
		$decoration
			->shouldReceive( 'decorate' )
			->once()
			->with( $field )
			->andReturnUsing( function( Field $field ) {
				$field->value = 'This is a test value';

				return $field;
			} );

		$instance = new Form();
		$instance->registerDecoration( $decoration );
		$instance->addField( $field );
		$instance->applyDecorations();

		$fields = $instance->getFields();
		$field  = reset( $fields );

		$this->assertEquals(  'This is a test value', $field->value );



	}
}
