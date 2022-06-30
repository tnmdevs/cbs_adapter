<?php

namespace TNM\CBS;

use Illuminate\Support\ServiceProvider;
use TNM\CBS\Services\AccountBalance\AccountBalanceService;
use TNM\CBS\Services\AccountBalance\IAccountBalanceService;
use TNM\CBS\Services\AdjustLog\AdjustLogService;
use TNM\CBS\Services\AdjustLog\IAdjustLogService;
use TNM\CBS\Services\AirtimeLoan\IAirtimeLoanService;
use TNM\CBS\Services\AvailableOffers\IAvailableOffersService;
use TNM\CBS\Services\BundleSharing\AddBundleSharingRelationship\IAddBundleSharingRelationshipService;
use TNM\CBS\Services\BundleSharing\DeleteBundleSharingRelationship\IDeleteBundleSharingRelationshipService;
use TNM\CBS\Services\BundleSharing\ModifyBundleSharingRelationship\IModifyBundleSharingRelationshipService;
use TNM\CBS\Services\BundleSharing\QueryBundleSharingChildren\IQueryBundleSharingChildrenService;
use TNM\CBS\Services\BundleSharing\QueryBundleSharingParents\IQueryBundleSharingParentsService;
use TNM\CBS\Services\BundleSubscription\IBundleSubscriptionService;
use TNM\CBS\Services\BundleUnsubscription\BundleUnsubscriptionService;
use TNM\CBS\Services\BundleUnsubscription\IBundleUnsubscriptionService;
use TNM\CBS\Services\ConsumptionLimit\ConsumptionLimitService;
use TNM\CBS\Services\ConsumptionLimit\IConsumptionLimitService;
use TNM\CBS\Services\CustomerBalances\IQueryCustomerBalancesService;
use TNM\CBS\Services\CustomerBalances\QueryCustomerBalancesService;
use TNM\CBS\Services\CustomerCreation\IIndividualCustomerCreationService;
use TNM\CBS\Services\CustomerCreation\IndividualCustomerCreationService;
use TNM\CBS\Services\CustomerCreation\IOrgCustomerCreationService;
use TNM\CBS\Services\CustomerCreation\OrgCustomerCreationService;
use TNM\CBS\Services\CustomerInfo\ICustomerInfoService;
use TNM\CBS\Services\CustomerUpdate\IIndividualCustomerUpdateService;
use TNM\CBS\Services\CustomerUpdate\IndividualCustomerUpdateService;
use TNM\CBS\Services\CustomerUpdate\IOrgCustomerUpdateService;
use TNM\CBS\Services\CustomerUpdate\OrgCustomerUpdateService;
use TNM\CBS\Services\Invoices\IInvoicesService;
use TNM\CBS\Services\Invoices\InvoicesService;
use TNM\CBS\Services\LoanInfo\ILoanInfoService;
use TNM\CBS\Services\Me2U\IMe2UService;
use TNM\CBS\Services\OneOffDeduction\IOneOffDeductionService;
use TNM\CBS\Services\PaymentLog\IPaymentLogService;
use TNM\CBS\Services\PaymentLog\PaymentLogService;
use TNM\CBS\Services\QueryBill\IQueryBillService;
use TNM\CBS\Services\QueryBill\QueryBillService;
use TNM\CBS\Services\SubscriberValidity\ISubscriberValidityService;
use TNM\CBS\Services\TotalUsage\ITotalUsageService;
use TNM\CBS\Services\TotalUsage\TotalUsageService;
use TNM\CBS\Services\UpdateAccountInfo\IUpdateAccountInfoService;
use TNM\CBS\Services\UpdateAccountInfo\UpdateAccountInfoService;
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
        $this->app->bind(IIndividualCustomerCreationService::class,IndividualCustomerCreationService::class);
        $this->app->bind(IOrgCustomerCreationService::class,OrgCustomerCreationService::class);
        $this->app->bind(IOrgCustomerUpdateService::class,OrgCustomerUpdateService::class);
        $this->app->bind(IIndividualCustomerUpdateService::class,IndividualCustomerUpdateService::class);
        $this->app->bind(IUpdateAccountInfoService::class,UpdateAccountInfoService::class);
        $this->app->bind(IInvoicesService::class,InvoicesService::class);
        $this->app->bind(IPaymentLogService::class,PaymentLogService::class);
        $this->app->bind(IAdjustLogService::class,AdjustLogService::class);
        $this->app->bind(IQueryCustomerBalancesService::class,QueryCustomerBalancesService::class);
        $this->app->bind(IConsumptionLimitService::class,ConsumptionLimitService::class);
        $this->app->bind(ITotalUsageService::class, TotalUsageService::class);
        $this->app->bind(IQueryBillService::class, QueryBillService::class);
        $this->app->bind(IBundleUnsubscriptionService::class,BundleUnsubscriptionService::class);
        $this->app->bind(IAccountBalanceService::class,AccountBalanceService::class);
    }
}
