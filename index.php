<?php

function _explode($separator, $string)
{
    $array = [];
    if ($separator == "") {
        for ($i = 0; $i < strlen($string); $i++) {
            $array[$i] = $string[$i];
        }
    } else {
        $temp = "";
        for ($i = 0; $i < strlen($string); $i++) {

            if ($string[$i] == $separator) {
                $array[] = $temp;
                $temp = "";
            } elseif ($i == strlen($string) - 1) {
                $temp .= $string[$i];
                $array[] = $temp;
                $temp = "";
            } else {
                $temp .= $string[$i];
            }
        }
    }

    return $array;
}
function _strpos($haystack, $needle, $offset = 0)
{
    if ($needle == "") {
        return false;
    }
    $position = false;
    $temp = "";
    $found = false;
    for ($i = $offset; $i < strlen($haystack); $i++) {
        if (strlen($needle) == 1) {
            if ($haystack[$i] == $needle) {
                return $i;
            }
        } else {
            if ($found) {
                $temp .= $haystack[$i];
                if ($temp == $needle) {
                    break;
                }
            } else {
                $needle_first_character = _explode("", $needle)[0];
                if ($haystack[$i] == $needle_first_character) {
                    $position = $i;
                    $temp .= $haystack[$i];
                    $found = true;
                }
            }
        }
    }
    return $temp == $needle ? $position : false;
}
function _str_contains($haystack, $needle)
{
    if (strlen($needle) == 0) {
        return true;
    }

    return _strpos($haystack, $needle) !== false;
}
function _str_repeat($string, $times)
{
    $temp = "";
    for ($i = 0; $i < $times; $i++) {
        $temp .= $string;
    }
    return $temp;
}
function _strtoupper($string)
{
    $upper_characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $lower_characters = "abcdefghijklmnopqrstuvwxyz";
    $temp = "";
    for ($i = 0; $i < strlen($string); $i++) {
        if (_str_contains($upper_characters, $string[$i])) {
            $temp .= $string[$i];
        } elseif (_str_contains($lower_characters, $string[$i])) {
            $index_of_lower_character = _strpos($lower_characters, $string[$i]);
            $temp .= $upper_characters[$index_of_lower_character];
        } else {
            $temp .= $string[$i];
        }
    }
    return $temp;
}
function _strtolower($string)
{
    $upper_characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $lower_characters = "abcdefghijklmnopqrstuvwxyz";
    $temp = "";
    for ($i = 0; $i < strlen($string); $i++) {
        if (_str_contains($upper_characters, $string[$i])) {
            $index_of_upper_character = _strpos($upper_characters, $string[$i]);
            $temp .= $lower_characters[$index_of_upper_character];
        } elseif (_str_contains($lower_characters, $string[$i])) {
            $temp .= $string[$i];
        } else {
            $temp .= $string[$i];
        }
    }
    return $temp;
}
function _lcfirst($string)
{
    $temp = _strtolower(_explode("", $string)[0]);
    for ($i = 1; $i < strlen($string); $i++) {
        $temp .= $string[$i];
    }
    return $temp;
}
function _ucfirst($string)
{
    $temp = _strtoupper(_explode("", $string)[0]);
    for ($i = 1; $i < strlen($string); $i++) {
        $temp .= $string[$i];
    }
    return $temp;
}
function _strstr($haystack, $needle, $before_needle = false)
{
    $index_of_needle = _strpos($haystack, $needle);
    $temp = "";
    if ($before_needle) {
        for ($i = 0; $i < $index_of_needle; $i++) {
            $temp .= $haystack[$i];
        }
    } else {
        for ($i = $index_of_needle; $i < strlen($haystack); $i++) {
            $temp .= $haystack[$i];
        }
    }
    return $temp;
}
function _str_max($str1, $str2)
{
    if (strlen($str1) > strlen($str2)) {
        return $str1;
    } else {
        return $str2;
    }
}
function _str_min($str1, $str2)
{
    if (strlen($str1) < strlen($str2)) {
        return $str1;
    } else {
        return $str2;
    }
}

