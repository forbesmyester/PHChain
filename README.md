# PHChain - Function Chainer for PHP.

Pass an array of functions into this function and it will return a function.
Now if you pass a value to that returned function it will run through all
those functions, passing the value to the first, then passing the result of
the first function as the parameter to the second, passing the result of the
second to the third etc.

```php
<?php
$process = phchain(array(
    function($extractIdFrom) { return $extractIdFrom['id']; },
    function($numberToAddOneTo) { return $numberToAddOneTo + 1; },
    function($multiplyByTwo) { return $multiplyByTwo * 2; }
));
echo "The result is " . $process(array('id'=>4)); // 10
?>
```
