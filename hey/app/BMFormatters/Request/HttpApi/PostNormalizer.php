<?php

namespace App\BMFormatters\Request\HttpApi;

use App\BMFormatters\Interfaces\IBMRequest;
use Illuminate\Http\Request;

/**
 * this class normalizes http  api post request to understuble request for the business model
 */
class PostNormalizer implements IBMRequest
{
    /**
     * The action of bussines model to execute
     *
     * @var string
     */
    private $action;

    /**
     * Request params
     *
     * @var array of params
     */
    private $params = [];

    /**
     * Request received
     *
     * @var Illuminate\Http\Request
     */
    private $request;

    /**
     * class constructor
     *
     * @var Illuminate\Http\Request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->parseActions();
    }

    /**
     * set actions arrays with normalizaed action objetcs
     *
     * @return void
     */
    public function parseActions()
    {
    
        $this->action = $this->request->action;
        $this->params = $this->request->params;

    }

    /**
     * Getter of action
     *
     * @return string
     */
    public function getAction():string
    {
        return $this->action;
    }

    /**
     * Getter of params
     *
     * @return array
     */
    public function getParams():array
    {
        return $this->params;
    }
}