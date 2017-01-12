<?php 
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
	public function testBasicExample()
	{
		$this->visit('koszyk');
		
		$this->click("Click Me");
		
		$this->see('20');
		
		$this->seePageIs('/transakcja');
		
		
	
	}
}

?>