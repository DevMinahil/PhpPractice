
<?php
$data = [
    'name' => '<script>alert("XSS Attack");</script>',
    'message' => "It's a \"quote\" and \\backslash\\ example.",
    'unicode' => '♥'
];

// JSON_HEX_TAG: All < and > are converted to \u003C and \u003E.
$json1 = json_encode($data, JSON_HEX_TAG);
echo "JSON_HEX_TAG: " . $json1 . "<br>";

// JSON_HEX_APOS: All ' are converted to \u0027.
$json2 = json_encode($data, JSON_HEX_APOS);
echo "JSON_HEX_APOS: " . $json2 . "<br>";

// JSON_HEX_QUOT: All " are converted to \u0022.
$json3 = json_encode($data, JSON_HEX_QUOT);
echo "JSON_HEX_QUOT: " . $json3 . "<br>";

// JSON_HEX_AMP: All & are converted to \u0026.
$json4 = json_encode($data, JSON_HEX_AMP);
echo "JSON_HEX_AMP: " . $json4 . "<br>";

// JSON_NUMERIC_CHECK: Encodes numeric strings as numbers.
$json5 = json_encode($data, JSON_NUMERIC_CHECK);
echo "JSON_NUMERIC_CHECK: " . $json5 . "<br>";

// JSON_PRETTY_PRINT: Prints the JSON with indentation and line breaks for better readability.
$json6 = json_encode($data, JSON_PRETTY_PRINT);
echo "JSON_PRETTY_PRINT: <pre>" . $json6 . "</pre><br>";

// JSON_UNESCAPED_SLASHES: Do not escape /.
$json7 = json_encode($data, JSON_UNESCAPED_SLASHES);
echo "JSON_UNESCAPED_SLASHES: " . $json7 . "<br>";

// JSON_UNESCAPED_UNICODE: Do not escape Unicode characters.
$json8 = json_encode($data, JSON_UNESCAPED_UNICODE);
echo "JSON_UNESCAPED_UNICODE: " . $json8 . "<br>";

// JSON_PARTIAL_OUTPUT_ON_ERROR: Returns partial JSON output on encountering invalid UTF-8 sequences.
$json9 = json_encode($data, JSON_PARTIAL_OUTPUT_ON_ERROR);
echo "JSON_PARTIAL_OUTPUT_ON_ERROR: " . $json9 . "<br>";

// JSON_THROW_ON_ERROR: Throws an exception on JSON encode error (requires PHP 7.3+).
try {
    $json10 = json_encode($data, JSON_THROW_ON_ERROR);
    echo "JSON_THROW_ON_ERROR: " . $json10 . "<br>";
} catch (Exception $e) {
    echo "JSON_THROW_ON_ERROR Exception: " . $e->getMessage() . "<br>";
}
?>