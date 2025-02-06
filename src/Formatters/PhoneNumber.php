<?php

namespace Neuron\Formatters;

/**
 * Formats phone numbers.
 */

class PhoneNumber implements IFormatter
{
	/**
	 * @param string $Data
	 * @return string|null
	 */

	public function format( string $Data ): ?string
	{
		$Phone = preg_replace("/[^0-9]/", "", $Data);

		if( strlen( $Phone ) == 7 )
		{
			$Phone = $this->format7Digit( $Phone );
		}
		else if( strlen( $Phone ) == 10 )
		{
			$Phone = $this->format10Digit( $Phone );
		}
		else if( strlen( $Phone ) > 10 )
		{
			$Phone = $this->formatInternational( $Phone );
		}

		return $Phone;
	}

	/**
	 * @param array|string|null $Phone
	 * @return string
	 */

	protected function format7Digit( array|string|null $Phone ): string
	{
		$Pre   = substr( $Phone, 0, 3 );
		$Post  = substr( $Phone, 3, 4 );
		$Phone = "$Pre-$Post";

		return $Phone;
	}

	/**
	 * @param array|string|null $Phone
	 * @return string
	 */

	protected function format10Digit( array|string|null $Phone ): string
	{
		$Area  = substr( $Phone, 0, 3 );
		$Pre   = substr( $Phone, 3, 3 );
		$Post  = substr( $Phone, 6, 4 );
		$Phone = "$Area-$Pre-$Post";

		return $Phone;
	}

	/**
	 * @param array|string|null $Phone
	 * @return string
	 */

	protected function formatInternational( array|string|null $Phone ): string
	{
		$CountryCode	= substr($Phone, 0, strlen($Phone) - 10);
		$Area				= substr($Phone, -10, 2);
		$Pre				= substr($Phone, -8, 3);
		$Post				= substr($Phone, -5, 5);
		$Phone			= "+$CountryCode $Area $Pre $Post";

		return $Phone;
	}
}
