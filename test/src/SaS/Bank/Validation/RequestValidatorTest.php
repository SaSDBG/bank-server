<?php

namespace SaS\Bank\Validation;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2013-04-27 at 13:22:12.
 */
class RequestValidatorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var RequestValidator
     */
    protected $v;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->v = new RequestValidator('a-Z0-9()&%§="\'');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers SaS\Bank\Validation\RequestValidator
     */
    public function testValidateRequired_Failure() {
        $constraints = [
            'foo' => [
                'required' => [1, 'bar'],
            ],
            'bar' => [
                'required' => [2, 'foo'],
            ]
        ];
        $data = [
            'foo' => 'asdf'
        ];
        $validated = $this->v->validate($data, $constraints);
        $this->assertInstanceOf('\Sas\Bank\Validation\ValidationFailure', $validated);
        $this->assertEquals([[2, 'foo']], $validated->getErrors());
    }

}