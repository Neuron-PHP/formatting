<?php
namespace Formatters;

use Neuron\Formatters\PhoneNumber;
use PHPUnit\Framework\TestCase;

class PhoneNumberTest extends TestCase
{
	public function testFormat10()
	{
		$Formatter = new PhoneNumber();

		$this->assertEquals(
			"123-456-7890",
			$Formatter->format( "1234567890" )
		);
	}

	public function testFormat7()
	{
		$Formatter = new PhoneNumber();

		$this->assertEquals(
			"123-4567",
			$Formatter->format( "1234567" )
		);
	}

	public function testInternational()
	{
		$Formatter = new PhoneNumber();

		$this->assertEquals(
			"+12 34 567 89012",
			$Formatter->format( "123456789012" )
		);
	}
}
