<?php

namespace TNM\CBS;

use Illuminate\Support\ServiceProvider;
use TNM\CBS\Services\AirtimeLoan\IAirtimeLoanService;
use TNM\CBS\Services\AvailableOffers\IAvailableOffersService;
use TNM\CBS\Services\BundleSharing\AddBundleSharingRelationship\IAddBundleSharingRelationshipService;
use TNM\CBS\Services\BundleSharing\DeleteBundleSharingRelationship\IDeleteBundleSharingRelationshipService;
use TNM\CBS\Services\BundleSharing\ModifyBundleSharingRelationship\IModifyBundleSharingRelationshipService;
use TNM\CBS\Services\BundleSharing\QueryBundleSharingChildren\IQueryBundleSharingChildrenService;
use TNM\CBS\Services\BundleSharing\QueryBundleSharingParents\IQueryBundleSharingParentsService;
use TNM\CBS\Services\BundleSubscription\IBundleSubscriptionService;
use TNM\CBS\Services\CustomerInfo\ICustomerInfoService;
use TNM\CBS\Services\LoanInfo\ILoanInfoService;
use TNM\CBS\Services\Me2U\IMe2UService;
use TNM\CBS\Services\OneOffDeduction\IOneOffDeductionService;
use TNM\CBS\Services\SubscriberValidity\ISubscriberValidityService;
use TNM\CBS\Services\VoucherRecharge\IVoucherRechargeService;

use TNM\CBS\Services\BundleSharing\DeleteBundleSharingRelationship\DeleteBundleSharingRelationshipService;
use TNM\CBS\Services\AirtimeLoan\AirtimeLoanService;
use TNM\CBS\Services\BundleSharing\AddBundleSharingRelationship\AddBundleSharingRelationshipService;
use TNM\CBS\Services\BundleSharing\ModifyBundleSharingRelationship\ModifyBundleSharingRelationshipService;
use TNM\CBS\Services\BundleSharing\QueryBundleSharingChildren\QueryBundleSharingChildrenService;
use TNM\CBS\Services\BundleSharing\QueryBundleSharingParents\QueryBundleSharingParentsService;
use TNM\CBS\Services\BundleSubscription\BundleSubscriptionService;
use TNM\CBS\Services\CustomerInfo\CustomerInfoService;
use TNM\CBS\Services\LoanInfo\LoanInfoService;
use TNM\CBS\Services\Me2U\Me2UService;
use TNM\CBS\Services\OneOffDeduction\OneOffDeductionService;
use TNM\CBS\Services\SubscriberValidity\SubscriberValidityService;
use TNM\CBS\Services\VoucherRecharge\VoucherRechargeService;
use TNM\CBS\Services\AvailableOffers\AvailableOffersService;


class CbsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/config.php', 'cbs');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'cbs');
    }

    public function register()
    {
        $this->app->bind(ICustomerInfoService::class, CustomerInfoService::class);
        $this->app->bind(IVoucherRechargeService::class, VoucherRechargeService::class);
        $this->app->bind(IMe2UService::class, Me2UService::class);
        $this->app->bind(ILoanInfoService::class, LoanInfoService::class);
        $this->app->bind(IAirtimeLoanService::class, AirtimeLoanService::class);
        $this->app->bind(IBundleSubscriptionService::class, BundleSubscriptionService::class);
        $this->app->bind(IOneOffDeductionService::class, OneOffDeductionService::class);
        $this->app->bind(ISubscriberValidityService::class, SubscriberValidityService::class);
        $this->app->bind(IAddBundleSharingRelationshipService::class, AddBundleSharingRelationshipService::class);
        $this->app->bind(IModifyBundleSharingRelationshipService::class, ModifyBundleSharingRelationshipService::class);
        $this->app->bind(IDeleteBundleSharingRelationshipService::class, DeleteBundleSharingRelationshipService::class);
        $this->app->bind(IQueryBundleSharingChildrenService::class, QueryBundleSharingChildrenService::class);
        $this->app->bind(IQueryBundleSharingParentsService::class, QueryBundleSharingParentsService::class);
        $this->app->bind(IAvailableOffersService::class, AvailableOffersService::class);
    }
}
