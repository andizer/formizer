<?php

namespace Andizer\Formizer\Repositories;

use Andizer\Formizer\Fields\Field;
use Andizer\Formizer\Fields\NullField;

/**
 * Repository object for holding the fields.
 *
 * @package Andizer\Formizer\Repositories
 */
class Fields {

	/**
	 * Holds the fields.
	 *
	 * @var Field[]
	 */
	protected $fields = [];

	/**
	 * Adds a field to the form.
	 *
	 * @param Field $field The field to add.
	 */
	public function add( Field $field ): void {
		$this->fields[ $field->getFieldName() ] = $field;
	}

	/**
	 * Retrieves the set fields
	 *
	 * @return Field[] The set fields.
	 */
	public function get(): array {
		return $this->fields;
	}

	/**
	 * Retrieves the field if set, a null field if not.
	 *
	 * @param string $fieldName The field name to get field for.
	 *
	 * @return Field The found field.
	 */
	public function find( $fieldName ): Field {
		if ( empty( $this->fields[ $fieldName ] ) ) {
			return new NullField( '' );
		}

		return $this->fields[ $fieldName ];
	}
}
