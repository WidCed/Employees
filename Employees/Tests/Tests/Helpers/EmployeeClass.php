<?php
namespace Employees\Tests\Tests\Helpers;
use Entities\Domain\Entities\Builders\Factories\EntityBuilderFactory;
use Uuids\Domain\Uuids\Uuid;
use Strings\Domain\Strings\String;
use DateTimes\Domain\DateTimes\DateTime;

final class EmployeeClass {
    private $entityBuilderFactory;
    private $uuid;
    private $name;
    private $createdOn;
    private $lastUpdatedOn;
    public function __construct(EntityBuilderFactory $entityBuilderFactory, Uuid $uuid, String $name, DateTime $createdOn, DateTime $lastUpdatedOn) {
        $this->entityBuilderFactory = $entityBuilderFactory;
        $this->uuid = $uuid;
        $this->name = $name;
        $this->createdOn = $createdOn;
        $this->lastUpdatedOn = $lastUpdatedOn;
    }
    
    public function build() {
        return $this->entityBuilderFactory->create()
                                            ->create()
                                            ->withUuid($this->uuid)
                                            ->withName($this->name) 
                                            ->createdOn($this->createdOn)
                                            ->now();
    }
    
    public function build_lastUpdatedOn() {
        return $this->entityBuilderFactory->create()
                                            ->create()
                                            ->withUuid($this->uuid)
                                            ->withName($this->name)
                                            ->createdOn($this->createdOn)
                                            ->lastUpdatedOn($this->lastUpdatedOn)
                                            ->now();
    }
}
