<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use \App\Legbon\Portfolio\Plan\PlanHelper;
class PlanHelperTest extends TestCase
{



    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProcessPlan()
    {
    	$ph = new PlanHelper();

    	// Test for success. Expect the same result as input
    	$title = str_random(20);
    	$expect = [
    		'title' => $title,
    		'description' => str_random(255),
    		'slug' => str_slug($title)
    	];

    	$data = [
    		'title' => $expect['title'],
    		'description' => $expect['description'],
    	];
      
      $this->assertEquals($expect, $ph->processPlan($data));

      // Test for wrong title. Expect false.
    	$data = [
    		'title' => '',
    		'description' => str_random(255)
    	];
    	
    	$expect = false;
      
      $this->assertEquals($expect, $ph->processPlan($data));

      // Test for wrong description. Expect false
    	$data = [
    		'title' => str_random(25),
    		'description' => '',
    	];
    	
    	$expect = false;
      
      $this->assertEquals($expect, $ph->processPlan($data));
    }

    public function testValidateTitle() {
    	$ph = new PlanHelper();

    	// Test for blank, must return false
    	$expect = false;
    	$data = '';
    	$this->assertEquals($expect, $ph->validateTitle($data));

    	// Test for valid, must return true
    	$expect = true;
    	$data = str_random(10);
    	$this->assertEquals($expect, $ph->validateTitle($data));
    }

    public function testValidateDescription() {
    	$ph = new PlanHelper();

    	// Test for blank, must return false
    	$expect = false;
    	$data = '';
    	$this->assertEquals($expect, $ph->validateDescription($data));

    	// Test for valid, must return true
    	$expect = true;
    	$data = str_random(100);
    	$this->assertEquals($expect, $ph->validateDescription($data));
    }
}
