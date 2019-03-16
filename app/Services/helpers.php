<?php

function standard_date($timestamp = null)
{
    if ($timestamp) {
        return date('Y-m-d H:i:s', $timestamp);
    }
    return date('Y-m-d H:i:s');
}

/**
 * [
 *      'product_id' => 100,
 *      'channel_id' => 100,
 * ]
 *
 * @param  $seed
 * @param  $min
 * @param  $max
 * @return array
 */
function generate_middle_table($seed, $min, $max)
{
    $data = [];
    $keys = array_keys($seed);
    foreach (range(1, $seed[$keys[0]]) as $value) {
        foreach (array_random(range(1, $seed[$keys[1]]), mt_rand($min, $max)) as $value2) {
            $data[] = [
                $keys[0] => $value,
                $keys[1] => $value2
            ];
        }
    }

    return $data;
}

