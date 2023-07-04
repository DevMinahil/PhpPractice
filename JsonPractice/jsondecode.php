<?php

$json = '{"name":"John","age":30,"city":"New York"}';

// JSON_OBJECT_AS_ARRAY: Decodes JSON objects as associative arrays.
$data1 = json_decode($json, true, 512, JSON_OBJECT_AS_ARRAY);
echo "JSON_OBJECT_AS_ARRAY: ";
print_r($data1);
echo "<br>";

// JSON_BIGINT_AS_STRING: Decodes large integers as strings to preserve precision.
$data2 = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
echo "JSON_BIGINT_AS_STRING: ";
print_r($data2);
echo "<br>";

// JSON_OBJECT_AS_ARRAY | JSON_BIGINT_AS_STRING: Combination of both flags.
$data3 = json_decode($json, true, 512, JSON_OBJECT_AS_ARRAY | JSON_BIGINT_AS_STRING);
echo "JSON_OBJECT_AS_ARRAY | JSON_BIGINT_AS_STRING: ";
print_r($data3);
echo "<br>";

// JSON_THROW_ON_ERROR: Throws an exception on JSON decode error (requires PHP 7.3+).
try {
    $data4 = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    echo "JSON_THROW_ON_ERROR: ";
    print_r($data4);
    echo "<br>";
} catch (Exception $e) {
    echo "JSON_THROW_ON_ERROR Exception: " . $e->getMessage() . "<br>";
}

// JSON_INVALID_UTF8_IGNORE: Ignores invalid UTF-8 characters during decoding.
$data5 = json_decode($json, true, 512, JSON_INVALID_UTF8_IGNORE);
echo "JSON_INVALID_UTF8_IGNORE: ";
print_r($data5);
echo "<br>";

// JSON_INVALID_UTF8_SUBSTITUTE: Replaces invalid UTF-8 characters during decoding with U+FFFD (Replacement Character).
$data6 = json_decode($json, true, 512, JSON_INVALID_UTF8_SUBSTITUTE);
echo "JSON_INVALID_UTF8_SUBSTITUTE: ";
print_r($data6);
echo "<br>";

// JSON_OBJECT: Decodes JSON objects as objects of stdClass.
$data7 = json_decode($json, false, 512, JSON_OBJECT);
echo "JSON_OBJECT: ";
var_dump($data7);
echo "<br>";

// JSON_THROW_ON_ERROR | JSON_INVALID_UTF8_SUBSTITUTE: Combination of both flags.
try {
    $data8 = json_decode($json, true, 512, JSON_THROW_ON_ERROR | JSON_INVALID_UTF8_SUBSTITUTE);
    echo "JSON_THROW_ON_ERROR | JSON_INVALID_UTF8_SUBSTITUTE: ";
    print_r($data8);
    echo "<br>";
} catch (Exception $e) {
    echo "JSON_THROW_ON_ERROR Exception: " . $e->getMessage() . "<br>";
}
?>