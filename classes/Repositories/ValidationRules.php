<?php

namespace Andizer\Formizer\Repositories;

use Andizer\Formizer\Validations\Validation;

/**
 * Repository that holds the validations (rules).
 */
class ValidationRules {

	/**
	 * Holds the validation rules.
	 *
	 * @var Validation The validation rules.
	 */
	protected $validations = [];

	/**
	 * Adds a validation rule.
	 *
	 * @param string     $field      The field to add validation for.
	 * @param Validation $validation The validation.
	 */
	public function add( $field, Validation $validation ): void {
		$this->validations[] = [ $field, $validation ];
	}

	/**
	 * Retrieves the validation rules.
	 *
	 * @return Validation[]
	 */
	public function get(): array {
		return $this->validations;
	}
}
