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

	/**
	 * @param string $Data
	 * @return string|null
	 */

	public function format( string $Data ): ?string
	{
		$Date = self::normalizeDate( $Data );
		if( $Date === null )
		{
			return null;
		}

		return date( $this->getFormat(), strtotime( $Date ) );
	}
}
