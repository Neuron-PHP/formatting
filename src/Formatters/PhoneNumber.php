<?php

namespace Neuron\Formatters;

/**
 * Formats phone numbers.
 */

class PhoneNumber implements IFormatter
{
	/**
	 * @param string $data
	 * @return string|null
	 */

	public function format( string $data ): ?string
	{
		$phone = preg_replace("/[^0-9]/", "", $data);

		if( strlen( $phone ) == 7 )
		{
			$phone = $this->format7Digit( $phone );
		}
		else if( strlen( $phone ) == 10 )
		{
			$phone = $this->format10Digit( $phone );
		}
		else if( strlen( $phone ) > 10 )
		{
			$phone = $this->formatInternational( $phone );
		}

		return $phone;
	}

	/**
	 * @param array|string|null $phone
	 * @return string
	 */

	protected function format7Digit( array|string|null $phone ): string
	{
		$pre   = substr( $phone, 0, 3 );
		$post  = substr( $phone, 3, 4 );
		$phone = "$pre-$post";

		return $phone;
	}

	/**
	 * @param array|string|null $phone
	 * @return string
	 */

	protected function format10Digit( array|string|null $phone ): string
	{
		$area  = substr( $phone, 0, 3 );
		$pre   = substr( $phone, 3, 3 );
		$post  = substr( $phone, 6, 4 );
		$phone = "$area-$pre-$post";

		return $phone;
	}

	/**
	 * @param array|string|null $phone
	 * @return string
	 */

	protected function formatInternational( array|string|null $phone ): string
	{
		$countryCode	= substr($phone, 0, strlen($phone) - 10);
		$area				= substr($phone, -10, 2);
		$pre				= substr($phone, -8, 3);
		$post				= substr($phone, -5, 5);
		$phone			= "+$countryCode $area $pre $post";

		return $phone;
	}
}
