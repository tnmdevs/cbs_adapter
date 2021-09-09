<?php


namespace TNM\CBS\Utilities;


class CBS
{
    const MEASURE_UNITS = [
        '1003' => 'Seconds',
        '1004' => 'Minutes',
        '1006' => 'Times',
        '1101' => 'Items',
        '1106' => 'Bytes',
        '1107' => 'KB',
        '1108' => 'MB',
        '1109' => 'GB',
        '1121' => 'Page',
        '1122' => 'Entry'
    ];

    const GENDER = [
        '1' => 'Male',
        '2' => 'Female'
    ];

    const TITLE = [
        '1' => 'Mr',
        '2' => 'Mrs',
        '3' => 'MS'
    ];

    const ACCOUNT_TYPES = [
        '0' => 'PREPAID',
        '1' => 'POSTPAID',
        '3' => 'HYBRID'
    ];
}