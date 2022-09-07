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
    protected $apiMapperService;
    public function __construct(Sdk $sdk)
    {
        $this->sdk = $sdk;
        $this->apiMapperService = new ModulesLmsApiMapperService();
    }

    public function index(Sdk $sdk)
    {
        $maps = $this->apiMapperService->allMaps();
        $mapsData = $this->apiMapperService->allMapsData();
        return view('modules-lms-api-mapper::tenants.index',compact('maps','mapsData'));
    }

    public function store(Request $request)
    {
        $updateTypes = $this->apiMapperService->getUpdateTypes();
        $request->validate([
            'update-type' => ['required','string','in:'.$updateTypes]
        ]);

        $this->apiMapperService->updateMap($request->query('update-type'),$request->except('update-type'));
        return response()->json(['message'=>'Map successfully updated'],200);
    }
}
