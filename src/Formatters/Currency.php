<?php

namespace Neuron\Formatters;


/**
 * Formats currency as html.
 */

class Currency implements IFormatter
{
	private string $_format;
	private int $_padLength;
	private string $_padCharacter;
	private string $_currencySymbol;

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
		return $this->_padCharacter;
	}

	/**
	 * @param string $padCharacter
	 * @return Currency
	 */

	public function setPadCharacter( string $padCharacter ): Currency
	{
		$this->_padCharacter = $padCharacter;
		return $this;
	}

	/**
	 * @return string
	 */

	public function getCurrencySymbol(): string
	{
		return $this->_currencySymbol;
	}

	/**
	 * @param string $currencySymbol
	 * @return Currency
	 */

	public function setCurrencySymbol( string $currencySymbol ): Currency
	{
		$this->_currencySymbol = $currencySymbol;
		return $this;
	}

	/**
	 * @return string
	 */

	public function getFormat() : string
	{
		return $this->_format;
	}

	/**
	 * @param string $format
	 * @return Currency
	 */

	public function setFormat( string $format ) : Currency
	{
		$this->_format = $format;
		return $this;
	}

	/**
	 * @return int
	 */

	public function getPadLength() : int
	{
		return $this->_padLength;
	}

	/**
	 * @param int $padLength
	 * @return Currency
	 */

	public function setPadLength( int $padLength ) : Currency
	{
		$this->_padLength = $padLength;
		return $this;
	}

	/**
	 * @param string $data
	 * @return string|null
	 */

	public function format( string $data ): ?string
	{
		return
			$this->getCurrencySymbol().str_pad(
				sprintf(
					$this->getFormat(),
					round( $data, 2 )
				),
				$this->getPadLength(),
				$this->getPadCharacter(),
				STR_PAD_LEFT
			);
	}
}
