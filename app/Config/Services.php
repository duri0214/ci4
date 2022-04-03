<?php

namespace Config;

use App\Models\MSchoolCategoryModel;
use App\Models\SchoolAttendModel;
use App\Models\SchoolAttendStatusDetailModel;
use App\Models\SchoolAttendStatusModel;
use App\Models\SchoolCurriculumModel;
use App\Models\SchoolHomeroomModel;
use App\Models\SchoolLessonModel;
use App\Models\SchoolPeriodModel;
use App\Models\SchoolModel;
use App\Models\SchoolTimeModel;
use App\Models\SchoolUserModel;
use CodeIgniter\Config\BaseService;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
    /*
     * public static function example($getShared = true)
     * {
     *     if ($getShared) {
     *         return static::getSharedInstance('example');
     *     }
     *
     *     return new \CodeIgniter\Example();
     * }
     */
    
    public static function schoolUserModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('schoolUserModel');
        }
    
        return new SchoolUserModel();
    }
    
    public static function schoolModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('schoolModel');
        }
        
        return new SchoolModel();
    }
    
    public static function schoolHomeroomModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('schoolHomeroomModel');
        }
        
        return new SchoolHomeroomModel();
    }
    
    public static function schoolTimeModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('schoolTimeModel');
        }
        
        return new SchoolTimeModel();
    }
    
    public static function schoolAttendStatusModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('schoolAttendStatusModel');
        }
        
        return new SchoolAttendStatusModel();
    }
    
    public static function schoolStatusDetailModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('schoolStatusDetailModel');
        }
        
        return new SchoolAttendStatusDetailModel();
    }
    
    public static function schoolPeriodModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('schoolPeriodModel');
        }
        
        return new SchoolPeriodModel();
    }
    
    public static function schoolAttendModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('schoolAttendModel');
        }
    
        return new SchoolAttendModel();
    }

    public static function mSchoolCategoryModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('mSchoolCategoryModel');
        }
        
        return new MSchoolCategoryModel();
    }
    
    public static function schoolLessonModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('schoolLessonModel');
        }
        
        return new SchoolLessonModel();
    }
    
    public static function schoolCurriculumModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('schoolCurriculumModel');
        }
        
        return new SchoolCurriculumModel();
    }
    
}
