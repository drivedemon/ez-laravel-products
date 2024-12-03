<?php

namespace App\Presenters;

use App\Models\Order;

class OrderPresenter extends Presenter
{
    /**
     * @var Order
     */
    protected $model;

    public function totalPrice(): float
    {
        return $this->model->total_price / 100;
    }
}
