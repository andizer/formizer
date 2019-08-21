<?php
namespace Andizer\Formizer\Validations;

use Andizer\Formizer\Exception;
use Andizer\Formizer\Fields\Field;

interface Validation {

	/**
	 * Validates the field value.
	 *
	 * @param Field $Field The field to validate.
	 *
	 * @throws Exception Exception when validation is not passed.
	 */
	public function validate( Field $Field ): void;

}
