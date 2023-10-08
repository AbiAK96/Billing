<?php

namespace App\Repositories;

use App\Models\Billing;
use App\Models\BillingItem;
use App\Models\BillingTax;

class InvoiceRepository
{
    public function get()
    {
        return Billing::with('status','customer','organization')->where('organization_id',auth()->user()->organization_id)->OrderBy('id', 'desc')->paginate(10);
    }

    public function find($id)
    {
        $billing = Billing::with('status','customer','organization')->where('organization_id',auth()->user()->organization_id)->find($id);
        $billingItems = BillingItem::with('product')->where('billing_id',$id)->get();
        $billingTax = BillingTax::with('tax')->where('billing_id',$id)->get();
        $billing->billingItems = $billingItems;
        $billing->billingTax = $billingTax;
        return $billing;
    }
}