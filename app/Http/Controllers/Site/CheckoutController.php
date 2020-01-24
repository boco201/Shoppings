<?php

namespace App\Http\Controllers\Site;

use Cart;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;


class CheckoutController extends Controller
{
    protected $payPal;

    protected $orderRepository;

    public function __construct(OrderContract $orderRepository, PayPalService $payPal)
    {
        $this->payPal = $payPal;
        $this->orderRepository = $orderRepository;
    }

      public function paypalcheckout()
    {
        return view('site.products.paypalcheckout');
    }

     public function placeOrderPaypal(Request $request)
    {
        // Before storing the order we should implement the
        // request validation which I leave it to you
       

        $order = $this->orderRepository->storeOrderDetails($request->all());

        // You can add more control here to handle if the order is not stored properly
       if ($order) {
            $this->payPal->processPayment($order);
        }

    
       return redirect()->route('site.products.index')->with('message','votre payement est accepté merci pour votre achat, un mail est envoyé');
    }

     public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = 'PayPal -'.$status['salesId'];
        $order->save();

        Cart::clear();
        return view('site.products.success', compact('order'));
    }


    public function getCheckout()
    {
        return view('site.products.checkout');
    }

    public function placeOrder(Request $request) 
    {
        // Before storing the order we should implement the
        // request validation which I leave it to you

        $order = $this->orderRepository->storeOrderDetails($request->all());

      /* try {
          $charge = Stripe::charges()->create([
             'amount' => Cart::getSubTotal() * 100,
             'currency' => 'eur',
             'source' => $request->stripeToken,
             'description' => 'Description goes here',
             'receipt_email' => $request->email,
             'metadata' => [
                'data1' => 'metadata 1',
                'data2' => 'metadata 2',
                'data3' => 'metadata 3',
             ],
          ]);

          Cart::clear();

          return redirect()->route('checkout.cart');

        } catch (\Exception $ex) {
    return $ex->getMessage();

    }*/

      //dd(request()->all());
              try {
         Stripe::setApiKey(env('STRIPE_SECRET'));

          $customer = Customer::create(array(
        'email' => $request->stripeEmail,
        'source' => $request->stripeToken
    ));

    $charge = Charge::create(array(
        'customer' => $customer->id,
        'amount' => Cart::getSubTotal() * 100,
        'currency' => 'eur'
    ));

    Cart::clear();

    return redirect()->route('site.products.index')->with('message','votre payement est accepté merci pour votre achat, un mail est envoyé');

  } catch (\Exception $ex) {
    return $ex->getMessage();

}


        // You can add more control here to handle if the order is not stored properly
       /* if ($order) {
            $this->payPal->processPayment($order);
        }*/
    
       // return redirect()->back()->with('message','Order not placed';
}

public function ship(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        $order = $this->orderRepository->storeOrderDetails($request->all());

        Mail::to($request->user())->send(new OrderShipped($order));
    }

}
