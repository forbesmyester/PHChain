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
		$this->assertEquals(10, $process(array('id'=>4)));
    }
    
    public function testWillReturnValueWhenNoFunctionsSupplied()
    {
    	$process = phchain(array());
    	$this->assertEquals(45, $process(45));
    }
    
}
?>
