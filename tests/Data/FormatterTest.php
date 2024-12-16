<?php
namespace Tests\Data\Formatters;

use Neuron\Formatters;
use PHPUnit\Framework\TestCase;

class FormatterTest extends TestCase
{
	public function testTimeOnly()
	{
		$Time = new Formatters\Time();
		$this->assertEquals(
			'1:30 pm',
			$Time->format( '13:30')
		);
	}

	public function testDateTime()
	{
		$DateTime = new Formatters\DateTime();
		$this->assertEquals(
			'2018-12-23 1:30 pm',
			$DateTime->format( '12/23/2018 13:30')
		);

		$this->assertEquals(
			'2018-12-23 1:30 pm',
			$DateTime->format( '23/12/2018 1:30 pm')
		);
	}

	public function testDateOnly()
	{
		$Date = new Formatters\Date();

		$this->assertEquals(
			'2018-12-23',
			$Date->format( '12/23/2018')
		);

		$this->assertEquals(
			'2018-12-23',
			$Date->format( '12-23-2018')
		);

		$this->assertEquals(
			'2018-12-23',
			$Date->format( '2018-12-23')
		);

		$this->assertEquals(
			'2018-12-23',
			$Date->format( '23/12/2018')
		);
	}

	public function testPhoneNumber()
	{
		$Phone = new Formatters\PhoneNumber();

		$this->assertEquals(
			'(123) 456-7890',
			$Phone->format( '123-456-7890' )
		);

		$this->assertEquals(
			'(123) 456-7890',
			$Phone->format( '1234567890' )
		);

		$this->assertEquals(
			'234567890',
			$Phone->format( '234567890' )
		);
	}
}
