<?php

namespace Andizer\Formizer\Validations;

use Andizer\Formizer\Exception;
use Andizer\Formizer\Fields\Field;

class MinLength implements Validation {

	/**
	 * @var int The min length.
	 */
	protected $minLength;

	/**
	 * @var string The error message to show.
	 */
	protected $errorMessage = '';

	/**
	 * Min length validation.
	 *
	 * @param int    $minLength    The minimum length.
	 * @param string $errorMessage The error to show.
	 */
	public function __construct( $minLength, $errorMessage ) {
		$this->minLength    = $minLength;
		$this->errorMessage = $errorMessage;
	}

	/**
	 * Validates the field value.
	 *
	 * @param Field $Field The field to validate.
	 *
	 * @throws Exception Exception when validation is not passed.
	 */
	public function validate( Field $Field ): void {
		if ( mb_strlen( $Field->value ) < $this->minLength ) {
			throw new Exception( $this->errorMessage );
		}
	}
}
