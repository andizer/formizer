<?php

namespace Andizer\Formizer;

use Andizer\Formizer\Decorations\Decoration;
use Andizer\Formizer\Repositories\Decorations;
use Andizer\Formizer\Repositories\Fields;

/**
 * Represents the decorator that modifies the fields.
 */
final class Decorator {

	/**
	 * Repository that holds the decorations.
	 *
	 * @var Decorations
	 */
	protected $decorations;

	/**
	 * Repository that holds the fields.
	 *
	 * @var Fields
	 */
	protected $fields;

	/**
	 * Decorator constructor.
	 *
	 * @param Decorations $decorations The decorations to execute.
	 * @param Fields      $fields      The fields to modify.
	 */
	public function __construct( Decorations $decorations, Fields $fields ) {
		$this->decorations = $decorations;
		$this->fields      = $fields;
	}

	/**
	 * Applies the registered decorations.
	 */
	public function decorate(): void {
		array_map( [ $this, 'applyDecoration' ], $this->decorations->get() );
	}

	/**
	 * Applies the decoration on the set fields.
	 *
	 * @param Decoration $decoration
	 */
	protected function applyDecoration( Decoration $decoration ): void {
		array_map( [ $decoration, 'decorate' ], $this->fields->get() );
	}
}
