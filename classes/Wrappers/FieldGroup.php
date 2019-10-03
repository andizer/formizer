<?php

namespace Andizer\Formizer\Wrappers;

use Andizer\Formizer\Fields\Field;
use Andizer\Formizer\Label\Label;

class FieldGroup {

	public $class;

	/**
	 * @var Field
	 */
	protected $field;
	/**
	 * @var Label
	 */
	protected $label;

	/**
	 * FieldGroup constructor.
	 *
	 * @codeCoverageIgnore
	 *
	 * @param Field $field
	 * @param Label $label
	 */
	public function __construct( Field $field, Label $label ) {
		$this->field = $field;
		$this->label = $label;
	}

	/**
	 * Renders the field group.
	 *
	 * @return string
	 */
	public function render(): string {
		$return = '<div class="' . $this->class . '">';
		$return .= $this->label->render();
		$return .= $this->field->render();
		$return .= '</div>';

		return $return;
	}

}
