<?php
namespace Elabftw\Elabftw;

use PDO;
use Elabftw\Core\Auth;

class AuthTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->Auth = new Auth();
    }

    public function testCheckCredentials()
    {
        $this->assertTrue($this->Auth->checkCredentials('phpunit@yopmail.com', 'phpunitftw'));
        $this->assertFalse($this->Auth->checkCredentials('phpunit@yopmail.com', 'wrong password'));
    }

    public function testCheckPasswordLength()
    {
        $this->assertTrue($this->Auth->checkPasswordLength('longpassword'));
        $this->assertFalse($this->Auth->checkPasswordLength('short'));
    }

    public function testLogin()
    {
        $this->assertTrue($this->Auth->login('phpunit@yopmail.com', 'phpunitftw'));
        $this->assertFalse($this->Auth->login('phpunit@yopmail.com', '0'));
    }
}
