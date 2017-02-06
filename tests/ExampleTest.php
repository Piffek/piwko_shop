<?php 
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class ExampleTest extends TestCase
{
	public function testAddToChart()
	{
		//$user = new User(array('id' => '113'));

		//$this->be($user);
		
		$user = factory(User::class)->make();
		
		$this->actingAs($user)
		->visit('/dane')
		->press('Edytuj dane');
		/*$this->visit('/')
		->click('zaloguj')
		->type('test@test.pl','email')
		->type('password','password')
		->press('login')
		->see('test');*/
		//$this->seeInDatabase('users', ['email'=>'test@test.pl']);
		
	}
	
	public function hasEmailInDB()
	{
		$this->seeInDatabase('users', ['email'=>'test@test.pl']);
	}
}

?>