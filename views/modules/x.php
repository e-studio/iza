<html>

<body>

<?php
/**
 * Gets the _POST data with correct handling of nested brackets:
 * "path[to][data[nested]]=value"
 * "path"
 *    -> "to"
 *       -> "data[nested]" = value
 * @return array
 */
function get_real_post() {

    function set_nested_value(&$arr, &$keys, &$value) {
        $key = array_shift($keys);
        if (count($keys)) {
            // Got deeper to go
            if (!array_key_exists($key, $arr)) {
                // Make sure we can get deeper if we've not hit this key before
                $arr[$key] = array();
            } elseif (!is_array($arr[$key])) {
                // This should never be relevant for well formed input data
                throw new Exception("Setting a value and an array with the same key: $key");
            }
            set_nested_value($arr[$key], $keys, $value);
        } elseif (empty($key)) {
            // Setting an Array
            $arr[] = $value;
        } else {
            // Setting an Object
            $arr[$key] = $value;
        }
    }

    $input = array();
    $parts = array();
    $pairs = explode("&", file_get_contents("php://input"));
    foreach ($pairs as $pair) {
        $key_value = explode("=", $pair, 2);
        preg_match_all("/([a-zA-Z0-9]*)(?:\[([^\[\]]*(?:(?R)[^\[\]]*)*)\])?/", urldecode($key_value[0]), $parts);
        $keys = array($parts[1][0]);
        if (!empty($parts[2][0])) {
            array_pop($parts[2]); // Remove the blank one on the end
            $keys = array_merge($keys, $parts[2]);
        }
        $value = urldecode($key_value[1]);
        if ($value == "true") {
            $value = true;
        } else if ($value == "false") {
            $value = false;
        } else if (is_numeric($value)) {
            if (strpos($value, ".") !== false) {
                $num = floatval($value);
            } else {
                $num = intval($value);
            }
            if (strval($num) === $value) {
                $value = $num;
            }
        }
        set_nested_value($input, $keys, $value);
    }
    return $input;
}


//var_dump(get_real_post());
var_dump($_POST);
?>

</body>

</html>