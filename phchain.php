<?php

/**
 * PHChain - Function Chainer for PHP.
 */

/**
 * phchain().
 *
 * Pass an array of functions into this function and it will return a function.
 * Now if you pass a value to that returned function it will run through all
 * those functions, passing the value to the first, then passing the result of
 * the first function as the parameter to the second function, passing the 
 * result of the second to the third etc.
 *
 * <code>
 * $process = phchain(array(
 *     function($extractIdFrom) { return $extractIdFrom['id']; },
 *     function($numberToAddOneTo) { return $numberToAddOneTo + 1; },
 *     function($multiplyByTwo) { return $multiplyByTwo * 2; }
 * ));
 * echo "The result is " . $process(array('id'=>4)); // 10
 *
 * </code>
 *
 * @param Array $functions An array of functions to chain together
 * @return Function
 */
function phchain($functions) {
	return function($item) use ($functions) {
		if (sizeof($functions) === 0) { return $item; }
		$length = sizeof($functions);
		$r = null;
		for ($i=0; $i<$length; $i++) {
			$r = call_user_func(
				$functions[$i],
				($i == 0) ? $item : $r
			);
		}
		return $r;
	};
};
