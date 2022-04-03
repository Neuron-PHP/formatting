<?php

use Neuron\Formatters\Date;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
	public function testFormat()
	{
		$Formatter = new Date();

		$this->assertEquals(
			'2018-12-23',
			$Formatter->format( '12/23/2018')
		);

		$this->assertEquals(
			'2018-12-23',
			$Formatter->format( '12-23-2018')
		);

		$this->assertEquals(
			'2018-12-23',
			$Formatter->format( '2018-12-23')
		);

		$this->assertEquals(
			'2018-12-23',
			$Formatter->format( '23/12/2018')
		);

	}
}
