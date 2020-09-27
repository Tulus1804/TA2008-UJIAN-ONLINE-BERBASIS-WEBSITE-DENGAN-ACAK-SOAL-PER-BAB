<?php
function token($value)
{
    $keyspace = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $value; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}
