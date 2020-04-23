<?php
use Neuron\Data\Formatters\Currency;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
	public function testFormat()
	{
		$Formatter = new Currency();

		$this->assertContains(
			"1.00",
			$Formatter->format( 1 )
		);
	}
}
