<?php

namespace Config;

use App\Models\AttendanceModel;
use App\Models\HomeroomModel;
use App\Models\PeriodModel;
use App\Models\SchoolCategoryModel;
use App\Models\SchoolModel;
use App\Models\StatusDetailModel;
use App\Models\StatusModel;
use App\Models\TimeModel;
use App\Models\UserModel;
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
    
    public static function userModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('userModel');
        }
    
        return new UserModel();
    }
    
    public static function schoolModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('schoolModel');
        }
        
        return new SchoolModel();
    }
    
    public static function homeroomModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('homeroomModel');
        }
        
        return new HomeroomModel();
    }
    
    public static function timeModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('timeModel');
        }
        
        return new TimeModel();
    }
    
    public static function statusModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('statusModel');
        }
        
        return new StatusModel();
    }
    
    public static function statusDetailModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('statusDetailModel');
        }
        
        return new StatusDetailModel();
    }
    
    public static function periodModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('periodModel');
        }
        
        return new PeriodModel();
    }
    
    public static function attendanceModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('attendanceModel');
        }
    
        return new AttendanceModel();
    }

    public static function schoolCategoryModel($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('schoolCategoryModel');
        }
        
        return new SchoolCategoryModel();
    }

}
