<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseTransaction;

class PaymentTransactionController extends Controller
{
    // TransactionController
    public function payment_report()
    {
        $transactions = PurchaseTransaction::all();

        return view('panel.transaction.payment', [
            'transactions' => $transactions
        ]);
    }

    public function product_report()
    {
        $products = Product::with('transactions')->get();

        return view('panel.transaction.products', [
            'products' => $products
        ]);
    }
}