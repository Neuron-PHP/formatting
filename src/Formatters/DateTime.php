<?php

namespace Neuron\Formatters;

/**
 * Formats Date/Time
 */
class DateTime extends DateBase implements IFormatter
{
	public function __construct()
	{
		$this->setFormat( "Y-m-d g:i a" );
	}

	/**
	 * @param string $Data
	 * @return string|null
	 */

	public function format( string $Data ): ?string
	{
		$Parts = explode( ' ', $Data );
		$Date  = self::normalizeDate( $Parts[ 0 ] );

		$DateTime = $Date.' '.$Parts[ 1 ];

		if( count( $Parts ) > 2 )
		{
			$DateTime .= ' '.$Parts[ 2 ];
		}

		return date( $this->getFormat(), strtotime( $DateTime ) );
	}
}
