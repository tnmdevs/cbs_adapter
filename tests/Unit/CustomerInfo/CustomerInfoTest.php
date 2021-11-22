<?php

namespace TNM\CBS\Tests\Unit\CustomerInfo;

use Illuminate\Support\Facades\Http;
use TNM\CBS\Responses\CustomerInfo\CustomerInfoResponse;
use TNM\CBS\Services\CustomerInfo\CustomerInfoClient;
use TNM\CBS\Services\CustomerInfo\FakeCustomerInfoService;
use TNM\CBS\Services\CustomerInfo\ICustomerInfoService;
use TNM\CBS\Tests\TestCase;

class CustomerInfoTest extends TestCase
{

    public function test_get_customer_info()
    {
        $this->app->bind(ICustomerInfoService::class, FakeCustomerInfoService::class);

        $response = (new CustomerInfoClient('0888800900'))->query();

        $this->assertEquals('102000001270209', $response->getCustomer()->getCustomerKey());
        $this->assertEquals('20211130235959',$response->getActiveTimeLimit());
        $this->assertEquals('1',$response->getCustomer()->getIdType());
        $this->assertEquals('DDFGGRS',$response->getCustomer()->getIdNumber());
        $this->assertEquals('20210923020000',$response->getCustomer()->getIDValidity());
        $this->assertEquals('3',$response->getCustomer()->getTitle());
        $this->assertEquals('Chimwemwe',$response->getCustomer()->getFirstName());
        $this->assertEquals('Chikondi',$response->getCustomer()->getMiddleName());
        $this->assertEquals('Kampingo',$response->getCustomer()->getLastName());
        $this->assertEquals('1520006164',$response->getCustomer()->getHomeAddressKey());
        $this->assertEquals('1',$response->getCustomer()->getGender());
        $this->assertEquals('Malawi',$response->getCustomer()->getNationality());
        $this->assertEquals('19950910000000',$response->getCustomer()->getBirthday());
        $this->assertEquals('3',$response->getCustomer()->getMaritalStatus());
        $this->assertEquals('0',$response->getCustomer()->getEducation());
        $this->assertEquals('0',$response->getCustomer()->getOccupation());
        $this->assertEquals('101000001270210',$response->getAccountKey());


    }

    public function test_get_customer_post_paid_credit_limit()
    {
        $this->withoutExceptionHandling();
        $stub = file_get_contents(__DIR__.'/postpaid.response.xml');
        $result=(new CustomerInfoResponse('QueryCustomerInfoResultMsg','QueryCustomerInfoResult',$stub));

        $creditLimit=$result->getCreditLimit();

        $this->assertEquals('7000000',$creditLimit['TotalCreditAmount']);
        $this->assertEquals('-878334',$creditLimit['TotalUsageAmount']);
        $this->assertEquals('7878334',$creditLimit['TotalRemainAmount']);
    }

    public function _test_get_customer_info_without_bundles()
    {
        $stub = file_get_contents(base_path('tests/Feature/App/Home/no.bundle.response.xml'));

        Http::fake(['*' => Http::response($stub)]);

        $this->seed(DatabaseSeeder::class);

        Bundle::factory()->create(['on_promotion' => true]);

        $response = $this->login('088999971')->get('api/subscriber');


        $response->assertOk();
    }

    public function _test_get_customer_info_without_usage()
    {
        $stub = file_get_contents(base_path('tests/Feature/App/Home/no.usage.response.xml'));
        Http::fake(['*' => Http::response($stub)]);

        $this->seed(DatabaseSeeder::class);

        Bundle::factory()->create(['on_promotion' => true]);

        $response = $this->login('088999997')->get('api/subscriber');

        $response->assertOk();

        $response->assertJsonStructure(['subscriber' => [
            'account_type',
            'ads' => [],
            'balances' => [
                'name', 'phone', 'balance', 'bundles' => [[
                    'name', 'cbs_code', 'value', 'count', 'icon_name', 'icon_color', 'icon_font', 'balance_records' => []
                ]],
            ],
            'offers' => [[
                'id', 'cbs_code', 'balance_account_id', 'name', 'sub_category_id', 'category_id', 'pay', 'get', 'tag', 'validity_period',
                'validity_time', 'color', 'effective_at', 'expires_at', 'sort_order', 'on_promotion',
                'created_at', 'updated_at'
            ]],
            'usage' => [
                'SMS' => ['type', 'value', 'percentage', 'color'],
                'Voice' => ['type', 'value', 'percentage', 'color'],
                'Data' => ['total', 'items' => [
                    ['type', 'value', 'percentage', 'color']
                ]],
            ],
            'updates' => [
                'ios' => ['min', 'warning', 'expire'],
                'android' => ['min', 'warning', 'expire'],
            ],
            'primary_account' => ['name', 'phone'],
        ]]);
    }

    public function _test_get_customer_info_for_postpaid()
    {
        $stub = file_get_contents(base_path('tests/Feature/App/Home/postpaid.response.xml'));
        Http::fake(['*' => Http::response($stub)]);

        $this->seed(DatabaseSeeder::class);

        Bundle::factory()->create(['on_promotion' => true]);

        $response = $this->login('0889399973')->get('api/subscriber');

        $response->assertOk();
        $response->assertJsonStructure(['subscriber' => [
            'account_type',
            'ads' => [],
            'balances' => [
                'name', 'phone', 'balance', 'bundles' => [[
                    'name', 'cbs_code', 'value', 'count', 'icon_name', 'icon_color', 'icon_font', 'balance_records' => [
                        // TODO: check with valid postpaid response
                        //     [
                        //     'value', 'color', 'expiry_time', 'expiry_time_humanised', 'creation_time', 'creation_time_humanised',
                        // ]
                    ]
                ]],
            ],
            'offers' => [[
                'id', 'cbs_code', 'balance_account_id', 'name', 'sub_category_id', 'category_id', 'pay', 'get', 'tag', 'validity_period',
                'validity_time', 'color', 'effective_at', 'expires_at', 'sort_order', 'on_promotion',
                'created_at', 'updated_at'
            ]],
            'usage' => [
                'SMS' => ['type', 'value', 'percentage', 'color'],
                'Voice' => ['type', 'value', 'percentage', 'color'],
                'Data' => ['total', 'items' => [
                    ['type', 'value', 'percentage', 'color']
                ]],
            ],
            'updates' => [
                'ios' => ['min', 'warning', 'expire'],
                'android' => ['min', 'warning', 'expire'],
            ],
            'primary_account' => ['name', 'phone'],
        ]]);
    }

    public function _test_msisdn_validity()
    {
        $stub = file_get_contents(base_path('tests/Feature/App/Home/no.usage.response.xml'));
        Http::fake(['*' => Http::response($stub)]);

        $this->seed(DatabaseSeeder::class);
        $msisdn = '0888999997';

        $response = $this->login($msisdn)->get(sprintf('api/subscriber/validity/%s', $msisdn));

        $response->assertJson([
            "message" => "request successful",
            "errors" => [],
            "trace" => [],
            "validity" => sprintf('The validity period for %s expires in %s', $msisdn, interval_for_humans('20220527151707', false))
        ]);
        $response->assertOk();
    }
}
