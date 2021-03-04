<?php

namespace Andizer\Formizer\Repositories;

use Andizer\Formizer\Decorations\Decoration;

/**
 * Repository object for the decorations.
 *
 * @package Andizer\Formizer\Repositories
 */
class Decorations {

	/**
	 * Holds the decorations.
	 *
	 * @var Decoration[]
	 */
	protected $decorations = [];

	/**
	 * Registers a decoration.
	 *
	 * @param Decoration $decoration The decoration to add.
	 */
	public function add( Decoration $decoration ): void {
		$this->decorations[] = $decoration;
	}

	/**
	 * Retrieves the add decorations.
	 *
	 * @return Decoration[] The set decorations.
	 */
	public function get(): array {
		return $this->decorations;
	}
}
