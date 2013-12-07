<?php

require 'phchain.php';

class PHPartialTest extends PHPUnit_Framework_TestCase
{
    
    public function testWillRunThroughFunctionsInOrder()
    {
		$process = phchain(array(
			function($extractIdFrom) { return $extractIdFrom['id']; },
			function($numberToAddOneTo) { return $numberToAddOneTo + 1; },
			function($multiplyByTwo) { return $multiplyByTwo * 2; }
		));
		$this->assertEquals($process(array('id'=>4)), 10);
    }
    
    public function testWillReturnValueWhenNoFunctionsSupplied()
    {
    	$process = phchain(array());
    	$this->assertEquals($process(45), 45);
    }
    
}
?>
