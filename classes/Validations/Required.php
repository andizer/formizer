<?php
namespace Andizer\Formizer\Validations;

use Andizer\Formizer\Exception;
use Andizer\Formizer\Fields\Field;

class Required implements Validation {

	/**
	 * @var string The error message to show.
	 */
	protected $errorMessage = '';

	/**
	 * Required validation.
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
	public function validate( Field $Field ): void {
		if ( $Field->value === '' ) {
			throw new Exception( $this->errorMessage );
		}
	}

}
