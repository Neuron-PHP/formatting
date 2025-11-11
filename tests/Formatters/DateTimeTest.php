<?php
namespace Formatters;

use Neuron\Formatters\DateTime;
use PHPUnit\Framework\TestCase;

class DateTimeTest extends TestCase
{
	public function testFormat()
	{
		$formatter = new DateTime();

		$this->assertEquals(
			'2018-12-23 1:30 pm',
			$formatter->format( '12/23/2018 13:30')
		);

		$this->assertEquals(
			'2018-12-23 1:30 pm',
			$formatter->format( '23/12/2018 1:30 pm')
		);
	}

	public function testFormatWithFormat()
	{
		$formatter = new DateTime();
		$formatter->setFormat( 'd/m/Y H:i' );

		$this->assertEquals(
			'23/12/2018 13:30',
			$formatter->format( '12/23/2018 13:30')
		);

		$this->assertEquals(
			'23/12/2018 13:30',
			$formatter->format( '23/12/2018 13:30')
		);
	}
}
