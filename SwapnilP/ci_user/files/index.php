<?php
class StackTest extends PHPUnit_Framework_TestCase
{
   
    public function testarray()
    {
        $stack = array();  
        $stack2 = array();
        // $this->markTestIncomplete('This test has not been implemented yet'); failed since its incomplete
        $this->assertEmpty($stack); // passed since array is empty
        array_push($stack, 'one'); // adding value to array
 
        // $this->assertEmpty($stack);  // failed since array is not empty
        //$this->assertCount(2,$stack);  // failed since array size is 1 and expected is 2

        array_push($stack, 'two'); // adding value to array
        $this->assertCount(2,$stack);  // passed since array size matches the size 2

        //$this->assertArrayNotHasKey(1, $stack); // failed since no key value is present

        //$this->assertContains(1, $stack,  $ignoreCase = FALSE, $checkForObjectIdentity = TRUE); // failed since array doesnt contain 1
        $this->assertContains('one', $stack, $ignoreCase = FALSE, $checkForObjectIdentity = TRUE);

        // failed since array contain other value than 'two'
        //$this->assertContainsOnly('two', $stack, $ignoreCase = FALSE, $checkForObjectIdentity = TRUE); 

      //  $this->assertSameSize($stack2, $stack, $message = ''); // failed since size of the stacked doesnot matched

    }

    public function testOperations()
    {
        $this->assertLessThan(5,2);  // passed since 2 is less than 5
        $this->assertGreaterThan(2,5); // passsed since 5 is greater than 2

        // $this->assertGreaterThan(2,1); // fails since 1 is less than 2
        $this->assertGreaterThan(2,3);  // passsed since 3 is greater than 2

        // $this->assertGreaterThanOrEqual(2,1); // failed since 1 is not equals 2 or greater than 2
        $this->assertGreaterThanOrEqual(1,4); // passed since 4 is not equals 1 or greater than 1
        
    }

    public function testStrings()
    {
        $string = 'Swapneel';
        // $this->assertStringEndsNotWith('l', $string, $message = ''); // failed since string ends with l
        $this->assertStringEndsNotWith('s', $string, $message = '');  // passed since strings not ends with s

        $this->assertStringEndsWith('l', $string, $message = '');  // passed since strings  ends with l
        // $this->assertStringEndsWith('L', $string, $message = '');  // falied since strings  ends with l case sensitive

        //$this->assertStringNotMatchesFormatFile($formatFile, $string, $message = '');


    }

    public function testfiles()
    {
        //$this->assertFileExists('44555.jpeg'); //failure since complete path is not mentioned
        $this->assertFileExists('/opt/lampp/htdocs/testPHPUnit/44555.jpeg'); // passed since complete path is mentioned and file exists

    }
    /*
     *  @Test function and aurguments
    */
    public function testProducerFirst()
    {
        $this->assertTrue(true); // check for true value
        return 'one';
    }

    public function testProducerSecond()
    {
        $this->assertFalse(false); // check for false value
        return 'two';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer()
    {
        $this->assertEquals(
            array('one', 'two'),
            func_get_args()
        );
    }
    /**
     * @dataProvider provider
     */
    public function testAdd($a, $b, $c)
    {
        $this->assertEquals($c, $a + $b);
    }
    /**
     * @dataProvider provider
     */
   /* public function testSub($a, $b, $c)
    {
        $this->assertEquals($c, $a - $b);
    }*/

    public function provider()
    {
        return array(
          array(0, 0, 0),
          array(0, 1, 1),
          array(1, 0, 1)
          //array(1, 1, 3) // test failed since 1+1 !=3
        );
    }

}
?>