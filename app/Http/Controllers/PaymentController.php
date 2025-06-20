<?php

namespace App\Http\Controllers;

use App\Models\MentorSession;
use App\Models\Payment;
use App\Services\ZoomService;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

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
            'success_url' => route('payment.success', ['session_id' => $session->id]) . '?checkout_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
        ]);

        return redirect($checkout->url);
    }

    public function paymentSuccess(Request $request, $session_id)
    {
        // dd($request->checkout_id);
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

        // $zoom = new ZoomService();
        // $meeting = $zoom->createMeeting(
        //     'Mentorship with ' . $session->mentor->name,
        //     $session->session_time
        // );

        // if (!isset($meeting['join_url'])) {
        //     dd('Zoom API Error:', $meeting);
        // }

        // $session->update([
        //     'session_link' => $meeting['join_url'],
        //     'meeting_id' => $meeting['id'],
        //     'meeting_provider' => 'zoom',
        // ]);



        return redirect()->route('sessions.show', $session_id);
    }

    public function paymentCancel()
    {
        return redirect()->route('user.home');
    }
}
