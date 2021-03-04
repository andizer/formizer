<?php

namespace Andizer\Formizer;

use Andizer\Formizer\Fields\Field;
use Andizer\Formizer\Repositories\Fields;
use Andizer\Formizer\Repositories\ValidationRules;
use Andizer\Formizer\Validations\Validation;

class Validator {

	/**
	 * Holds the repository with validation rules.
	 *
	 * @var ValidationRules
	 */
	protected $validationRules;

	/**
	 * Validator constructor.
	 *
	 * @param ValidationRules $validationRules
	 */
	public function __construct( ValidationRules $validationRules ) {
		$this->validationRules  = $validationRules;
	}

	/**
	 * Validates the fields.
	 *
	 * @param Fields $fields Repository containing the fields.
	 *
	 * @return bool The validation result.
	 */
	public function validate( Fields $fields ): bool {
		$results = [];
		foreach ( $this->validationRules->get() as [ $fieldName, $validation ] ) {
			$results[] = $this->validateField( $validation, $fields->find( $fieldName ) );
		}

		return ! in_array( false, array_unique( $results ), true );
	}

	/**
	 * Validates a single form field.
	 *
	 * @param Validation $validation The validation to run.
	 * @param Field      $field      The field to validate.
	 *
	 * @return bool
	 */
	protected function validateField( Validation $validation, Field $field ): bool {
		try {
			$validation->validate( $field );

			return true;
		}
		catch( Exception $exception ) {
			$field->addError( $exception->getMessage() );

			return false;
		}
	}
}
