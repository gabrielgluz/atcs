<?php

function orderByQueuePriority(&$array)
{
    if(empty($array))
        return $array;
    
    foreach ($array as $key => $row) {
        $type_priority[$key] = $row['type_priority'];
        $size_priority[$key] = $row['size_priority'];
        $enqueued_at[$key] = $row['enqueued_at'];
    }

    array_multisort($type_priority, SORT_ASC, $size_priority, SORT_ASC, $enqueued_at, SORT_ASC,$array);

    return $array;
}