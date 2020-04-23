# About Neuron PHP

## Formatting

### Currency

    $Formatter = new Currency();
    $Formatter->setPadLength( 6 );
    echo $Formatter->format( 5 );
    
    __5.00

### Date

	$Formatter = new Date();
    echo $Formatter->format( '12/23/2018')

    2018-12-23
    
### DateTime
    			
    $Formatter = new DateTime();
    echo $Formatter->format( '12/23/2018 13:30')

    2018-12-23 1:30 pm

### Time

    $Formatter = new Time();
    echo $Formatter->format( '13:30' )

    1:30 pm

### PhoneNumber

    $Formatter = new PhoneNumber();
	echo $Formatter->format( "1234567890" )
	
	(123) 456-7890"
