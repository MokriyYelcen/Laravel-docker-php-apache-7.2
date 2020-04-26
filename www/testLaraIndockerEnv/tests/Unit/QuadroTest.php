<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\MathController;

class QuadroTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @param null $name
     * @param array $data
     * @param string $dataName
     * @param MathController $mathController
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->mathController = new MathController();
    }
    public $mathController;

    public function testExample()
    {
        $posArr = [
            ['a'=>1,'b'=>-2,'c'=>-3,'x1'=>3,'x2'=>-1],
            ['a'=>-1,'b'=>-2,'c'=>15,'x1'=>-5,'x2'=>3],
            ['a'=>0,'b'=>0,'c'=>0,'x1'=>0,'x2'=>0],
            ['a'=>null,'b'=>null,'c'=>null,'x1'=>false,'x2'=>0],
            ['a'=>0,'b'=>0,'c'=>36,'x1'=>false,'x2'=>false],
        ];
        foreach ($posArr as $testCase){
            $expectedResult = [$testCase['x1'],$testCase['x2']];
            try{
                $res = $this->mathController->eq_roots($testCase['a'],$testCase['b'],$testCase['c']);
            }catch (\Exception $e){
                if($e->getMessage() == 'invalid equation'){
                    continue;
                }else{
                    $this->assertTrue(false,(string)$e);
                }
            }
            $message = 'expected result of equation where:  a = '.$testCase['a'].' b = '.$testCase['b'].' c = '.$testCase['c'].'  is '.print_r($expectedResult,true).' returned '.print_r($res,true);
            $this->assertContains($res[0],$expectedResult,$message);
            unset($expectedResult[array_search($res[0],$expectedResult)]);
            $this->assertContains($res[1],$expectedResult,$message);
        }
    }
}
