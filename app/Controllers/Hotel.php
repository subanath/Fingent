<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\HotelModel;
use App\Models\HomeModel;
class Hotel extends ResourceController
{
    use ResponseTrait;
    // all hotels
  

    public function List()
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
        $throttler = \Config\Services::throttler();
        $allowed = $throttler->check('listing', $defaultLimit, MINUTE);
        if($allowed) {
            $model = new HotelModel();
            $data['hotels'] = $model->orderBy('hId', 'DESC')->findAll();
            return $this->respond($data);
        }
        else {
          //return error or do nothing according to your need.
          $data['msg'] = 'limit exceed';
           echo json_encode($data);
        }
      }
   
   
   
    
}