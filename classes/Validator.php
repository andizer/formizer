<?php

namespace Andizer\Formizer\Form;

use Andizer\Formizer\Fields\Field;
use Andizer\Formizer\Validations\Validation;

class Validator {

	/**
	 * @var array The validations.
	 */
	protected $validations = [];

	/**
	 * @var array The validation errors.
	 */
	protected $errors = [];

	/**
	 * Adds a validation.
	 *
	 * @param string     $field      The field to add validation for.
	 * @param Validation $validation The validation.
	 */
	public function addValidation( $field, Validation $validation ): void {
		$this->validations[] = [ $field, $validation ];
	}

	/**
	 * Validates the fields.
	 *
	 * @param Form $form The form to validate.
	 */
	public function validate( Form $form ): void {
		/** @var Validation $validation */
		foreach ( $this->validations as [ $fieldName, $validation ] ) {
			$this->validateField( $validation, $form->getField( $fieldName ) );
		}
	}

	/**
	 * Retrieves the list of set errors.
	 *
	 * @return array The set errors.
	 */
	public function getErrors(): array {
		return $this->errors;
	}

	/**
	 * Checks if there are there any errors.
	 *
	 * @return bool True when having errors.
	 */
	public function hasErrors(): bool {
		return ! empty( $this->errors );
	}

	/**
	 * Validates a single form field.
	 *
	 * @param Validation $validation The validation to run.
	 * @param Field      $field      The field to validate.
	 */
	protected function validateField( Validation $validation, Field $field ): void {
		try {
			$validation->validate( $field );
		}
		catch( Exception $exception ) {
			$this->addError( $field->getFieldName(), $exception->getMessage() );
		}
	}

	/**
	 * Adds an error to the error list.
	 *
	 * @param string $fieldName The field name to add the error for.
	 * @param string $error     The error to add.
	 */
	protected function addError( $fieldName, $error ): void {
		if ( empty( $this->errors[ $fieldName ] ) ) {
			$errors[ $fieldName ] = [];
		}

		$this->errors[ $fieldName ][] = $error;
	}

}
