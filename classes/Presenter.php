<?php

namespace Andizer\Formizer;

interface Presenter {

	/**
	 * Renders the output of the form.
	 *
	 * @param Form      $form      The form object.
	 * @param Validator $validator The validation object.
	 *
	 * @return string The output to show.
	 */
	public function output( Form $form, Validator $validator ): string;

}
