<?php

namespace Alura\Calisthenics\Domain\Student;

class StudentAddress {

    public function __construct(string $street,string $number,
    string $province,string $city,string $state,string $country) {
        $this->street = $street;
        $this->number = $number;
        $this->province = $province;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

}