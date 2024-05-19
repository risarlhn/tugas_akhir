<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\PurchaseOrder;

class AdminComposer
{
    public function compose(View $view)
    {
        $purchaseOrders = PurchaseOrder::join('users', 'users.id', '=', 'purchase_orders.user_id')
            ->select('users.name as user_name', 'purchase_orders.nama_perusahaan', 'purchase_orders.created_at', 'purchase_orders.*')
            ->orderBy('purchase_orders.created_at', 'desc')
            ->get();


        $unreadNotifications = PurchaseOrder::where('is_read', false)
            ->join('users', 'users.id', '=', 'purchase_orders.user_id')
            ->select('users.name as user_name', 'purchase_orders.*')
            ->orderBy('purchase_orders.created_at', 'desc')
            ->get();

        $view->with('purchaseOrders', $purchaseOrders)
            ->with('unreadNotifications', $unreadNotifications);
    }
}
