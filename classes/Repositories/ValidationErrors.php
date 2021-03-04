<?php

namespace Andizer\Formizer\Repositories;

/**
 * Repository that holds the validation errors.
 */
class ValidationErrors {

	/**
	 * The validation errors.
	 *
	 * @var array
	 */
	protected $errors = [];

	/**
	 * Retrieves the list of set errors.
	 *
	 * @return array The set errors.
	 */
	public function get(): array {
		return $this->errors;
	}

	/**
	 * Checks if there are there any errors.
	 *
	 * @return bool True when having errors.
	 */
	public function has(): bool {
		return ! empty( $this->errors );
	}

	/**
	 * Adds an error to the error list.
	 *
	 * @param string $fieldName The field name to add the error for.
	 * @param string $error     The error to add.
	 */
	public function add( $fieldName, $error ): void {
		if ( empty( $this->errors[ $fieldName ] ) ) {
			$errors[ $fieldName ] = [];
		}

		$this->errors[ $fieldName ][] = $error;
	}
}