function _substr($string, $offset, $length = null)
{
    if ($length == null) {
        $length = strlen($string);
    }
    $temp = "";
    for ($i = $offset; $i < $offset + $length; $i++) {
        if (isset($string[$i])) {
            $temp .= $string[$i];
        } else {
            break;
        }
    }
    return $temp;
}

function _strlen($string)
{
    $count = 0;
    while (isset($string[$count])) {
        $count++;
    }
    return $count;
}

function _str_reverse($string)
{
    $temp = "";
    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        $temp .= $string[$i];
    }
    return $temp;
}

function _ltrim($string)
{
    $temp = "";
    $bool = false;
    for ($i = 0; $i < strlen($string); $i++) {

        if ($bool) {
            $temp .= $string[$i];
        } else {
            if ($string[$i] == " ") {
                continue;
            } else {
                $temp .= $string[$i];
                $bool = true;
            }
        }
    }
    return $temp;
}
function _rtrim($string)
{
    $reverse = _str_reverse($string);
    $temp = _str_reverse(_ltrim($reverse));

    return $temp;
}
function _trim($string)
{
    return _ltrim(_rtrim($string));
}

function _word_count($string)
{
    $temp = _explode(" ", $string);
    return count($temp);
}

function _srt_shuffle($string)
{
    $temp = "";
    $round = round(0, strlen($string) - 1);
    while (true) {
        if (!_str_contains($temp, $string[$round])) {
            $temp .= $string[$round];
        }

        if (strlen($temp) == strlen($string)) {
            break;
        }
    }
}


// ------------------------------------------------------------------
// echo _strstr("hamza@gamil.com","@",true); 


function _reset($arr)
{
    $temp = [$arr[0]];
    return $temp;
}

function _array_push($array, ...$values)
{
    foreach ($values as $value) {
        $array[] = $value;
    }
    return $array;
}
function _array_pop(&$array)
{
    $temp = $array[count($array) - 1];
    unset($array[count($array) - 1]);
    return $temp;
};

function _array_reverse($array)
{
    $temp = [];
    for ($i = count($array) - 1; $i >= 0; $i--) {
        $temp[] = $array[$i];
    }
    return $temp;
}

function _array_shift(&$array)
{
    $temp = $array[0];
    unset($array[0]);
    return $temp;
}

function _array_count_values($array)
{
    $temp = [];
    for ($i = 0; $i < count($array); $i++) {
        if (isset($temp[$array[$i]])) {
            $temp[$array[$i]]++;
        } else {
            $temp[$array[$i]] = 1;
        }
    }
    return $temp;
}

function _array_column($array, $column_key)
{
    $temp = [];
    for ($i = 0; $i < count($array); $i++) {
        $temp[] = $array[$i][$column_key];
    }
    return $temp;
}

function _array_combine($keys, $values)
{
    $temp = [];
    if (count($keys) == count($values)) {
        for ($i = 0; $i < count($keys); $i++) {
            $temp[$keys[$i]] = $values[$i];
        }
        return $temp;
    } else {
        return;
    }
}

function _count($array)
{
    $temp = 0;
    while (true) {
        if (isset($array[$temp])) {
            $temp++;
        } else {
            break;
        }
    }

    return $temp;
}


function _array_search($needle, $haystack)
{
    if (count($haystack) == 0) {
        return false;
    }

    foreach ($haystack as $key => $value) {
        if ($value == $needle) {
            return $key;
        }
    }
}

function _array_fill($start_index, $count, $value)
{
    $temp = [];
    for ($i = $start_index; $i < $start_index + $count; $i++) {
        $temp[] = $value;
    }
    return $temp;
}

function _is_array($array)
{
    if (gettype($array) == "array") {
        return true;
    }
    return false;
}

// function is_number($number){
//     if(gettype($array) == "array"){
//         return true;
//     }
//     return false;
// }

function _is_string($string)
{
    if (gettype($string) == "string") {
        return true;
    }
    return false;
}
function _is_int($int)
{
    if (gettype($int) == "integer") {
        return true;
    }
    return false;
}

