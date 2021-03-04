<?php

namespace Andizer\Formizer\Tests;

use Mockery;

abstract class TestCase extends \PHPUnit\Framework\TestCase {

	/**
	 * Runs on tearDown.
	 *
	 * @after
	 */
	public function closeMockery(): void {
		if ( $container = Mockery::getContainer() ) {
			$this->addToAssertionCount( $container->mockery_getExpectationCount() );
		}
		Mockery::close();
	}
}
