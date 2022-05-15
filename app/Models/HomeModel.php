<?php 
namespace App\Models;
use CodeIgniter\Model;



class HomeModel extends Model
{
    protected $table = 'limitcount';
    protected $primaryKey = 'id';

    protected $allowedFields = ['limitCount'];


      public function init_update($data = NULL) {

      
         $query = $this->db->table($this->table)->update($data, array('id' => 1));
        return $query;
     
    
    }



}