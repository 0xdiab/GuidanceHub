<?php

namespace App\Http\Controllers;

use App\Models\MentorSession;
use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createCheckout($session_id)
    {
        $session = MentorSession::findOrFail($session_id);

        if ($session->is_paid) {
            return redirect()->route('user.home');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $checkout = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $session->mentor->session_price * 100,
                    'product_data' => [
                        'name' => 'Mentorship Session with ' . $session->mentor->name,
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['session_id' => $session->id, 'checkout_id' => '{CHECKOUT_SESSION_ID}']),
            'cancel_url' => route('payment.cancel'),
        ]);

        return redirect($checkout->url);
    }

    public function paymentSuccess(Request $request, $session_id)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $session = MentorSession::findOrFail($session_id);
        $checkout_id = $request->get('checkout_id');

        if (!$session->is_paid) {
            $session->update([
                'is_paid'   => true,
                'status'    => 'confirmed',
            ]);
        }

        $stripeSession = StripeSession::retrieve($checkout_id);

        Payment::create([
            'mentee_id' => Auth::id(),
            'session_id' => $session->id,
            'provider' => 'stripe',
            'payment_reference' => $stripeSession->payment_intent,
            // 'payment_reference' => 'N/A',
            'amount' => $session->mentor->session_price,
            'status' => 'paid',
        ]);

        return redirect()->route('sessions.show', $session_id);
    }

    public function paymentCancel()
    {
        return redirect()->route('home');
    }
}
