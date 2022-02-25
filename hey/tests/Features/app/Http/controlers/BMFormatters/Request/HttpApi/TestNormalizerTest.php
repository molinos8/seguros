<?php

namespace Tests;

use App\BMFormatters\Requests\HttpJsonApi\ActionPostNormalizer;
use App\BMFormatters\Requests\HttpJsonApi\PostNormalizer;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

class PostNormalizerTest extends TestCase
{
    /**
     * PostNormalizer object
     *
     * @var \App\BMFormatters\Requests\HttpJsonApi\PostNormalizer
     */
    private $requestNormalizer;

    /**
     * Setup test fixture
     *
     * @return void
     */
    public function setup()
    {
        $validPostBodyRequest = json_decode('{
            "action":"createProductCategory",
            "params": {
                "name":"category1",
                "slug":"dummy_slug2",
                "description":"this category"
            }
        }', true);
        $fakeRequest = new Request($validPostBodyRequest, $validPostBodyRequest);
        $this->requestNormalizer = new PostNormalizer($fakeRequest);
        $this->requestNormalizer->parseActions();
    }

    /**
     * Check if IfHttpJsonApiNormalizer Class Exists
     *
     * @return void
     */
    public function test_CheckIfHttpJsonApiNormalizerClassExists()
    {
        $this->assertInstanceOf(\App\BMFormatters\Requests\HttpJsonApi\PostNormalizer::class, $this->requestNormalizer, 'Class HttpJsonApiNormalizer does not exists');
    }

    /**
     * check if actions attribute exists in IfHttpJsonApiNormalizer Class
     *
     * @return void
     */
    public function test_actionsAttributeExists()
    {
        $this->assertClassHasAttribute('actions', \App\BMFormatters\Requests\HttpJsonApi\PostNormalizer::class, 'Attribute actions does not exist');
    }

    /**
     * test action setter
     *
     * @return void
     */
    public function test_setActionsMehtod()
    {
        $validAction = new ActionPostNormalizer();
        $validAction->setActionName('platformsCrons');
        $validAction->setActionParams(json_decode('{"platforms" : [152,153]}', true));
        $validActionsAttribute[0] = $validAction;
        $validAction2 = new ActionPostNormalizer();
        $validAction2->setActionName('platformsCrons2');
        $validAction2->setActionParams(json_decode('{"platforms" : [52,45]}', true));
        $validActionsAttribute[1] = $validAction2;
        $validAction3 = new ActionPostNormalizer();
        $validAction3->setActionName('platformsCrons');
        $validAction3->setActionParams(json_decode('{"platforms" : [52,45]}', true));
        $validActionsAttribute[2] = $validAction3;
        $this->assertEquals($this->requestNormalizer->getActions(), $validActionsAttribute);
    }

    /**
     *  Checks object reference bug
     *
     * @return void
     */
    public function test_setActionsMehtodObjectReferenceBug()
    {
        $validationAtPositionZero = new ActionPostNormalizer();
        $validationAtPositionZero->setActionName('platformsCrons');
        $validationAtPositionZero->setActionParams(json_decode('{"platforms" : [152,153]}', true));
        $firstRequestParsedAction = $this->requestNormalizer->getActions()[0];
        $this->assertEquals($firstRequestParsedAction, $validationAtPositionZero);
    }

    /**
     * test getActions method
     *
     * @return void
     */
    public function test_getActionsMethod()
    {
        $validAction = new ActionPostNormalizer();
        $validAction->setActionName('platformsCrons');
        $validAction->setActionParams(json_decode('{"platforms" : [152,153]}', true));
        $validActionsAttribute[0] = $validAction;
        $validAction2 = new ActionPostNormalizer();
        $validAction2->setActionName('platformsCrons2');
        $validAction2->setActionParams(json_decode('{"platforms" : [52,45]}', true));
        $validActionsAttribute[1] = $validAction2;
        $validAction3 = new ActionPostNormalizer();
        $validAction3->setActionName('platformsCrons');
        $validAction3->setActionParams(json_decode('{"platforms" : [52,45]}', true));
        $validActionsAttribute[2] = $validAction3;
        $actionsObjets =  $this->requestNormalizer->getActions();
        $this->assertEquals($actionsObjets, $validActionsAttribute);
    }

    /**
     * Test that getEntityId property returns null after the Request is parsed and it haven't the id property setted
     *
     * @return void
     */
    public function test_getEntityId_WhenEntityIdIsNotPresentInRequest_ReturnsNull()
    {
        $validPostBodyRequest = json_decode('{"data": {"type": "Test","attributes": {"actions": [{"action": "test","params": {}}]}}}', true);
        $fakeRequest = new Request($validPostBodyRequest, $validPostBodyRequest);
        $requestNormalizer = new PostNormalizer($fakeRequest);
        $requestNormalizer->parseActions();

        $result = $requestNormalizer->getEntityId();

        $this->assertNull($result);
    }

    /**
     * Test that getEntityId property returns null after the Request is parsed and it haven't the id property setted
     *
     * @return void
     */
    public function test_getEntityId_WhenEntityIdIsNullInRequest_ReturnsNull()
    {
        $validPostBodyRequest = json_decode('{"data": {"id": null, "type": "Test","attributes": {"actions": [{"action": "test","params": {}}]}}}', true);
        $fakeRequest = new Request($validPostBodyRequest, $validPostBodyRequest);
        $requestNormalizer = new PostNormalizer($fakeRequest);
        $requestNormalizer->parseActions();

        $result = $requestNormalizer->getEntityId();

        $this->assertNull($result);
    }

    /**
     * Test that getEntityId property returns the entity id after the Request is parsed
     *
     * @return void
     */
    public function test_getEntityId_GivenAEntityIdInTheRequest_ReturnTheEntityId()
    {
        $entityId = 5;
        $validPostBodyRequest = json_decode('{"data": {"id": '.$entityId.',"type": "Test","attributes": {"actions": [{"action": "test","params": {}}]}}}', true);
        $fakeRequest = new Request($validPostBodyRequest, $validPostBodyRequest);
        $requestNormalizer = new PostNormalizer($fakeRequest);
        $requestNormalizer->parseActions();

        $result = $requestNormalizer->getEntityId();

        $this->assertEquals($entityId, $result);
    }
}
