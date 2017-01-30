<?php 
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\Admin\ChartAdmin;

class ExampleTest extends TestCase
{
	public function testAddToChart()
	{
		//$this->visit('koszyk');
		
		//$this->click("Click Me");
		
		//$this->see('20');
		
		//$this->seePageIs('/transakcja');
		
		/*$a = 10;
		$b = 10;
		
		$instance = new App\Http\Controllers\DealController();
		$result = $instance->assertEquals($a, $b);
		
		$example_result = $a*$b;
		
		$this->assertEquals($example_result, $result);*/
		
		//$chart = new ChartAdmin('buyings', 'delivery', 'UPS', 'DPD','delivery2','admin.chart.deliveryChart');
		
		//$this->assertTrue($chart->has('4'));
		
		//$instance = new App\Http\Controllers\Admin\ChartAdmin('buyngs', 'delivery', 'UPS', 'DPD','delivery2','admin.chart.deliveryChart');
		

		
		$this->visit('/dane')
		->click('About Us')
		->seePageIs('/koszyk');
	}
}

?>