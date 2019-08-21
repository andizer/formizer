<?php

namespace Andizer\Formizer\Validations;

use Andizer\Formizer\Exception;
use Andizer\Formizer\Fields\Field;

class EmailAddress implements Validation {

	/**
	 * @var string The error message to show.
	 */
	protected $errorMessage = '';

	/**
	 * Emailaddress validation.
	 *
	 * @param string $errorMessage The error to show.
	 */
	public function __construct( $errorMessage ) {
		$this->errorMessage = $errorMessage;
	}

	/**
	 * Validates the field value.
	 *
	 * @param Field $Field The field to validate.
	 *
	 * @throws Exception Exception when validation is not passed.
	 */
	public function validate( Field $Field ) : void {
		if ( ! filter_var( $Field->value, FILTER_VALIDATE_EMAIL ) ) {
			throw new Exception( $this->errorMessage );
		}
	}
}
