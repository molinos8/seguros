<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\BMWrappers\BMErrors;
use App\BMWrappers\BMActionOk;
use App\BMFormatters\Interfaces\IModels;




/**
 *  Master Controller  
 */
class BaseController extends Controller
{
    /**
     * The businessModel of the request
     *
     * @var \App\BMFormatters\Interfaces\IModels
     */
    private $businessModel;


    /**
     * Initialize the controller recieving Input, Business model and response formatter
     *
     * @param \App\BMFormatters\Interfaces\IModels    $businessModel     The business model of the current action
     * @param string  $action The business model action to execute
     */
    public function __construct(IModels $businessModel, string $action) 
    {
        $this->businessModel = $businessModel;
        $this->action = $action;
    }
    /**
     *  Function show catch request host send for WhiteLabel BM to generate array data for view
     * 
     * @return view view of white label.
     */ 
    
    public function callActionModel()
    {
        $response = call_user_func([$this->businessModel,$this->action]);
        if ($response instanceof BMErrors)  {
            dd($response);
        }
        if ($response instanceof BMActionOk)  {
            dd($response);
        }

    }
}