<?php
namespace Formatters;

use Neuron\Formatters\Date;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
	public function testFormat()
	{
		$formatter = new Date();

		$this->assertEquals(
			'2018-12-23',
			$formatter->format( '12/23/2018')
		);

		$this->assertEquals(
			'2018-12-23',
			$formatter->format( '12-23-2018')
		);

		$this->assertEquals(
			'2018-12-23',
			$formatter->format( '2018-12-23')
		);

		$this->assertEquals(
			'2018-12-23',
			$formatter->format( '23/12/2018')
		);

		$this->assertEquals(
			null,
			$formatter->format( '23/12')
		);

		$this->assertEquals(
			null,
			$formatter->format( '23/13/2018')
		);

		$this->assertEquals(
			null,
			$formatter->format( '13/32/2018')
		);

		$this->assertEquals(
			null,
			$formatter->format( '32/12/2018')
		);

		$this->assertEquals(
			null,
			$formatter->format( '3244/1244/20184')
		);

		$this->assertEquals(
			null,
			$formatter->format( '3244124420184')
		);

	}

	public function testFormatWithFormat()
	{
		$formatter = new Date();
		$formatter->setFormat( 'd/m/Y' );

		$this->assertEquals(
			'23/12/2018',
			$formatter->format( '12/23/2018')
		);

		$this->assertEquals(
			'23/12/2018',
			$formatter->format( '12-23-2018')
		);

		$this->assertEquals(
			'23/12/2018',
			$formatter->format( '2018-12-23')
		);

		$this->assertEquals(
			'23/12/2018',
			$formatter->format( '23/12/2018')
		);

	}
}
