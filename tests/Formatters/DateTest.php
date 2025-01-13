<?php
namespace Formatters;

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

	public function testFormatWithFormat()
	{
		$Formatter = new Date();
		$Formatter->setFormat( 'd/m/Y' );

		$this->assertEquals(
			'23/12/2018',
			$Formatter->format( '12/23/2018')
		);

		$this->assertEquals(
			'23/12/2018',
			$Formatter->format( '12-23-2018')
		);

		$this->assertEquals(
			'23/12/2018',
			$Formatter->format( '2018-12-23')
		);

		$this->assertEquals(
			'23/12/2018',
			$Formatter->format( '23/12/2018')
		);

	}
}
