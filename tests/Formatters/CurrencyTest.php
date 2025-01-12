<?php
namespace Formatters;

use Neuron\Formatters\Currency;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
	public function testFormat()
	{
		$Formatter = new Currency();

		$this->assertStringContainsString(
			"1.00",
			$Formatter->format( 1 )
		);
	}
}
