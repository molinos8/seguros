<?php

namespace App\Providers;

use App\BMFormatters\Request\HttpApi\PostNormalizer;
use App\Http\Controllers\BaseController;
use Illuminate\Support\ServiceProvider;


class ControllerProvider extends ServiceProvider
{
    /**
     * Register services provider of the controller based on the recieved request.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BaseController::class, function () {
            $request = app(\Illuminate\Http\Request::class);
            $type = \str_replace('/api/', '', $request->getPathInfo());
            $validator = 'App\\BMValidators\\'.ucfirst($type).'Validator';
            $validatorClass = new $validator();
            $repository = 'App\\BMRepositories\\'.ucfirst($type).'Repository';
            $repositoryClass = new $repository();
            $normalizer = new PostNormalizer($request);
            $businessModelClass = 'App\\BM\\BM'.ucfirst($type);
            $businessModel = new $businessModelClass($validatorClass,$repositoryClass,$normalizer->getParams());

            return new BaseController($businessModel, $normalizer->getAction());
        });
    }
}