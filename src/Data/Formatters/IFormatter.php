<?php

namespace Neuron\Data\Formatters;

/**
 * Formatter interface.
 */
interface IFormatter
{
	public function format( $Data ) : string;
}
