<?php

namespace Neuron\Formatters;

/**
 * Formatter interface for data transformation and display formatting.
 * 
 * This interface defines the contract for all formatters in the Neuron framework.
 * Formatters are responsible for converting raw data into human-readable or 
 * standardized formats. They provide a consistent way to transform data for
 * display, export, or standardization purposes.
 * 
 * Common formatter implementations include:
 * - Currency formatting with locale-specific symbols and precision
 * - Date/time formatting with various display patterns
 * - Phone number formatting with regional standards
 * - Address formatting according to postal standards
 * 
 * @package Neuron\Formatters
 * 
 * @example
 * ```php
 * class CurrencyFormatter implements IFormatter
 * {
 *     public function format(string $data): ?string
 *     {
 *         $amount = floatval($data);
 *         return '$' . number_format($amount, 2);
 *     }
 * }
 * ```
 */
interface IFormatter
{
	/**
	 * Formats the provided data according to the formatter's rules.
	 *
	 * @param string $data The raw data to be formatted
	 * @return string|null The formatted data, or null if formatting fails
	 */
	public function format( string $data ) : ?string;
}
