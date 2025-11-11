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
	 * @param string $data
	 * @return string|null
	 */

	public function format( string $data ): ?string
	{
		$date = self::normalizeDate( $data );
		if( $date === null )
		{
			return null;
		}

		return date( $this->getFormat(), strtotime( $date ) );
	}
}
