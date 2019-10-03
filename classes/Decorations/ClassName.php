<?php

namespace Andizer\Formizer\Decorations;

use Andizer\Formizer\Fields\Field;

class ClassName implements Decoration {

	/**
	 * @var string
	 */
	protected $decoration;

	/**
	 * @var array
	 */
	protected $target;

	public function __construct( $decoration, array $target = [] ) {
		$this->decoration = $decoration;
		$this->target     = $target;
	}

	public function decorate( Field $field ): Field {
		if ( ! in_array( get_class( $field ), $this->target, true ) ) {
			return $field;
		}
		$field->class .= ' '. $this->decoration;

		return $field;
	}

}
