<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Payment;
use Illuminate\Http\Request;
// use App\Http\Requests\StorePaymentRequest;
// use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Payment::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'amount' => 'integer',
            'account_id' => 'exists:accounts,id'
        ]);

        $account = Account::find($validated["account_id"]);

        $payment = Payment::create([
            'amount' => $validated["amount"],
            'account_id' => $account->id
        ]);


        $payment->account()->associate($account);
        $payment->save();


        return $payment;
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return $payment;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        return $payment->delete();
    }
}
