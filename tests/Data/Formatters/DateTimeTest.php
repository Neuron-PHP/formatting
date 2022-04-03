<?php

use Neuron\Formatters\DateTime;
use PHPUnit\Framework\TestCase;

class DateTimeTest extends TestCase
{
	public function testFormat()
	{
		$Formatter = new DateTime();

		$this->assertEquals(
			'2018-12-23 1:30 pm',
			$Formatter->format( '12/23/2018 13:30')
		);

		$this->assertEquals(
			'2018-12-23 1:30 pm',
			$Formatter->format( '23/12/2018 1:30 pm')
		);
	}
}
