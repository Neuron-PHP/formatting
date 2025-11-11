<?php

namespace Neuron\Formatters;

/**
 * Base class for date based formatting.
 */
class DateBase
{
	private string $_format;

	/**
	 * @return string
	 */
	public function getFormat() : string
	{
		return $this->_format;
	}

	/**
	 * @param mixed $format
	 * @return DateBase
	 */
	public function setFormat( $format ) : DateBase
	{
		$this->_format = $format;
		return $this;
	}

	/**
	 * @param array $parts
	 * @return bool
	 */
	public static function ddmmyyyy( array $parts ) : bool
	{
		$match = true;

		if( strlen( $parts[ 0 ] ) > 2 ||
			strlen( $parts[ 1 ] ) > 2 ||
			strlen( $parts[ 2 ] ) != 4 )
		{
			$match = false;
		}

		if( $parts[ 0 ] > 31 )
		{
			$match = false;
		}

		if( $parts[ 1 ] > 12 )
		{
			$match = false;
		}

		return $match;
	}

	/**
	 * @param array $parts
	 * @return bool
	 */
	public static function mmddyyyy( array $parts ) : bool
	{
		$match = true;

		if( strlen( $parts[ 0 ] ) > 2 ||
			strlen( $parts[ 1 ] ) > 2 ||
			strlen( $parts[ 2 ] ) != 4 )
		{
			$match = false;
		}

		if( $parts[ 0 ] > 12 )
		{
			$match = false;
		}

		if( $parts[ 1 ] > 31 )
		{
			$match = false;
		}

		return $match;
	}

	/**
	 * @param array $parts
	 * @return bool
	 */
	public static function yyyymmdd( array $parts ) : bool
	{
		$match = true;

		if( strlen( $parts[ 0 ] ) != 4 ||
			strlen( $parts[ 1 ] ) > 2 ||
			strlen( $parts[ 2 ] ) > 2 )
		{
			$match = false;
		}

		if( $parts[ 1 ] > 12 )
		{
			$match = false;
		}

		if( $parts[ 2 ] > 31 )
		{
			$match = false;
		}

		return $match;
	}

	/**
	 * Tries to figure out which format the date is in then translates it to yyyy-mm-dd
	 * Handles -, / and . as delimiters.
	 * Takes dd/mm/yyyy, mm/dd/yyyy or yyyy/mm/dd
	 *
	 * @param string $date
	 * @return ?string
	 */

	public static function normalizeDate( string $date ) : ?string
	{
		$date  = trim( $date );
		$parts = explode( ' ', $date );

		if( $parts )
		{
			$date = $parts[ 0 ];
		}

		$delimiter = '';

		$separators = [ '-', '/', '.' ];

		foreach( $separators as $separator )
		{
			if( strstr( $date, $separator ) )
			{
				$delimiter = $separator;
			}
		}

		if( !$delimiter )
		{
			return null;
		}

		$parts = explode( $delimiter, $date );

		if( count( $parts ) != 3 )
		{
			return null;
		}

		if( self::yyyymmdd( $parts ) )
		{
			return $parts[ 0 ].'-'.$parts[ 1 ].'-'.$parts[ 2 ];
		}

		if( self::mmddyyyy( $parts ) )
		{
			return $parts[ 2 ].'-'.$parts[ 0 ].'-'.$parts[ 1 ];
		}

		if( self::ddmmyyyy( $parts ) )
		{
			return $parts[ 2 ].'-'.$parts[ 1 ].'-'.$parts[ 0 ];
		}

		return null;
	}
}
