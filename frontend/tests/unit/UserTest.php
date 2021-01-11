<?php namespace frontend\tests;

use app\models\User;
use common\fixtures\UserFixture;
use phpDocumentor\Reflection\Types\This;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php',
            ],
        ];
    }

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testAddUser()
    {
        $user = new User();
        $user->id = 99;
        $user->username = 'test99';
        $user->auth_key = 'zgn2yMfmVi6LuYNcMZG3Zutkp4jLj7pt';
        $user->password_hash = '$2y$13$lzeM2aLd7h4.ev06D05t/.cZEFTyocagUlchxvE9a/1ymfrGAXtsS';
        $user->password_reset_token = NULL;
        $user->email = 'email@test.com';
        $user->status = 10;
        $user->created_at = 1607902309;
        $user->updated_at = 1607902309;
        $user->verification_token = 'fA_TINEEM1U_VRL-OcY04JXoMUJp71nQ_1607902309';

        $user->save();
        $this->tester->seeRecord(User::class, ['id' => '99', 'username' => 'test99']);

        return $user;
    }

    public function testEdit(){
        $user = new User();
        $user->id = 99;
        $user->username = 'test99';
        $user->auth_key = 'zgn2yMfmVi6LuYNcMZG3Zutkp4jLj7pt';
        $user->password_hash = '$2y$13$lzeM2aLd7h4.ev06D05t/.cZEFTyocagUlchxvE9a/1ymfrGAXtsS';
        $user->password_reset_token = NULL;
        $user->email = 'email@test.com';
        $user->status = 10;
        $user->created_at = 1607902309;
        $user->updated_at = 1607902309;
        $user->verification_token = 'fA_TINEEM1U_VRL-OcY04JXoMUJp71nQ_1607902309';
        $this->assertTrue(   $user->save());
        $this->tester->seeRecord(User::class, ['id' => '99', 'username' => 'test99']);

        $user->username = 'test';
        $user->save();
        $this->tester->seeRecord(User::class, ['id' => 99, 'username' => 'test']);
        $this->tester->dontseeRecord(User::class, ['id' => '99', 'username' => 'test99']);
    }



    public function testDelete()
    {
        $user = new User();
        $user->id = 99;
        $user->username = 'test99';
        $user->auth_key = 'zgn2yMfmVi6LuYNcMZG3Zutkp4jLj7pt';
        $user->password_hash = '$2y$13$lzeM2aLd7h4.ev06D05t/.cZEFTyocagUlchxvE9a/1ymfrGAXtsS';
        $user->password_reset_token = NULL;
        $user->email = 'email@test.com';
        $user->status = 10;
        $user->created_at = 1607902309;
        $user->updated_at = 1607902309;
        $user->verification_token = 'fA_TINEEM1U_VRL-OcY04JXoMUJp71nQ_1607902309';
        $this->assertTrue(   $user->save());
        $this->tester->seeRecord(User::class, ['id' => '99', 'username' => 'test99']);

        $user->save();
        $this->tester->seeRecord(User::class, ['id' => '99']);
        $user->delete();
        $this->tester->dontSeeRecord(User::class, ['id' => '99']);

    }
}