function _is_float($float)
{
    if (gettype($float) == "double") {
        return true;
    }
    return false;
}


function _is_bool($bool)
{
    if (gettype($bool) == "boolean") {
        return true;
    }
    return false;
}
function _is_null($null)
{
    if (gettype($null) == "NULL") {
        return true;
    }
    return false;
}
function _is_object($object)
{
    if (gettype($object) == "object") {
        return true;
    }
    return false;
}
function _is_resource($resource)
{
    if (gettype($resource) == "resource") {
        return true;
    }
    return false;
}
function _is_scalar($scalar)
{
    if (gettype($scalar) == "string" || gettype($scalar) == "integer" || gettype($scalar) == "double" || gettype($scalar) == "boolean") {
        return true;
    }
    return false;
}

// function _is_callable($callable)
// {
//     if (is_callable($callable)) {
//         return true;
//     }
//     return false;
// }

// function _is_iterable($iterable)
// {
//     if (is_iterable($iterable)) {
//         return true;
//     }
//     return false;
// }

// function _is_countable($countable)
// {
//     if (is_countable($countable)) {
//         return true;
//     }
//     return false;
// }

// function _array_is_list($array){
//     foreach($array as $key => $value ){
//         if(isset($value)){
//             echo $key;
//         }
//     }
//     // return true;
// }

// $array = [2,3,4,1];
// echo _array_is_list($array);

function _array_keys($array)
{
    $temp = [];
    foreach ($array as $key => $value) {
        $temp[] = $key;
    }
    return $temp;
}

function _array_values($array)
{
    $temp = [];
    foreach ($array as $key => $value) {
        $temp[] = $value;
    }
    return $temp;
}

function _in_array($needle, $haystack)
{
    foreach ($haystack as  $value) {
        if ($value == $needle) {
            return true;
        }
    }
    return false;
}

function _get_year()
{
    return date("Y");
}

function _get_month()
{
    return date("m");
}

function _get_day()
{
    return date("d");
}

function _get_hour()
{
    return date("H");
}

function _get_minute()
{
    return date("i");
}

function _get_second()
{
    return date("s");
}
// 51

function _get_date()
{
    return date("Y-m-d");
}
function _get_time()
{
    return date("H:i:s");
};

function _get_datetime()
{
    return date("Y-m-d H:i:s");
}

function _empty($value)
{
    if ($value == null || $value == "" || $value == false || $value == []) {
        return true;
    }
    return false;
}
function _is_upper($string)
{
    if ($string == strtoupper($string)) {
        return true;
    }
    return false;
}
function _is_lower($string)
{
    if ($string == strtolower($string)) {
        return true;
    }
    return false;
}
function _floatval($string)
{
    $temp = "";
    foreach (_explode("", $string) as $char) {
        if ($char >= 0 || $char <= 9) {
            $temp .= $char;
        } elseif ($char == ".") {
            $temp .= ".";
        }
    }
    return $temp;
}

function _boolval($value)
{
    if ($value == "" || $value == [] || $value == null || $value == 0 || $value == false) {
        return false;
    }
    return true;
}

function _checkdate($month, $day, $year)
{
    if (($month > 1 || $month <= 12) && ($day > 1 || $day <= 31) && ($year > 1 || $year <= 32767)) {
        return true;
    }
    return false;
}

function _is_am($time)
{
    $arr = _explode(":", $time);
    if ($arr[0] < 12) {
        return true;
    }
    return false;
}

function _is_pm($time)
{
    $arr = _explode(":", $time);
    if ($arr[0] > 12) {
        return true;
    }
    return false;
}

function _abs($number)
{
    if ($number < 0) {
        return -$number;
    }
    return $number;
}
function _pi()
{
    return 3.14;
}

function _max(...$values)
{
    $temp = $values[0];
    foreach ($values as $value) {
        if ($value > $temp) {
            $temp = $value;
        }
    }
    return $temp;
}

function _min(...$values)
{
    $temp = $values[0];
    foreach ($values as $value) {
        if ($value < $temp) {
            $temp = $value;
        }
    }
    return $temp;
}

