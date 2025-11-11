<?php
namespace Formatters;

use Neuron\Formatters\Currency;
	;

use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
	public function testFormat()
	{
		$formatter = new Currency();

		$this->assertStringContainsString(
			"1.00",
			$formatter->format( 1 )
		);
	}

	public function testFormatWithSymbol()
	{
		$formatter = new Currency();
		$formatter->setCurrencySymbol( "£" );

		$this->assertStringContainsString(
			"£_____1.00",
			$formatter->format( 1 )
		);
	}

	public function testFormatWithSymbolAndPadding()
	{
		$formatter = new Currency();
		$formatter->setCurrencySymbol( "£" );
		$formatter->setPadLength( 11 );

		$this->assertStringContainsString(
			"£_______1.00",
			$formatter->format( 1 )
		);
	}

	public function testFormatWithSymbolAndPaddingAndCharacter()
	{
		$formatter = new Currency();
		$formatter->setCurrencySymbol( "£" );
		$formatter->setPadLength( 11 );
		$formatter->setPadCharacter( ' ' );

		$this->assertStringContainsString(
			"£       1.00",
			$formatter->format( 1 )
		);
	}
}
