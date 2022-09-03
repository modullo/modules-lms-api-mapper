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
    protected $accountService;
    protected $mappingService;
    public function __construct(Sdk $sdk)
    {
        $this->sdk = $sdk;
        $this->accountService = new ModulesLmsApiMapperService();
        $this->mappingService = new ModulesLmsApiMapperService();
    }

    public function index(Sdk $sdk)
    {
        $data = $this->accountService->getLearners($sdk);
        return view('modules-lms-api-mapper::tenants.learner.index');
    }

    public function create()
    {
        return view('modules-lms-api-mapper::tenants.learner.create');
    }

    public function store(StoreModulesLmsApiMapperRequest $request, Sdk $sdk)
    {
        return $this->accountService->createLearner($request->all(),$sdk);
    }
    public function storeBulk(StoreModulesLmsApiMapperRequest $request, Sdk $sdk)
    {
        return $this->accountService->processCSV($request->file('csv_file'),$sdk);
    }

    public function show(string $id, Sdk $sdk)
    {
        //
        return view('modules-lms-api-mapper::tenants.learner.show');
    }

    public function edit(string $id, Sdk $sdk)
    {
        $learner = $this->accountService->getSingleLearner($id,$sdk);
        if(isset($learner['error'])){
            return back()->with($learner);
        }
        return view('modules-lms-api-mapper::tenants.learner.edit',compact('learner'));
    }

    public function update(UpdateModulesLmsApiMapperRequest $request, $id, Sdk $sdk)
    {
        return $this->accountService->updateLearner($request->all(),$sdk);
    }

    public function delete(string $id)
    {
        //
    }
}
