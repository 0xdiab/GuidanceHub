<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Webhook;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $endpoint_secret = config('services.stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid Signature'], 400);
        }

        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;

            // احصل على الـ payment من خلال reference
            $payment = Payment::where('payment_reference', $session->payment_intent)->first();
            if ($payment) {
                $payment->update(['status' => 'paid']);
                $payment->session->update([
                    'is_paid' => true,
                    'status' => 'confirmed',
                ]);
            }
        }

        return response()->json(['status' => 'success']);
    }
}
