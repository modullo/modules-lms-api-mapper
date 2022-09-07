<?php

namespace Modullo\ModulesLmsApiMapper\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use Hostville\Modullo\Sdk;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modullo\ModulesLmsApiMapper\Http\Requests\StoreModulesLmsApiMapperRequest;
use Modullo\ModulesLmsApiMapper\Http\Requests\UpdateModulesLmsApiMapperRequest;
use Modullo\ModulesLmsApiMapper\Services\ModulesLmsApiMapperService;

class UserMapperController extends Controller
{
    protected Sdk $sdk;
    protected $mappingService;
    public function __construct(Sdk $sdk)
    {
        $this->sdk = $sdk;
        $this->mappingService = new ModulesLmsApiMapperService();
    }

    public function index(Sdk $sdk)
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreModulesLmsApiMapperRequest $request, Sdk $sdk)
    {
        //
    }

    public function show(string $id, Sdk $sdk)
    {
        //
    }

    public function edit(string $id, Sdk $sdk)
    {
        //
    }

    public function update(UpdateModulesLmsApiMapperRequest $request, $id, Sdk $sdk)
    {
        //
    }

    public function delete(string $id)
    {
        //
    }
}
