<?php

namespace Neuron\Formatters;

/**
 * Formats dates
 */

class Date extends DateBase implements IFormatter
{
	public function __construct()
	{
		$this->setFormat( "Y-m-d" );
	}

	public function format( $Data ): string
	{
		$Date = self::normalizeDate( $Data );
		return date( $this->getFormat(), strtotime( $Date ) );
	}
}
