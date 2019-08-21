<?php

namespace Andizer\Formizer\Fields;

/**
 * @property string type The field type, for example: text.
 */
class Input extends Field {

	/**
	 * Renders the input field.
	 * @return string
	 */
	public function render(): string {
		return sprintf(
			'<input id="%1$s" name="%2$s" value="%3$s" type="%4$s" class="%6$s" placeholder="%5$s" >',
			$this->id,
			$this->getFieldName(),
			$this->value,
			$this->type,
			$this->placeholder,
			$this->class
		);
	}

	/**
	 * Overrides the parent methods.
	 *
	 * @return array The defaults.
	 */
	protected function getDefaults(): array {
		return [
			'type' => 'text',
		];
	}

}
