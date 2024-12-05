<?php

namespace App\Domain\Order;

use App\Domain\DTO;

class OrderDTO extends DTO
{
    protected $customerId;

    protected $code;

    protected $totalPrice;

    protected $status;

    protected $orderedAt;

    protected $address;

    protected $subdistrict;

    protected $district;

    protected $province;

    protected $zipcode;

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getOrderedAt()
    {
        return $this->orderedAt;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getSubdistrict()
    {
        return $this->subdistrict;
    }

    public function getDistrict()
    {
        return $this->district;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function setCustomerId($customerId): void
    {
        $this->customerId = $customerId;
    }

    public function setCode($code): void
    {
        $this->code = $code;
    }

    public function setTotalPrice($totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function setOrderedAt($orderedAt): void
    {
        $this->orderedAt = $orderedAt;
    }

    public function setAddress($address): void
    {
        $this->address = $address;
    }

    public function setSubdistrict($subdistrict): void
    {
        $this->subdistrict = $subdistrict;
    }

    public function setDistrict($district): void
    {
        $this->district = $district;
    }

    public function setProvince($province): void
    {
        $this->province = $province;
    }

    public function setZipcode($zipcode): void
    {
        $this->zipcode = $zipcode;
    }
}
