<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

// use App\Http\Requests\StoreAccountRequest;
// use App\Http\Requests\UpdateAccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::withSum('payments', 'amount')->get();

        return $accounts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //make validation work for an empty body sent in the post request
        $request->validate([]);

        //create an empty account,incremented id and null payments
        $account = Account::create([]);

        //return the account object, this will auto-convert it to json.
        return $account;
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        return [
            'id' => $account->id,
            'billed' => $account->payments()->sum('amount')
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //nothing to update on accounts
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        return $account->delete();
    }
}
