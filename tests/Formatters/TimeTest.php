<?php
namespace Formatters;

use Neuron\Formatters\Time;
use PHPUnit\Framework\TestCase;

class TimeTest extends TestCase
{
	public function testFormat()
	{
		$Formatter = new Time();

		$this->assertEquals(
			'1:30 pm',
			$Formatter->format( '13:30' )
		);
	}

	public function testFormatWithFormat()
	{
		$Formatter = new Time();
		$Formatter->setFormat( 'H:i:s' );

		$this->assertEquals(
			'13:30:40',
			$Formatter->format( '13:30:40' )
		);
	}
}
