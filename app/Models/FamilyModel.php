<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class FamilyModel extends Model
{
	
    protected $table = 'family';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','nome','cognome','data_nascita','type','cf'];
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;
	//protected $dateFormat='datetime';
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
}