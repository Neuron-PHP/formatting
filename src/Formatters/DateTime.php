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
	 * @param string $data
	 * @return string|null
	 */

	public function format( string $data ): ?string
	{
		$parts = explode( ' ', $data );
		$date  = self::normalizeDate( $parts[ 0 ] );

		$dateTime = $date.' '.$parts[ 1 ];

		if( count( $parts ) > 2 )
		{
			$dateTime .= ' '.$parts[ 2 ];
		}

		return date( $this->getFormat(), strtotime( $dateTime ) );
	}
}
