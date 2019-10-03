<?php

namespace Andizer\Formizer\Wrappers;

use Andizer\Formizer\Fields\Field;

class ErrorField extends Field {

	/**
	 * @var Field
	 */
	protected $field;

	/**
	 * @var
	 */
	protected $error;

	/**
	 * ErrorField constructor.
	 *
	 * @codeCoverageIgnore
	 *
	 * @param Field $field
	 */
	public function __construct( Field $field ) {
		parent::__construct( $field->getFieldName() );

		$this->field = $field;
	}

	/**
	 * Sets the error.
	 * @param $error
	 */
	public function setError( $error ): void {
		$this->error = $error;
	}

	/**
	 * Renders the field.
	 *
	 * @return string The rendered field.
	 */
	public function render(): string {
		$return  = $this->field->render();
		$return .= $this->error;

		return $return;
	}
}
