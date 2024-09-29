<?php
function requiredValue($input) {
    if (empty($input)) {
        return false;
    }
    return true;
}
function minValue($input,$length) {
    if (strlen($input) < $length) {
        return false;
    }
    return true;
}
function maxValue($input,$length) {
    if (strlen($input) > $length) {
        return false;
    }
    return true;
}
function emailValue($input) {
    return filter_var($input, FILTER_VALIDATE_EMAIL) !== false;
}