<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //

    public function loadCartPage()
    {

        $order_data = Order::all()
            ->where("user_id", "=", Auth::user()->id);

        $totalPrice = 0;

        foreach ($order_data as $data) {

            $totalPrice += $data->price;
        }

        return view("cart")
            ->with("order_data", $order_data)
            ->with("totalPrice", $totalPrice);
    }

    public function addItemToCart($itemId)
    {

        $item_data = Item::findOrFail($itemId);

        $order_data = Order::all()
            ->where("user_id", "=", Auth::user()->id)
            ->where("item_id", "=", $itemId)
            ->first();

        if ($order_data == null) {


            Order::insert([

                "user_id" => Auth::user()->id,
                "item_id" => $itemId,
                "price" => $item_data->price
            ]);
        }

        return redirect(route("cart_page"));
    }

    public function removeItemFromCart($itemId)
    {

        $order_data = Order::where("item_id", "=", $itemId);
        $order_data->delete();

        return redirect(route("cart_page"));
    }


    public function checkoutCart()
    {

        $order_data = Order::where("user_id", "=", Auth::user()->id);

        if ($order_data != null) {

            $order_data->delete();

            return redirect(route("checkout_success"));
        } else {

            return redirect(route("cart_page"));
        }
    }

    public function loadSuccessPage()
    {

        return view("success");
    }
}
