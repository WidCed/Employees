<?php
namespace Employees\Tests\Tests\Unit;
use Employees\Tests\Tests\Helpers\EmployeeClass;
use Employees\Tests\Helpers\EmployeeBuilderFactoryHelper;
use Employees\Tests\Helpers\EmployeeHelper;
use Entities\Domain\Entities\Builders\Exceptions\CannotBuildEntityException;

final class EmployeeTest extends \PHPUnit_Framework_TestCase {
     private $entityBuilderFactoryMock;
    private $employeeBuilderMock;
    private $employeeMock;
    private $uuidMock;
    private $stringMock;
    private $dateTimeMock;
    private $class;
    private $employeeBuilderFactoryHelper;
    private $employeeHelper;
    
    public function setUp() {
         $this->entityBuilderFactoryMock = $this->getMock('Entities\Domain\Entities\Builders\Factories\EntityBuilderFactory');
        $this->employeeBuilderMock = $this->getMock('Employees\Domain\Employees\Builders\EmployeeBuilder');
        $this->employeeMock = $this->getMock('Employees\Domain\Employees\Employee');

        $this->uuidMock = $this->getMock('Uuids\Domain\Uuids\Uuid');
        $this->stringMock = $this->getMock('Strings\Domain\Strings\String');
        $this->dateTimeMock = $this->getMock('DateTimes\Domain\DateTimes\DateTime');
        
        $this->class = new EmployeeClass($this->entityBuilderFactoryMock, $this->uuidMock, $this->stringMock, $this->dateTimeMock, $this->dateTimeMock);
        
        $this->employeeBuilderFactoryHelper = new EmployeeBuilderFactoryHelper($this, $this->employeeBuilderMock, $this->entityBuilderFactoryMock);
        $this->employeeHelper = new EmployeeHelper($this, $this->employeeMock);
    }
    
    public function tearDown() {
        
    }
    
    public function testBuild_Success() {
        
        $this->employeeBuilderFactoryHelper->expectsEmployeeBuilderFactory_Success($this->employeeMock, $this->uuidMock, $this->stringMock, $this->dateTimeMock);
        
        $employee = $this->class->build();
        
        $this->assertEquals($this->employeeMock, $employee);
        
    }
    
    public function testBuild_throwsCannotBuildEntityException() {
        
        $this->employeeBuilderFactoryHelper->expectsEmployeeBuilderFactory_throwsCannotBuildEntityException($this->uuidMock, $this->stringMock, $this->dateTimeMock);
        
        $asserted = false;
        try {
        
            $this->class->build();
            
        } catch (CannotBuildEntityException $exception) {
            $asserted = true;
        }
        
        $this->assertTrue($asserted);
        
    }
    
    public function testBuild_lastUpdatedOn_Success() {
        
        $this->employeeBuilderFactoryHelper->expectsEmployeeBuilderFactory_lastUpdatedOn_Success($this->employeeMock, $this->uuidMock, $this->stringMock, $this->dateTimeMock, $this->dateTimeMock);
        
        $employee = $this->class->build_lastUpdatedOn();
        
        $this->assertEquals($this->employeeMock, $employee);
        
    }
    
    public function testBuild_lastUpdatedOn_throwsCannotBuildEntityException() {
        
        $this->employeeBuilderFactoryHelper->expectsEmployeeBuilderFactory_lastUpdatedOn_throwsCannotBuildEntityException($this->uuidMock, $this->stringMock, $this->dateTimeMock, $this->dateTimeMock);
        
        $asserted = false;
        try {
        
            $this->class->build_lastUpdatedOn();
            
        } catch (CannotBuildEntityException $exception) {
            $asserted = true;
        }
        
        $this->assertTrue($asserted);
        
    }
    
    public function testGetName_Success() {
        
        $this->employeeHelper->expectsGetName_Success($this->stringMock);
        
        $name = $this->employeeMock->getName();
        
        $this->assertEquals($this->stringMock, $name);
        
    }
    
    public function testGetName_multiple_Success() {
        
        $this->employeeHelper->expectsGetName_multiple_Success(array($this->stringMock));
        
        $name = $this->employeeMock->getName();
        
        $this->assertEquals($this->stringMock, $name);
        
    }
    
        public function testExtendsRightInterfaces_Success() {
        
        $this->assertTrue($this->employeeMock instanceof \Entities\Domain\Entities\Entity);
        $this->assertTrue($this->employeeBuilderMock instanceof \Entities\Domain\Entities\Builders\EntityBuilder);
        
    }
}

