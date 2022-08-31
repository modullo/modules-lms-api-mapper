<?php

namespace Modullo\ModulesLmsBaseAccounts\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use Hostville\Modullo\Sdk;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modullo\ModulesLmsBaseAccounts\Http\Requests\StoreModulesLmsApiMapperRequest;
use Modullo\ModulesLmsBaseAccounts\Http\Requests\UpdateModulesLmsApiMapperRequest;
use Modullo\ModulesLmsBaseAccounts\Services\ModulesLmsApiMapperService;

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
        $data = $this->accountService->getLearners($sdk);
        return view('modules-lms-base-accounts::tenants.learner.index',compact('data'));
    }

    public function create()
    {
        return view('modules-lms-base-accounts::tenants.learner.create');
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
        return view('modules-lms-base-accounts::tenants.learner.show');
    }

    public function edit(string $id, Sdk $sdk)
    {
        $learner = $this->accountService->getSingleLearner($id,$sdk);
        if(isset($learner['error'])){
            return back()->with($learner);
        }
        return view('modules-lms-base-accounts::tenants.learner.edit',compact('learner'));
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
