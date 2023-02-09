<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function loadItemPage()
    {

        $item_data = Item::paginate(10);

        return view("index_logged_in")
            ->with("item_data", $item_data);
    }


    public function viewItemById($itemId)
    {

        $item_data = Item::findOrFail($itemId);

        return view("item_detail")
            ->with("item_data", $item_data);
    }
}
