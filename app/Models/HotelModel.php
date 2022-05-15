<?php 
namespace App\Models;
use CodeIgniter\Model;
class HotelModel extends Model
{
    protected $table = 'hotel';
    protected $primaryKey = 'hId';
    protected $allowedFields = ['name', 'price'];
}