<?php

function standard_date($timestamp = null)
{
    if ($timestamp) {
        return date('Y-m-d H:i:s', $timestamp);
    }
    return date('Y-m-d H:i:s');
}

