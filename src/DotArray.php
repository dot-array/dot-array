<?php
namespace DotArray;

/**
 * DotArray
 * 
 * A collection of array functions that use dot notation
 */
class DotArray extends Exrray
{
    /**
     * Get a value from an array using dot notation
     * 
     * @param array $array    The array to get the value from
     * @param string $path    The path to the value
     * @param mixed $default  The default value to return if the path does not exist
     * 
     * @return mixed
     */
    public static function &get(array &$array, string $path, mixed $default = null): mixed
    {
        $path = array_filter(explode('.', $path));
        $current = &$array;

        foreach ($path as $key) {
            if (!is_array($current) || !array_key_exists($key, $current)) {
                return $default;
            }

            $current = &$current[$key];

            if (is_callable($current)) {
                $current = $current();
            }
        }

        return $current;
    }

    /**
     * Set a value in an array using dot notation
     * 
     * @param array $array    The array to set the value in
     * @param string $path    The path to the value
     * @param mixed $value    The value to set
     * 
     * @return void
     */
    public static function set(array &$array, string $path, mixed $value): void
    {
        $path = array_filter(explode('.', $path));
        $current = &$array;

        foreach ($path as $key) {
            if (!is_array($current)) {
                $current = [];
            }

            $current = &$current[$key];
        }

        $current = $value;
    }

    /**
     * Merge two arrays
     * 
     * @param array $array1   The first array
     * @param array $array2   The second array
     * 
     * @return array
     */
    public static function mergeTo(string $path, array &$array1, array &$array2): void
    {
        $value = &static::get($array1, $path);

        if (is_array($value)) {
            static::merge($value, $array2);
        } else {
            static::set($array1, $path, $array2);
        }
    }
}