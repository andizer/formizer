<?php

namespace Andizer\Formizer\Fields;

/**
 * @property string cols The number of columns.
 * @property string rows The number of rows.
 */
class TextArea extends Field {

	/**
	 * Renders the textarea.
	 *
	 * @return string The rendered textarea.
	 */
	public function render(): string {
		return sprintf(
			'<textarea id="%1$s" class="%6$s" name="%2$s" cols="%4$s" rows="%5$s">%3$s</textarea>',
			$this->id,
			$this->getFieldName(),
			$this->value,
			$this->cols,
			$this->rows,
			$this->class
		);
	}

}
