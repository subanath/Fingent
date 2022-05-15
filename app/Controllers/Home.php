<?php

namespace App\Controllers;
use App\Models\HomeModel;

class Home extends BaseController
{
	 function __construct(){
        
        /* Loading user modal and session library */
        $this->model = new HomeModel();
       

    }
    public function index()
    {
    	
         $model = new HomeModel();
         $defaultLimit = $model->findAll(1,0);
         if(!empty($defaultLimit))
         {
         	$defaultLimit =$defaultLimit[0]['LimitCount'];
         }
         else 
         {
         	$defaultLimit = 1;
         }

    	
    	 $data['defaultLimit']= $defaultLimit;
             
    	 echo view('welcome_message',$data);
       
         
    }

    public function updateLimit($lmtval)
    {

    	


		$update_rows = array(
			'limitCount' => $lmtval,
			

		);
		
         $this->model->init_update($update_rows);

        $data['lmtval']   = $lmtval;
        echo json_encode($data);


    }
}
