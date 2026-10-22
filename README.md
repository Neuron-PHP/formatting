[![CI](https://github.com/Neuron-PHP/formatting/actions/workflows/ci.yml/badge.svg)](https://github.com/Neuron-PHP/formatting/actions)
[![codecov](https://codecov.io/gh/Neuron-PHP/formatting/branch/develop/graph/badge.svg)](https://codecov.io/gh/Neuron-PHP/formatting)
# Neuron-PHP Formatting

Formatters that turn raw values into currency, dates, times, and phone numbers. Each one implements `Neuron\Formatters\IFormatter`.

```php
public function format( string $data ): ?string;
```

`format()` returns `null` when a date cannot be recognized.

## Installation

Requires PHP 8.4 or higher and [neuron-php/core](https://packagist.org/packages/neuron-php/core).

```bash
composer require neuron-php/formatting
```

## Currency

`Currency` prints a symbol, pads the amount on the left, and formats it with `sprintf`. The defaults are `$`, nine characters of padding with `_`, and `%01.2f` (two decimal places).

```php
use Neuron\Formatters\Currency;

$Formatter = new Currency();
echo $Formatter->format( 5 );
```

```
$_____5.00
```

Shorten the pad:

```php
$Formatter = new Currency();
$Formatter->setPadLength( 6 );
echo $Formatter->format( 5 );
```

```
$__5.00
```

The setters return the formatter, so they can be chained. `setFormat()` changes the `sprintf` pattern used for the number.

```php
$Formatter = new Currency();

echo $Formatter
	->setCurrencySymbol( '£' )
	->setPadLength( 11 )
	->setPadCharacter( '-' )
	->format( 5 );
```

```
£-------5.00
```

## Date

`Date` reads a date and prints it with PHP's `date()` format. The default format is `Y-m-d`.

The incoming date may use `-`, `/`, or `.` as the separator, in any of these orders:

- `yyyy-mm-dd`
- `mm-dd-yyyy`
- `dd-mm-yyyy`

When the first number could be either a month or a day, it is read as a month. `23/12/2024` is read as a day first, because 23 is not a month. A value that is not a date returns `null`.

```php
use Neuron\Formatters\Date;

$Formatter = new Date();
echo $Formatter->format( '12/23/2024' );
```

```
2024-12-23
```

`setFormat()` takes a PHP date format.

```php
$Formatter = new Date();
$Formatter->setFormat( 'd/m/Y' );
echo $Formatter->format( '12/23/2024' );
```

```
23/12/2024
```

## DateTime

`DateTime` normalizes the date the same way `Date` does, then formats the date and time together. The default format is `Y-m-d g:i a`.

```php
use Neuron\Formatters\DateTime;

$Formatter = new DateTime();
echo $Formatter->format( '12/23/2024 13:30' );
```

```
2024-12-23 1:30 pm
```

```php
$Formatter = new DateTime();
$Formatter->setFormat( 'd/m/Y H:i' );
echo $Formatter->format( '12/23/2024 13:30' );
```

```
23/12/2024 13:30
```

A 12-hour clock with a meridian is accepted too: `23/12/2024 1:30 pm`.

## Time

`Time` formats a time of day. The default format is `g:i a`.

```php
use Neuron\Formatters\Time;

$Formatter = new Time();
echo $Formatter->format( '13:30' );
```

```
1:30 pm
```

```php
$Formatter = new Time();
$Formatter->setFormat( 'H:i:s' );
echo $Formatter->format( '13:30:40' );
```

```
13:30:40
```

## PhoneNumber

`PhoneNumber` strips everything that is not a digit, then formats by length.

| Digits | Result |
| --- | --- |
| 7 | `123-4567` |
| 10 | `123-456-7890` |
| More than 10 | A leading `+`, the extra digits as a country code, then the last ten digits grouped as 2, 3, and 5 |
| Anything else | The digits, unchanged |

```php
use Neuron\Formatters\PhoneNumber;

$Formatter = new PhoneNumber();

echo $Formatter->format( '1234567890' );       // 123-456-7890
echo $Formatter->format( '(123) 456-7890' );   // 123-456-7890
echo $Formatter->format( '1234567' );          // 123-4567
echo $Formatter->format( '123456789012' );     // +12 34 567 89012
```

## More Information

- **Neuron Framework**: [neuronphp.com](http://neuronphp.com)
- **GitHub**: [github.com/neuron-php/formatting](https://github.com/neuron-php/formatting)
- **Packagist**: [packagist.org/packages/neuron-php/formatting](https://packagist.org/packages/neuron-php/formatting)

## License

MIT License - see LICENSE file for details
