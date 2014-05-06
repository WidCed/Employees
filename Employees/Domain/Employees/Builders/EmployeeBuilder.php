<?php
namespace Employees\Domain\Employees\Builders;
use Entities\Domain\Entities\Builders\EntityBuilder;
use Strings\Domain\Strings\String;

interface EmployeeBuilder extends EntityBuilder{
    public function withName(String $name);
}