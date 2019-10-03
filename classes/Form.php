<?php

namespace Andizer\Formizer;

use Andizer\Formizer\Decorations\Decoration;
use Andizer\Formizer\Fields\Field;
use Andizer\Formizer\Fields\NullField;

class Form {

	/**
	 * @var Field[] The form fields.
	 */
	protected $fields = [];

	/**
	 * @var Validator The validator object.
	 */
	protected $validator;

	/**
	 * @var Decoration[]
	 */
	protected $decorations = [];


	/**
	 * Adds a field to the form.
	 *
	 * @param Field $field The field to add.
	 */
	public function addField( Field $field ): void {
		$this->fields[ $field->getFieldName() ] = $field;
	}

	/**
	 * Retrieves the field if set, a null field if not.
	 *
	 * @param string $fieldName The field name to get field for.
	 *
	 * @return Field The found field.
	 */
	public function getField( $fieldName ): Field {
		if ( empty( $this->fields[ $fieldName ] ) ) {
			return new NullField( null );
		}

		return $this->fields[ $fieldName ];
	}

	/**
	 * Retrieves the set fields
	 *
	 * @return Field[] The set fields.
	 */
	public function getFields( ): array {
		return $this->fields;
	}

	/**
	 * Sets the field values.
	 *
	 * These values can be passed by for example the $_POST.
	 *
	 * @param array $values The (posted) values to set.
	 */
	public function setValues( array $values ): void {
		foreach( $this->fields as $field ) {
			$field->value = $values[ $field->getFieldName() ] ?? '';
		}
	}
	/**
	 * Registers a decoration.
	 *
	 * @param Decoration $decoration
	 */
	public function registerDecoration( Decoration $decoration ): void {
		$this->decorations[] = $decoration;
	}

	/**
	 * Applies the registered decorations to the set fields.
	 */
	public function applyDecorations(): void {
		array_map( [ $this, 'applyDecoration' ], $this->decorations );
	}

	/**
	 * Applies the decoration on the set fields.
	 *
	 * @param Decoration $decoration
	 */
	public function applyDecoration( Decoration $decoration ): void {
		array_map( [ $decoration, 'decorate' ], $this->fields );
	}



}
