<?php

namespace Neuron\Formatters;

/**
 * Formatter interface.
 */
interface IFormatter
{
	public function format( string $Data ) : ?string;
}
