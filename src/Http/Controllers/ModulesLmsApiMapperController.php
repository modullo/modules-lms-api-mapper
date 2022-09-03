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

class ModulesLmsApiMapperController extends Controller
{
    protected Sdk $sdk;
    protected $accountService;
    public function __construct(Sdk $sdk)
    {
        $this->sdk = $sdk;
        $this->accountService = new ModulesLmsApiMapperService();
    }

    public function index(Sdk $sdk)
    {
        return view('modules-lms-api-mapper::tenants.index');
    }
}
