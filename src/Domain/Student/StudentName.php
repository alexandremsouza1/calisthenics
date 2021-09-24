<?php

namespace Alura\Calisthenics\Domain\Student;

class StudentName {

    public function __construct(string $fName, string $lName) {
        $this->fName = $fName;
        $this->lName = $lName;
    }

    public function __toString() : String {
        return "{$this->fName} {$this->lName}";
    }

}