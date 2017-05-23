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
        $this->assertFalse($uh->passwordEquality(bcrypt(str_random(10)), bcrypt(random_int(0,100))));	
    }

     /**
     * A test for UserHelper's passwordEquality method.
     * Testing for matching passwords (must return true)
     * @return void
     */
    public function testPasswordsMatch()
    {
        $uh = new UserHelper();
      	$password = bcrypt(str_random(20));
      	$this->assertTrue($uh->passwordEquality($password, $password));	
    }

	   /**
	   * A test for UserHelper's updateValidation method.
	   * Testing for matching passwords.
	   * @return void
	   */
    public function testUpdateValidationMatchingPassword()
    {
        $uh = new UserHelper();
      	$password = bcrypt(str_random(20));
      	$data = ['password' => $password, 'confirm_password' => $password];
      	$expect = ['ok' => true, 'msg' => 'UPDATE_OK'];
      	$this->assertEquals($expect, $uh->updateValidation($data));	
    }

	   /**
	   * A test for UserHelper's updateValidation method.
	   * Testing for matching passwords.
	   * @return void
	   */
    public function testUpdateValidationNotMatchingPassword()
    {
        $uh = new UserHelper();
      	$password = bcrypt(str_random(20));
      	$confirm = bcrypt(str_random(40));
      	$data = ['password' => $password, 'confirm_password' => $confirm];
      	$expect = ['ok' => false, 'msg' => 'PASSWORD_NOT_EQUAL'];
      	$this->assertEquals($expect, $uh->updateValidation($data));	
    }
}
