<?php
namespace Formatters;

use Neuron\Formatters\Time;
use PHPUnit\Framework\TestCase;

class TimeTest extends TestCase
{
	public function testFormat()
	{
		$formatter = new Time();

		$this->assertEquals(
			'1:30 pm',
			$formatter->format( '13:30' )
		);
	}

	public function testFormatWithFormat()
	{
		$formatter = new Time();
		$formatter->setFormat( 'H:i:s' );

		$this->assertEquals(
			'13:30:40',
			$formatter->format( '13:30:40' )
		);
	}
}
