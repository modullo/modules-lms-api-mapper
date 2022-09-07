<?php
namespace Modullo\ModulesLmsApiMapper\Services;

use Hostville\Modullo\Sdk;
use Modullo\ModulesLmsApiMapper\Jobs\CreateLearnerJob;
use Modullo\ModulesLmsApiMapper\Models\ApiMapper;

class ModulesLmsApiMapperService
{
    protected $apiMapper;
    protected $usersConfig,$programsConfig,$coursesConfig,$modulesConfig,$lessonsConfig;

    public function __construct(){
        $this->apiMapper = new ApiMapper();
        $this->usersConfig = config('modules-lms-api-mapper.models.user.parameters',[]);
        $this->programsConfig = config('modules-lms-api-mapper.models.program.parameters',[]);
        $this->coursesConfig = config('modules-lms-api-mapper.models.course.parameters',[]);
        $this->modulesConfig = config('modules-lms-api-mapper.models.module.parameters',[]);
        $this->lessonsConfig = config('modules-lms-api-mapper.models.lesson.parameters',[]);
    }

    public function updateMap($updateType,$data){
        $config = config('modules-lms-api-mapper.models.'.$updateType.'.parameters',[]);
        foreach ($data as $key => $value){
            if(isset($config[$key]) && $config[$key]['should_map'] === true){
                $map = ApiMapper::updateOrCreate([
                    'model_name' => $updateType,
                    'internal_key' => $key,
                ],[
                    'external_key' => $value
                ]);
            }
        }
    }

    public function allMaps(){
        return [
            'users' => $this->usersConfig,
            'programs' => $this->programsConfig,
            'courses' => $this->coursesConfig,
            'modules' => $this->modulesConfig,
            'lessons' => $this->lessonsConfig,
        ];
    }

    public function allMapsData(){
        return [
            'users' => $this->usersMap(),
            'programs' => $this->programsMap(),
            'courses' => $this->coursesMap(),
            'modules' => $this->modulesMap(),
            'lessons' => $this->lessonsMap(),
        ];
    }

    //User mapper
    public function usersMap(){
        $userMapData = $this->apiMapper->where('model_name','user')->get();
        if ($userMapData->count() > 0){
            $userMapData = $userMapData->mapWithKeys(function ($item,$key){
                return [$item['internal_key'] => $item['external_key']];
            });
        }
        $userMapData = $userMapData->toArray();
        return $userMapData;
    }

    public function programsMap(){
        $programMapData = $this->apiMapper->where('model_name','program')->get();
        if ($programMapData->count() > 0){
            $programMapData = $programMapData->mapWithKeys(function ($item,$key){
                return [$item['internal_key'] => $item['external_key']];
            });
        }
        $programMapData = $programMapData->toArray();
        return $programMapData;
/*        $programMapData = $this->apiMapper->where('model_name','program')->get()->toArray();
        $programKeys = array_keys($this->programsConfig);
        $newMap = $this->extractMap($programKeys,$programMapData);
        return $newMap;*/
    }

    public function coursesMap(){
        $courseMapData = $this->apiMapper->where('model_name','course')->get();
        if ($courseMapData->count() > 0){
            $courseMapData = $courseMapData->mapWithKeys(function ($item,$key){
                return [$item['internal_key'] => $item['external_key']];
            });
        }
        $courseMapData = $courseMapData->toArray();
        return $courseMapData;
    }

    public function modulesMap(){
        $moduleMapData = $this->apiMapper->where('model_name','module')->get();
        if ($moduleMapData->count() > 0){
            $moduleMapData = $moduleMapData->mapWithKeys(function ($item,$key){
                return [$item['internal_key'] => $item['external_key']];
            });
        }
        $moduleMapData = $moduleMapData->toArray();
        return $moduleMapData;
    }

    public function lessonsMap(){
        $lessonMapData = $this->apiMapper->where('model_name','lesson')->get();
        if ($lessonMapData->count() > 0){
            $lessonMapData = $lessonMapData->mapWithKeys(function ($item,$key){
                return [$item['internal_key'] => $item['external_key']];
            });
        }
        $lessonMapData = $lessonMapData->toArray();
        return $lessonMapData;
    }

    private function extractMap($keys,$data){
        $map = [];
        foreach ($keys as $key){
            $map[$key] = isset($data[$key]) ? $data[$key] : '';
        }
        return $map;
    }
    
    public function getUpdateTypes(){
        $updateTypes = config('modules-lms-api-mapper.models',[]);
        if(empty($updateTypes)){
            return response()->json(['error' => 'Update types not set. Check appropriate config file.'],400);
        }
        return implode(',',array_keys($updateTypes));
    }
}
