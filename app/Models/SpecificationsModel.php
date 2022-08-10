<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class SpecificationsModel extends Model
{
	
    protected $table = 'specifications';
	protected $primaryKey = 'id';
    protected $allowedFields = ['title','enable','description'];
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;
	//protected $dateFormat='datetime';
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
}