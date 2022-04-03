<?php

namespace Neuron\Data\Formatters;

/**
 * Currency formatter.
 */
class Currency implements IFormatter
{
	private $_Format;
	private $_PadLength;

	public function __construct()
	{
		$this->setFormat( "%01.2f" );
		$this->setPadLength( 9 );
	}

	/**
	 * @return mixed
	 */
	public function getFormat()
	{
		return $this->_Format;
	}

	/**
	 * @param mixed $Format
	 * @return Currency
	 */
	public function setFormat( $Format )
	{
		$this->_Format = $Format;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPadLength()
	{
		return $this->_PadLength;
	}

	/**
	 * @param mixed $PadLength
	 * @return Currency
	 */
	public function setPadLength( $PadLength )
	{
		$this->_PadLength = $PadLength;
		return $this;
	}

	public function format( $Data ): string
	{
		return
			"<pre style='display:inline; background-color: inherit; color:white; border: none;'>".
			str_pad(
				sprintf(
					$this->getFormat(),
					round( $Data, 2 )
				),
				$this->getPadLength(),
				'_',
				STR_PAD_LEFT
			).
			"</pre>";
	}
}
