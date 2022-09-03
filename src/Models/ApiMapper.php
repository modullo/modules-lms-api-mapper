<?php
namespace Modullo\ModulesLmsApiMapper\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiMapper extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function usersMap(){
        return self::where('model_name','users')->get();
    }

    public function programsMap(){
        return self::where('model_name','programs')->get();
    }

    public function coursesMap(){
        return self::where('model_name','courses')->get();
    }

    public function modulesMap(){
        return self::where('model_name','modules')->get();
    }

    public function lessonsMap(){
        return self::where('model_name','lessons')->get();
    }
}