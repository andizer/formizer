<?php

namespace Andizer\Formizer\Fields;

class NullField extends Field {

	/**
	 * Renders an empty 'field'.
	 *
	 * @return string The rendered field.
	 */
	public function render(): string {
		return '';
	}

	/**
	 * This object never can have an error.
	 *
	 * @return bool Always false.
	 */
	public function hasError(): bool {
		return false;
	}

}