function _pow($number, $power)
{
    $temp = 1;
    for ($i = 0; $i < $power; $i++) {
        $temp *= $number;
    }
    return $temp;
}
// 67
function _round($num, $precision = 0)
{
    $temp = "";
    $counter = 1;
    $array = _explode("", $num);
    if ($precision == 0) {
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i + 1] == '.') {
                if ($array[$i + 2] >= 5) {
                    $temp .= $array[$i] + 1;
                    break;
                } else {
                    $temp .= $array[$i];
                    break;
                }
            }
            $temp .= $array[$i];
        }
    } else {
        $aftreDot = false;
        for ($i = 0; $i < count($array); $i++) {
            if (!$aftreDot) {
                if ($array[$i] == '.') {
                    $aftreDot = true;
                }
                $temp .= $array[$i];
            } else {
                if ($counter  == $precision) {
                    if ($array[$i + 1] >= 5) {
                        $temp .= $array[$i] + 1;
                        break;
                    } else {
                        $temp .= $array[$i];
                        break;
                    }
                } else {
                    $temp .= $array[$i];
                    $counter++;
                }
            }
        }
    }
    return $temp;
}

function _is_finite($number)
{
    return $number == INF ? false : true;
}

function _is_infinite($number)
{
    return $number == INF ? true : false;
}

function _isset($var)
{
    if ($var != null) {
        return true;
    }
    return false;
}


function _unset($var)
{
    if ($var != null) {
        $var = null;
    }
    return false;
}

function _print_r($array)
{
    $temp = "(\n";
    for ($i = 0; $i < count($array); $i++) {
        $temp .= "[" . $i . "] => " . strval($array[$i]) . "\n";
    }
    $temp .= ")";

    return $temp;
}

function _var_dump($array)
{
    $temp = "array(" . strval(count($array)) . ") {\n";
    for ($i = 0; $i < count($array); $i++) {
        $temp .= "[" . $i . "] => " . gettype($array[$i]) . "(" . strval($array[$i]) . ") \n";
    }
    $temp .= "}";

    return $temp;
}

function  _is_nan($number)
{
    return $number == NAN ? false : true;
}

function _strpbrk($string, $characters)
{
    $temp = "";
    $charactersArray = _explode("", $characters);
    $bool = false;
    for ($i = 0; $i < strlen($string); $i++) {

        if (!$bool) {
            if (in_array($string[$i], $charactersArray)) {
                $temp .= $string[$i];
                $bool = true;
            }
        } else {
            $temp .= $string[$i];
        }
    }
    return $temp;
}

// echo _strpbrk("hello world", "w");

function _strrchr($haystack, $needle)
{
    $temp = "";
    for ($i = strlen($haystack) - 1; $i >= 0; $i--) {
        $temp .= $haystack[$i];
        if ($haystack[$i] == $needle) {
            break;
        }
    }

    if (_str_contains($temp, $needle)) {
        return _str_reverse($temp);
    } else {
        return false;
    }
}


function _start_with($haystack, $needle)
{
    if ($needle = "") {
        return true;
    } else {
        if (_strpos($haystack, $needle) == 1) {
            return true;
        } else {
            return false;
        }
    }
}
function _end_with($haystack, $needle)
{
    if ($needle = "") {
        return true;
    } else {
        if (_strpos(_str_reverse($haystack), $needle) == 1) {
            return true;
        } else {
            return false;
        }
    }
}

function _quotemeta($string)
{
    $char = ".\+*?[^]($)";
    $temp = "";
    for ($i = 0; $i < strlen($string); $i++) {
        if (isset($string[$i + 1])) {
            if (_str_contains($char, $string[$i + 1])) {
                $temp .= $string[$i];
                $temp .= "\\";
            } else {
                $temp .= $string[$i];
            }
        } else {
            $temp .= $string[$i];
            break;
        }
    }

    return $temp;
}

