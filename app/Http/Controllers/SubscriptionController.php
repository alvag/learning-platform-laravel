<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (auth()->user()->subscribed('maim')) {
                return redirect('/')
                    ->with('message', ['warning', __('Actualmente ya estás suscrito a otro plan.')]);
            }

            return $next($request);
        })->only(['plans', 'processSubscription']);
    }

    public function plans()
    {
        return view('subscriptions.plans');
    }

    public function processSubscription()
    {
        $token = request('stripeToken');

        try {

            if (request('coupon')) {
                request()->user()->newSubscription('main', request('type'))
                    ->withCoupon(request('coupon'))->create($token);
            } else {
                request()->user()->newSubscription('main', request('type'))
                    ->create($token);
            }

            return redirect(route('subscriptions.admin'))
                ->with('message', ['success', __("La suscripción se ha realizado correctamente.")]);

        } catch (\Exception $e) {
            $error = $e->getMessage();
            return back()->with('message', ['danger', $error]);
        }
    }

    public function admin()
    {
        $subscriptions = auth()->user()->subscriptions;

        return view('subscriptions.admin', compact('subscriptions'));
    }
}
