<?php
namespace Tests\Data\Formatters;

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
}
