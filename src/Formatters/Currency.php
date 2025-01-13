<?php

namespace Neuron\Formatters;


/**
 * Formats currency as html.
 */

class Currency implements IFormatter
{
	private string $_Format;
	private int $_PadLength;
	private string $_PadCharacter;
	private string $_CurrencySymbol;

	public function __construct()
	{
		$this->setCurrencySymbol( '$' );
		$this->setPadCharacter( '_' );
		$this->setFormat( "%01.2f" );
		$this->setPadLength( 9 );
	}

	/**
	 * @return string
	 */
	public function getPadCharacter(): string
	{
		return $this->_PadCharacter;
	}

	/**
	 * @param string $PadCharacter
	 * @return
	 */
	public function setPadCharacter( string $PadCharacter ): Currency
	{
		$this->_PadCharacter = $PadCharacter;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCurrencySymbol(): string
	{
		return $this->_CurrencySymbol;
	}

	/**
	 * @param string $CurrencySymbol
	 * @return Currency
	 */
	public function setCurrencySymbol( string $CurrencySymbol ): Currency
	{
		$this->_CurrencySymbol = $CurrencySymbol;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getFormat() : string
	{
		return $this->_Format;
	}

	/**
	 * @param string $Format
	 * @return Currency
	 */
	public function setFormat( string $Format ) : Currency
	{
		$this->_Format = $Format;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getPadLength() : int
	{
		return $this->_PadLength;
	}

	/**
	 * @param int $PadLength
	 * @return Currency
	 */
	public function setPadLength( int $PadLength ) : Currency
	{
		$this->_PadLength = $PadLength;
		return $this;
	}

	public function format( $Data ): string
	{
		return
			$this->getCurrencySymbol().str_pad(
				sprintf(
					$this->getFormat(),
					round( $Data, 2 )
				),
				$this->getPadLength(),
				$this->getPadCharacter(),
				STR_PAD_LEFT
			);
	}
}
