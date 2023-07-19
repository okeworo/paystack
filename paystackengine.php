<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Redirect;
use Paystack as PaystackApi;
use Illuminate\Support\Facades\Auth;
use App\Models\Deposit;



class Paystack extends Component
{
    public $showModal = false;
    public $amount;

    protected $listeners = ['showDepositModal'];

    public function showDepositModal()
    {
        $this->showModal = true;
    }

    public function hideDepositModal()
    {
        $this->showModal = false;
    }

    public function makeDeposit()
    {
        // Get the authenticated user's wallet
        $wallet = auth()->user()->wallet;

        // Generate a unique transaction reference
        $reference = 'DEP_' . uniqid();
        $orderID = uniqid();
        $cost = $this->amount;

        // Initiate the payment with Paystack
        $payment = array(
            'amount' => ($cost + (110 + ($cost * 2.5/100))) * 100,
            'email' => auth()->user()->email,
            'reference' => $reference,
            "currency" => "NGN",
            "orderID"   => $orderID,
        );

        // Create a new deposit record in the database
        $deposit = Deposit::create([
            'user_id' => auth()->id(),
            'wallet_id' => $wallet->id,
            'reference' => $reference,
            "orderID"   => $orderID,
            'amount' => $this->amount,
            'status' => 'pending',
        ]);

        // Redirect the user to the Paystack payment page
        return PaystackApi::getAuthorizationUrl($payment)->redirectNow();
    }

    public function render()
    {
        return view('livewire.paystack');
    }
}
