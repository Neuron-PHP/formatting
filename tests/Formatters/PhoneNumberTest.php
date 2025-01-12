<?php
namespace Formatters;

use Neuron\Formatters\PhoneNumber;
use PHPUnit\Framework\TestCase;

class PhoneNumberTest extends TestCase
{
	public function testFormat()
	{
		$Formatter = new PhoneNumber();

		$this->assertEquals(
			"(123) 456-7890",
			$Formatter->format( "1234567890" )
		);
	}
}
