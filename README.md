[![Build Status](https://app.travis-ci.com/Neuron-PHP/formatting.svg?token=F8zCwpT7x7Res7J2N4vF&branch=master)](https://app.travis-ci.com/Neuron-PHP/formatting)

# Neuron-PHP Formatting

## Overview

## Installation

Install php composer from https://getcomposer.org/

Install the neuron formatting component:

    composer require neuron-php/formatting


## Formatting

### Currency

Format a number as currency:

```php
    $Formatter = new Currency();
    echo $Formatter->format( 5 );
```php
    $Formatter = new Currency();
    $Formatter->setPadLength( 6 );
    echo $Formatter->format( 5 );    
```
Output:

    $__5.00

Format a number as currency with a custom currency symbol, pad character and pad length:

```php
    $Formatter = new Currency();
    $Formatter->setCurrencySymbol( "£" );
    $Formatter->setPadLength( 11 );
    $Formatter->setPadCharacter( '-' );
```
Output:

    £-------5.00

### Date

Format a date:
```php
    $Formatter = new Date();
    echo $Formatter->format( '12/23/2024' )
```
Output:

    2024-12-23
 
Format a date with a custom format:   
```php
    $Formatter = new Date();
    $Formatter->setFormat( 'd/m/Y' );
    echo $Formatter->format( '12/23/2024' )
````

Output:

    23/12/2024

### DateTime

Format a date and time:
```php    			
    $Formatter = new DateTime();
    echo $Formatter->format( '12/23/2024 13:30' )
```
Output:

    2024-12-24 1:30 pm

Format a date and time with a custom format:
```php
    $Formatter = new DateTime();
    $Formatter->setFormat( 'd/m/Y H:i' );
    echo $Formatter->format( '12/23/2024 13:30' )
```

Output:

    23/12/2024 13:30

### Time

Format a time:
```php
    $Formatter = new Time();
    echo $Formatter->format( '13:30' )
```
Output

    1:30 pm

Format a time with a custom format:
```php
    $Formatter = new Time();
    $Formatter->setFormat( 'H:i:s' );
    $Formatter->format( '13:30:40' )
```

Output:

    13:30:40

### PhoneNumber

Format a 10-digit phone number:
```php
    $Formatter = new PhoneNumber();
    echo $Formatter->format( "1234567890" )
```
Output:

	(123) 456-7890

Format a phone 7-digit phone number:
```php
    $Formatter = new PhoneNumber();
    echo $Formatter->format( "1234567" )
```

Output:

	123-4567

Format an international phone number:
```php
    $Formatter = new PhoneNumber();
    echo $Formatter->format( "12345678901234567890" )
```

Output:

    +12 34 567 89012

# More Information

You can read more about the Neuron components at [neuronphp.com](http://neuronphp.com)
