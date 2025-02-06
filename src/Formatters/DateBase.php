<?php

namespace Neuron\Formatters;

/**
 * Base class for date based formatting.
 */
class DateBase
{
	private string $_Format;

	/**
	 * @return string
	 */
	public function getFormat() : string
	{
		return $this->_Format;
	}

	/**
	 * @param mixed $Format
	 * @return DateBase
	 */
	public function setFormat( $Format ) : DateBase
	{
		$this->_Format = $Format;
		return $this;
	}

	/**
	 * @param array $Parts
	 * @return bool
	 */
	public static function ddmmyyyy( array $Parts ) : bool
	{
		$Match = true;

		if( strlen( $Parts[ 0 ] ) > 2 ||
			strlen( $Parts[ 1 ] ) > 2 ||
			strlen( $Parts[ 2 ] ) != 4 )
		{
			$Match = false;
		}

		if( $Parts[ 0 ] > 31 )
		{
			$Match = false;
		}

		if( $Parts[ 1 ] > 12 )
		{
			$Match = false;
		}

		return $Match;
	}

	/**
	 * @param array $Parts
	 * @return bool
	 */
	public static function mmddyyyy( array $Parts ) : bool
	{
		$Match = true;

		if( strlen( $Parts[ 0 ] ) > 2 ||
			strlen( $Parts[ 1 ] ) > 2 ||
			strlen( $Parts[ 2 ] ) != 4 )
		{
			$Match = false;
		}

		if( $Parts[ 0 ] > 12 )
		{
			$Match = false;
		}

		if( $Parts[ 1 ] > 31 )
		{
			$Match = false;
		}

		return $Match;
	}

	/**
	 * @param array $Parts
	 * @return bool
	 */
	public static function yyyymmdd( array $Parts ) : bool
	{
		$Match = true;

		if( strlen( $Parts[ 0 ] ) != 4 ||
			strlen( $Parts[ 1 ] ) > 2 ||
			strlen( $Parts[ 2 ] ) > 2 )
		{
			$Match = false;
		}

		if( $Parts[ 1 ] > 12 )
		{
			$Match = false;
		}

		if( $Parts[ 2 ] > 31 )
		{
			$Match = false;
		}

		return $Match;
	}

	/**
	 * Tries to figure out which format the date is in then translates it to yyyy-mm-dd
	 * Handles -, / and . as delimiters.
	 * Takes dd/mm/yyyy, mm/dd/yyyy or yyyy/mm/dd
	 *
	 * @param string $Date
	 * @return ?string
	 */

	public static function normalizeDate( string $Date ) : ?string
	{
		$Date  = trim( $Date );
		$Parts = explode( ' ', $Date );

		if( $Parts )
		{
			$Date = $Parts[ 0 ];
		}

		$Delimiter = '';

		$Separators = [ '-', '/', '.' ];

		foreach( $Separators as $Separator )
		{
			if( strstr( $Date, $Separator ) )
			{
				$Delimiter = $Separator;
			}
		}

		if( !$Delimiter )
		{
			return null;
		}

		$Parts = explode( $Delimiter, $Date );

		if( count( $Parts ) != 3 )
		{
			return null;
		}

		if( self::yyyymmdd( $Parts ) )
		{
			return $Parts[ 0 ].'-'.$Parts[ 1 ].'-'.$Parts[ 2 ];
		}

		if( self::mmddyyyy( $Parts ) )
		{
			return $Parts[ 2 ].'-'.$Parts[ 0 ].'-'.$Parts[ 1 ];
		}

		if( self::ddmmyyyy( $Parts ) )
		{
			return $Parts[ 2 ].'-'.$Parts[ 1 ].'-'.$Parts[ 0 ];
		}

		return null;
	}
}
