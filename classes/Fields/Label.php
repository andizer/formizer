<?php

namespace Andizer\Formizer\Label;

class Label {

	/**
	 * @var string
	 */
	protected $label;

	/**
	 * @var string
	 */
	protected $for;

	/**
	 * @var string
	 */
	protected $class;

	/**
	 * Label constructor.
	 *
	 * @param string $label
	 * @param string $for
	 * @param string $class
	 */
	public function __construct( $label, $for, $class = '' ) {
		$this->label = $label;
		$this->for   = $for;
		$this->class = $class;
	}

	/**
	 * Renders the label.
	 *
	 * @return string
	 */
	public function render(): string {
		return sprintf(
			'<label class="%3$s" for="%1$s">%2$s</label>',
			$this->for,
			$this->label,
			$this->class
		);
	}
}
