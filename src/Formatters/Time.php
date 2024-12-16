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

	public function format( $Data ): string
	{
		return date( $this->getFormat(), strtotime( $Data ) );
	}
}
