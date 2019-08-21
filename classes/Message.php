<?php
namespace Andizer\Formizer;

class Message {

	/**
	 * @var string The message type.
	 */
	protected $type;

	/**
	 * @var string The message.
	 */
	protected $message;

	/**
	 * Message constructor.
	 *
	 * @param string $type    The message type.
	 * @param string $message The message.
	 */
	public function __construct( $type, $message ) {
		$this->type    = $type;
		$this->message = $message;
	}

	/**
	 * Retrieves the message type.
	 *
	 * @return string The message type.
	 */
	public function getType(): string {
		return $this->type;
	}

	/**
	 * Retrieves the message.
	 *
	 * @return string
	 */
	public function getMessage(): string {
		return $this->message;
	}

}
