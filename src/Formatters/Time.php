<?php

namespace Neuron\Formatters;

/**
 * Formats time.
 */

class Time extends DateBase implements IFormatter
{
	public function __construct()
	{
		$this->setFormat( "g:i a" );
	}

	/**
	 * @param string $Data
	 * @return string|null
	 */

	public function format( string $Data ): ?string
	{
		return date( $this->getFormat(), strtotime( $Data ) );
	}
}
