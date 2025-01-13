<?php
namespace Formatters;

use Neuron\Formatters\Currency;
	;

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

	public function testFormatWithSymbol()
	{
		$Formatter = new Currency();
		$Formatter->setCurrencySymbol( "£" );

		$this->assertStringContainsString(
			"£_____1.00",
			$Formatter->format( 1 )
		);
	}

	public function testFormatWithSymbolAndPadding()
	{
		$Formatter = new Currency();
		$Formatter->setCurrencySymbol( "£" );
		$Formatter->setPadLength( 11 );

		$this->assertStringContainsString(
			"£_______1.00",
			$Formatter->format( 1 )
		);
	}

	public function testFormatWithSymbolAndPaddingAndCharacter()
	{
		$Formatter = new Currency();
		$Formatter->setCurrencySymbol( "£" );
		$Formatter->setPadLength( 11 );
		$Formatter->setPadCharacter( ' ' );

		$this->assertStringContainsString(
			"£       1.00",
			$Formatter->format( 1 )
		);
	}
}
