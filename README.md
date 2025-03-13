# Exrray

Exrray is a PHP library that provides a collection of array functions to simplify array manipulation. It includes features such as merging arrays, walking through arrays, and accessing or setting values using dot notation.

## Installation

You can install Exrray via Composer:

```bash
composer require dot-array/dot-array
```

## Usage

### Accessing and Setting Values Using Dot Notation

You can get and set values in an array using dot notation with the `DotArray` class:

```php
use Exrray\DotArray;

$array = ['a' => ['b' => ['c' => 3]]];

// Get a value
$value = DotArray::get($array, 'a.b.c');
echo $value; // Output: 3

// Set a value
DotArray::set($array, 'a.b.d', 4);
print_r($array);
// Output:
// Array
// (
//     [a] => Array
//         (
//             [b] => Array
//                 (
//                     [c] => 3
//                     [d] => 4
//                 )
//         )
// )
```

### Merging Arrays to a Specific Path

You can merge arrays to a specific path using the `mergeTo` method:

```php
use Exrray\DotArray;

$array1 = ['a' => ['b' => ['c' => 3]]];
$array2 = ['d' => 4];

DotArray::mergeTo('a.b', $array1, $array2);

print_r($array1);
// Output:
// Array
// (
//     [a] => Array
//         (
//             [b] => Array
//                 (
//                     [c] => 3
//                     [d] => 4
//                 )
//         )
// )
```

### Merging Arrays

You can merge two arrays using the `merge` method:

```php
use Exrray\Exrray;

$array1 = ['a' => 1, 'b' => ['c' => 3]];
$array2 = ['b' => ['d' => 4], 'e' => 5];

$result = Exrray::merge($array1, $array2);

print_r($result);
// Output:
// Array
// (
//     [a] => 1
//     [b] => Array
//         (
//             [c] => 3
//             [d] => 4
//         )
//     [e] => 5
// )
```

### Walking Through Arrays

You can walk through an array and apply a callback to each value using the `walk` method:

```php
use Exrray\Exrray;

$array = [1, 2, [3, 4]];

Exrray::walk($array, function(&$value, $key) {
    $value *= 2;
});

print_r($array);
// Output:
// Array
// (
//     [0] => 2
//     [1] => 4
//     [2] => Array
//         (
//             [0] => 6
//             [1] => 8
//         )
// )
```

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request for any changes.

## Contact

For any questions or inquiries, please contact the project maintainer.
