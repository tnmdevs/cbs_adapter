<?php


namespace TNM\CBS\Utilities;


class CBS
{
    const CURRENCY=[
        '1102'=>'MWK'
    ];

    const CUSTOMER_TYPE=[
        '1'=>'Individual',
        '2'=>'Organisation',
        '3'=>'Family'
    ];

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

    const ERROR_CODES=[
        '20000001','20000002','20000003','20000004','20000005','118032454'
    ];

    const ERRORS_MAP=[
        'The free unit entrusted payment relationship to delete does not exist.'=>'Relationship does not exist.',
        'The entrusting subscriber in the new free unit entrusted payment relationship has another entrusted subscriber.'=>'The child belongs to another sharing group.',
        'The entrusting subscriber in the new free unit entrusted payment relationship is the entrusted subscriber in another free unit entrusted payment relationship.'=>'The child belongs to another sharing group.',
        'The entrusted subscriber in the new free unit entrusted payment relationship is an entrusting subscriber in another free unit entrusted payment relationship.'=>'The parent belongs to another sharing group.',
        'The voucher does not exist in the VC.'=>'The voucher does not exist',
        'The number of valid sharing relationships of free units under a same offering is larger than the maximum number of valid sharing relationships allowed by the VGS solution.'=>'Reached the maximum number of valid sharing relationships.',
        'The entrusted and entrusting subscribers in the free unit entrusted payment relationship are the same.'=>'Cannot create a sharing relationship with the same number',
        'The value  of FreeUnitType transferred does not exist.'=>'Transferred value is insufficient',
        'In the transfer information, the transfer-in and transfer-out accounts are the same and the transfer-in account book type is the same as the transfer-out account book type.'=>'Cannot transfer to same number',
        "Loan application failed because the subscriber's service activity period is shorter than the preset threshold."=>"Loan application failed because the service activity period is shorter",
        "Supplementary offerings  and  are exclusive with each other. The offerings cannot have subscription instances for the same period."=>"You already have an active Pamtsetse bundle"
    ];
}