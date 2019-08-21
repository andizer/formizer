<?php

namespace Andizer\Formizer\Fields;

class Button extends Field {

	/**
	 * Renders the button field.
	 *
	 * @return string The rendered button.
	 */
	public function render(): string {
		return sprintf(
			'<button id="%1$s" class="%3$s">%2$s</button>',
			$this->id,
			$this->value,
			$this->class
		);
	}

}
