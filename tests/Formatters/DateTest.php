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

		$this->assertEquals(
			'',
			$Formatter->format( '23/12')
		);

		$this->assertEquals(
			'',
			$Formatter->format( '23/13/2018')
		);

		$this->assertEquals(
			'',
			$Formatter->format( '13/32/2018')
		);

		$this->assertEquals(
			'',
			$Formatter->format( '32/12/2018')
		);

		$this->assertEquals(
			'',
			$Formatter->format( '3244/1244/20184')
		);

		$this->assertEquals(
			'',
			$Formatter->format( '3244124420184')
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
