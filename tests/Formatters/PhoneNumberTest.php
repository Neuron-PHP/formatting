<?php
namespace Formatters;

use Neuron\Formatters\PhoneNumber;
use PHPUnit\Framework\TestCase;

class PhoneNumberTest extends TestCase
{
	public function testFormat10()
	{
		$formatter = new PhoneNumber();

		$this->assertEquals(
			"123-456-7890",
			$formatter->format( "1234567890" )
		);
	}

	public function testFormat7()
	{
		$formatter = new PhoneNumber();

		$this->assertEquals(
			"123-4567",
			$formatter->format( "1234567" )
		);
	}

	public function testInternational()
	{
		$formatter = new PhoneNumber();

		$this->assertEquals(
			"+12 34 567 89012",
			$formatter->format( "123456789012" )
		);
	}
}
