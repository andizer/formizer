<?php

namespace Andizer\Formizer\Form;

interface Handler {

	/**
	 * Handles the form and a possible submit of it.
	 *
	 * @param Form      $form      The form object.
	 * @param Validator $validator The validator object.
	 */
	public function handle( Form $form, Validator $validator ): void;

}
