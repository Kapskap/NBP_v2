<?php

namespace App\Model;

class Data
{
    private string $currency;
    private string $code;
    private float $mid;
//    private ?\DateTimeInterface $effectiveDate;

// Getters
    public function getCurrency(): string
    {
    return $this->currency;
    }

    public function getCode(): string
    {
    return $this->code;
    }

    public function getMid(): string
    {
        return $this->mid;
    }

//    public function getEffectiveDate(): ?\DateTimeInterface
//    {
//    return $this->effectiveDate;
//    }


// Setters
    public function setCurrency(string $currency): void
    {
    $this->currency = $currency;
    }

    public function setCode(string $code): void
    {
    $this->code = $code;
    }

    public function setMid(string $mid): void
    {
        $this->mid = $mid;
    }

//    public function setEffectiveDate(\DateTimeInterface $effectiveDate = null): void
//    {
//    $this->effectiveDate = $effectiveDate;
//    }
}