<?php

namespace Andizer\Formizer\Decorations;

use Andizer\Formizer\Fields\Field;

interface Decoration {

	public function decorate( Field $field ): Field;
}
