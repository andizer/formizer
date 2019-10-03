<?php

namespace Andizer\Formizer\Decorations;

use Andizer\Formizer\Fields\Field;

class SetValue implements Decoration {

	/**
	 * @var array
	 */
	protected $values;

	/**
	 * SetValue constructor.
	 *
	 * @param array $values
	 */
	public function __construct( array $values ) {
		$this->values = $values;
	}

	/**
	 * @param Field $field
	 *
	 * @return Field
	 */
	public function decorate( Field $field ): Field {
		$field->value = $values[ $field->getFieldName() ] ?? '';

		return $field;
	}
}
