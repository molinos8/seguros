<?php
namespace App\BMFormatters\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface to format BM requests. All request to the business model must implement this interface
 */
interface IBMRequest
{

    /**
     * class constructor
     *
     * @param \App\BMFormatters\Interfaces\IBMRequest $request
     */
    public function __construct(Request $request);

    /**
     * set actions arrays with normalizaed action objetcs
     *
     * @return void
     */
    public function parseActions();

    /**
     * Getter of action
     *
     * @return array
     */
    public function getAction():string;

    /**
     * Returns the request params
     *
     * @return array
     */
    public function getParams():array;
}