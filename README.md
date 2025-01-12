[![Build Status](https://app.travis-ci.com/Neuron-PHP/formatting.svg?token=F8zCwpT7x7Res7J2N4vF&branch=master)](https://app.travis-ci.com/Neuron-PHP/formatting)

# Neuron-PHP Formatting

## Overview

## Installation

Install php composer from https://getcomposer.org/

Install the neuron formatting component:

    composer require neuron-php/formatting


## Formatting

### Currency

    $Formatter = new Currency();
    $Formatter->setPadLength( 6 );
    echo $Formatter->format( 5 );
    
    __5.00

### Date

	$Formatter = new Date();
    echo $Formatter->format( '12/23/2018' )

    2018-12-23
    
### DateTime
    			
    $Formatter = new DateTime();
    echo $Formatter->format( '12/23/2018 13:30' )

    2018-12-23 1:30 pm

### Time

    $Formatter = new Time();
    echo $Formatter->format( '13:30' )

    1:30 pm

### PhoneNumber

    $Formatter = new PhoneNumber();
	echo $Formatter->format( "1234567890" )
	
	(123) 456-7890"

# More Information

You can read more about the Neuron components at [neuronphp.com](http://neuronphp.com)
