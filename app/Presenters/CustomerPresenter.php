<?php

namespace App\Presenters;

use App\Models\Customer;

class CustomerPresenter extends Presenter
{
    /**
     * @var Customer
     */
    protected $model;

    public function balance(): float
    {
        return $this->model->balance / 100;
    }
}
