<?php

namespace App\Presenters;

use App\Models\ProductVariant;

class ProductVariantPresenter extends Presenter
{
    /**
     * @var ProductVariant
     */
    protected $model;

    public function price(): float
    {
        return $this->model->price / 100;
    }
}
