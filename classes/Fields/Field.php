<?php

namespace Andizer\Formizer\Form\Fields;

/**
 * @property string id
 * @property string container
 * @property string class
 * @property string value
 * @property string placeholder
 * @property string label
 */
abstract class Field {

	/**
	 * @var array The attributes of the field.
	 */
	protected $attributes = [];

	/**
	 * @var string The field name.
	 */
	protected $fieldName  = '';

	/**
	 * @var string The field label.
	 */
	protected $fieldLabel = '';

	/**
	 * Renders the field.
	 *
	 * @return string The rendered field.
	 */
	abstract public function render() : string;

	/**
	 * Sets the field name and attributes.
	 *
	 * @param string $fieldName  The field name.
	 * @param array  $attributes The attributes to set.
	 */
	public function __construct( $fieldName, array $attributes = [] ) {
		$this->setFieldName( $fieldName );
		$this->setAttributes( $attributes );
	}

	/**
	 * Retrieves a value from the attributes. Empty string when field not set.
	 *
	 * @param string $name Name of attribute to retrieve value for.
	 *
	 * @return string The field value.
	 */
	public function __get( $name ): string {
		if ( isset( $this->$name ) ) {
			return $this->attributes[ $name ];
		}

		return '';
	}

	/**
	 * Sets the value of a field by adding it to the attributes.
	 *
	 * @param string $name  The name of attribute to set value for.
	 * @param string $value The value to give.
	 */
	public function __set( $name, $value ): void {
		$this->attributes[ $name ] = $value;
	}

	/**
	 * Checks if an attributes exists in the list of attributes.
	 *
	 * @param string $name The attribute name to check.
	 *
	 * @return bool True when field exists.
	 */
	public function __isset( $name ): bool {
		return array_key_exists( $name, $this->attributes );
	}

	/**
	 * Retrieves the field name.
	 *
	 * @return string The field name.
	 */
	public function getFieldName(): string {
		return $this->fieldName;
	}

	/**
	 * Sets the field name.
	 * @param string $fieldName The field name.
	 */
	public function setFieldName( $fieldName ): void {
		$this->fieldName = $fieldName;
	}

	/**
	 * Sets the field label.
	 *
	 * @param string $fieldLabel The field label.
	 */
	public function setFieldLabel( $fieldLabel ): void {
		$this->label = $fieldLabel;
	}

	/**
	 * Retrieves the defaults.
	 *
	 * @return array The defaults.
	 */
	protected function getDefaults(): array {
		return [];
	}

	/**
	 * Sets the attributes.
	 *
	 * @param array $attributes The attributes to set.
	 */
	protected function setAttributes( array $attributes = [] ): void {
		$defaults = [
			'label'       => '',
			'id'          => $this->getFieldName(),
			'value'       => '',
			'class'       => '',
			'placeholder' => '',
			'container'   => '',
		];

		$this->attributes = array_merge( $defaults, $this->getDefaults(), $attributes );
	}

}
