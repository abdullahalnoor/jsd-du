<?php

namespace App\Helpers;

use Request;
use Browser;
use DB;
use App\Models\AppLog as AppLogModel;

class AppLog
{


    public static function addToLog($logEvent,$subject,$loggableType,$model,$modelParentId=null)
    {
    	// $log = [];
      

        DB::beginTransaction();
        try {

            $appLogModel = new AppLogModel();
            
            $appLogModel->log_event_id  =  $logEvent->id ;
            $appLogModel->user_id  =  auth()->user()->id ;
            $appLogModel->app_loggable_id  = $model->id;
            $appLogModel->app_loggable_type  = $loggableType;
            $appLogModel->model_parent_id  = $modelParentId;
    
            $appLogModel->log_name  = $subject;
            $appLogModel->log_text  = $model;
    
    
            $appLogModel->request_url  = Request::fullUrl();
            $appLogModel->request_method  = Request::method();
    
    
            $appLogModel->user_agent  = Request::header('user-agent');
            $appLogModel->ip_address  = Request::ip();
            $appLogModel->mac_address  = exec('getmac');
    
    
            $appLogModel->device_type  = Browser::deviceType();
            $appLogModel->browser_name  = Browser::browserName();
            $appLogModel->browser_family  = Browser::browserFamily();
            $appLogModel->platform_name  = Browser::platformName();
            $appLogModel->device_family  = Browser::deviceFamily();
            $appLogModel->device_model  = Browser::deviceModel();
            $appLogModel->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            // return $e->getMessage();
            \Log::error('Exception caught: ' . $e->getMessage()); 
            DB::rollback();
           return false;
        }
  
    
    	// AppLogModel::create($log);
    }


  


}