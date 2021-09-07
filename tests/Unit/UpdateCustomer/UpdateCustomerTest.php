<?php


namespace Unit\UpdateCustomer;


use TNM\CBS\Requests\IndividualRequest;
use TNM\CBS\Services\CustomerUpdate\FakeCustomerUpdateService;
use TNM\CBS\Services\CustomerUpdate\IIndividualCustomerUpdateService;
use TNM\CBS\Services\CustomerUpdate\IndividualCustomerUpdateClient;
use TNM\CBS\Tests\TestCase;

class UpdateCustomerTest extends TestCase
{
    public function test_customer_update()
    {
        $this->app->bind(IIndividualCustomerUpdateService::class, FakeCustomerUpdateService::class);

        $response = (new IndividualCustomerUpdateClient(new IndividualRequest(['register_customer_key' => 'CSR163065156667f',
            'customer_key' => 'CSR163065156667f',
            'customer_type' => '1',
            'customer_code' => 'CSR163065156667f',
            'id_type' => '5',
            'id_number' => 'FGGDG',
            'title' => '',
            'first_name' => 'Chimwemwe',
            'middle_name' => NULL,
            'last_name' => 'Kampingo',
            'home_address_key' => 'CSR163065156667f',
            'gender' => '1',
            'nationality' => NULL,
            'birthday' => '20001212000000',
            'marital_status' => '',
            'education' => '',
            'occupation' => '',
            'salary' => '',
            'office_phone' => '',
            'home_phone' => '',
            'mobile_phone' => '888999900',
            'fax' => '',
            'email' => NULL,
            'address_key' => 'CSR163065156667f',
            'address1' => 'Lunzu',
            'address2' => '',
            'address3' => '',
            'address4' => '',
            'post_code' => '',
            'trans_id' => 'KYC1630651566E91A5EA'])))->query();

        $this->assertTrue($response->success());
    }
}