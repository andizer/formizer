<?php
namespace Andizer\Formizer\Form\Validations;

use Andizer\Formizer\Form\Exception;
use Andizer\Formizer\Form\Fields\Field;

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