// 80
function _filesize($filePath)
{
    $number = filesize($filePath);
    if ($number > 0 && $number < 1024) {
        return $number . " B";
    } else if ($number >= 1024 && $number < 1024 * 1024) {
        return round($number / 1024, 2) . " KB";
    } else if ($number >= 1024 * 1024 && $number < 1024 * 1024 * 1024) {
        return round($number / 1024 / 1024, 2) . " MB";
    } else if ($number >= 1024 * 1024 * 1024) {
        return round($number / 1024 / 1024 / 1024, 2) . " GB";
    }
}

function _randomFileName()
{
    return  rand(1, 999999) . "-" . date("Y-m-d_H:i:s");
}

function _randomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#$%^&*()!~?/\\+=';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function subarray($array, $start, $end)
{
    $temp = [];
    for ($i = $start; $i <= $end; $i++) {
        $temp[] = $array[$i];
    }
    return $temp;
}

function _array_unshift($array, ...$values)
{
    $temp = [];
    foreach ($values as $value) {
        $temp[] = $value;
    }
    foreach ($array as $value) {
        $temp[] = $value;
    }
    return $temp;
}

function _get_year_from($date)
{
    $array = _explode("-", $date);
    return $array[0];
}
function _get_month_from($date)
{
    $array = _explode("-", $date);
    return $array[1];
}

function _get_day_from($date)
{
    $array = _explode("-", $date);
    return $array[2];
}
function _get_hour_from($date)
{
    $array = _explode(":", $date);
    return $array[0];
}
function _get_minute_from($date)
{
    $array = _explode(":", $date);
    return $array[1];
}

function _get_second_from($date)
{
    $array = _explode(":", $date);
    return $array[2];
}

function _array_key_first($array)
{
    foreach ($array as $key => $value) {
        return $key;
    }
}

function _array_key_last($array)
{
    $temp = [];
    foreach ($array as $key => $value) {
        $temp[] = $key;
    }
    return $temp[count($temp) - 1];
}

function _array_key_exists($key, $array)
{
    if (isset($array[$key])) {
        return true;
    }
    return false;
}


function _array_unique($array)
{
    $temp = [];
    foreach ($array as $value) {
        if (!in_array($value, $temp)) {
            $temp[] = $value;
        }
    }
    return $temp;
}
// 95
function _array_sum($array)
{
    $temp = 0;
    foreach ($array as $value) {
        $temp += $value;
    }
    return $temp;
}

function _array_concat($array, $array2)
{
    $temp = [];
    foreach ($array as $value) {
        $temp[] = $value;
    }
    foreach ($array2 as $value) {
        $temp[] = $value;
    }
}

function _array_intersection($array, $array2)
{
    $temp = [];
    foreach ($array as $value) {
        if (in_array($value, $array2)) {
            $temp[] = $value;
        }
    }
    return $temp;
}

function _array_union($array, $array2)
{
    $temp = [];
    foreach ($array as $value) {
        $temp[] = $value;
    }
    foreach ($array2 as $value) {
        if (!in_array($value, $temp)) {
            $temp[] = $value;
        }
    }
    return $temp;
}

function _is_set($array)
{
    $temp = [];
    foreach ($array as $value) {
        if (in_array($value, $temp)) {
            return false;
        } else {
            $temp[] = $value;
        }
    }

    return true;
}
echo _is_set([1, 5, 1, 2, 3]);
// 100

function _hash($input, $salt)
{
    $characters = "AT%iCjDWfXqlFGgHcIJKB#LwMdhENOaRSeUVbmnprtuxy012k3Q4v56PY7s89@zoZ&";
    $inputReverse = _str_reverse($input);
    $hash = '';
    for ($i = 0; $i < strlen($input); $i++) {
        if (abs(strpos($inputReverse, $input[$i]) + $salt - $i) <= strlen($characters) - 1) {
            $hash .= $characters[strpos($inputReverse, $input[$i]) + $salt - $i];
        } else {
            $hash .= $characters[$characters % abs((strpos($inputReverse, $input[$i]) + $salt - $i))];
        }
    }
    return $hash;
}

echo _hash("hamza omar balala", 7);
