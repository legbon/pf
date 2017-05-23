<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Legbon\User\UserHelper;

class UserHelperTest extends TestCase
{
    /**
     * A test for UserHelper's passwordEquality method.
     * Testing for non matching passwords (must return false)
     * @return void
     */
    public function testPasswordsNotMatch()
    {
        $uh = new UserHelper();
        $this->assertFalse($uh->validatePasswordEquality(str_random(10), random_int(0,100)));	
    }

     /**
     * A test for UserHelper's passwordEquality method.
     * Testing for matching passwords (must return true)
     * @return void
     */
    public function testPasswordsMatch()
    {
        $uh = new UserHelper();
      	$password = str_random(20);
      	$this->assertTrue($uh->validatePasswordEquality($password, $password));	
    }

	   /**
	   * A test for UserHelper's updateValidation method.
	   * Testing for matching passwords.
	   * @return void
	   */
    public function testUpdateValidationPasswordOK()
    {
        $uh = new UserHelper();
      	$password = str_random(random_int(config('site')['PASSWORD_MIN'], config('site')['PASSWORD_MAX']));
      	$data = ['password' => $password, 'confirm_password' => $password,
      	'current_password' => \Hash::make($password),
      	'old_password' => $password
      	];
      	$expect = ['ok' => true, 'err' => 'UPDATE_OK'];
      	$this->assertEquals($expect, $uh->updateValidation($data));	
    }

	   /**
	   * A test for UserHelper's updateValidation method.
	   * Testing for notmatching passwords.
	   * @return void
	   */
    public function testUpdateValidationNotMatchingPassword()
    {
        $uh = new UserHelper();
      	$password = str_random(20);
      	$confirm = str_random(40);
      	$data = ['password' => $password, 'confirm_password' => $confirm,
      	'current_password' => \Hash::make($password),
      	'old_password' => $password
      	];
      	$expect = ['ok' => false, 'err' => config('errors')['PASSWORD_NOT_EQUAL']];
      	$this->assertEquals($expect, $uh->updateValidation($data));	
    }

	 /**
	   * A test for UserHelper's validatePasswordLimit method.
	   * Testing for over limit passwords.
	   * @return void
	   */
    public function testPasswordOverLimit()
    {
        $uh = new UserHelper();
      	$password = str_random(config('site')['PASSWORD_MAX'] + 1);
      	$data = ['password' => $password];
      	$expect = false;
      	$this->assertEquals($expect, $uh->validatePasswordLimit($data['password']));	
    }


	 /**
	   * A test for UserHelper's validatePasswordLimit method.
	   * Testing for under limit passwords.
	   * @return void
	   */
    public function testPasswordUnderLimit()
    {
        $uh = new UserHelper();
      	$password = str_random(config('site')['PASSWORD_MIN'] - 1);
      	$data = ['password' => $password];
      	$expect = false;
      	$this->assertEquals($expect, $uh->validatePasswordLimit($data['password']));	
    }


	 /**
	   * A test for UserHelper's validatePasswordLimit method.
	   * Testing for within limit passwords.
	   * @return void
	   */
    public function testPasswordWithinLimit()
    {
        $uh = new UserHelper();
      	$password = str_random(random_int(config('site')['PASSWORD_MIN'], config('site')['PASSWORD_MAX']));
      	$data = ['password' => $password];
      	$expect = true;
      	$this->assertEquals($expect, $uh->validatePasswordLimit($data['password']));	
    }

	 /**
	   * A test for UserHelper's updateValidation method.
	   * Testing for multiple errors
	   * @return void
	   */
    public function testUpdateValidationMultipleErrors() {
      $uh = new UserHelper();
    	$password = str_random(config('site')['PASSWORD_MAX'] + 2);
    	$confirm = str_random(40);
    	$data = ['password' => $password, 'confirm_password' => $confirm,
    	 'current_password' => \Hash::make($password."x"),
    	 'old_password' => $password."a"
    	 ];
    	$expect = ['ok' => false, 'err' => config('errors')['PASSWORD_INCORRECT']];
    	$this->assertEquals($expect, $uh->updateValidation($data));	

    }

}

/*
      	fwrite(STDERR, print_r(strlen($data['password']), TRUE));
      	code to print out on console.
*/