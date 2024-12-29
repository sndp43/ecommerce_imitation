<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\UserOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function index(UserOrderDataTable $dataTable)
    {
        $activeTab = 'orders';
        return $dataTable->render('frontend.dashboard.order.index', compact('activeTab'));
    }

    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        $activeTab = 'show-order';
        return view('frontend.dashboard.order.show', compact('order','activeTab'));
    }
}
