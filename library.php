<?php
function count_char($string, $char) {
    if (strlen($char) != 1) {
        throw new Exception('Second argument must be a single character');
    }
    $count = 0;
    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] == $char) {
            $count++;
        }
    }
    return $count;
}

function replace($string, $char, $replacement) {
    if (strlen($char) != 1) {
        throw new Exception('Second argument must be a single character');
    }
    $new_string = '';
    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] == $char) {
            $new_string .= $replacement;
        } else {
            $new_string .= $string[$i];
        }
    }
    return $new_string;
}

function inverse($string) {
    $new_string = '';
    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        $new_string .= $string[$i];
    }
    return $new_string;
}

function split_str($string) {
    $string .= ' ';
    $array = [];
    $word = '';
    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] == ' ') {
            $array[] = $word;
            $word = '';
        } else {
            $word .= $string[$i];
        }
    }
    return $array;
}

function get_alpha($string) {
    $latin = 'abcdefghijklmnopqrstuvwxyz';
    $cyrillic = 'абвгґдеёжзиіїйклмнопрстуфхцчшщъыьэюя';
    $contains_latin = false;
    $contains_cyrillic = false;
    for ($i = 0; $i < strlen($string); $i++) {
        if (strpos($latin, $string[$i])) {
            $contains_latin = true;
        }
        if (strpos($cyrillic, $string[$i])) {
            $contains_cyrillic = true;
        }
    }
    if ($contains_latin && $contains_cyrillic) {
        return 'both';
    } elseif ($contains_latin) {
        return 'latin';
    } elseif ($contains_cyrillic) {
        return 'cyrillic';
    } else {
        return 'none';
    }
}