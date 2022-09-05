<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UserOfficesModel extends Model
{
	
    protected $table = 'user_offices';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','title','indirizzo','provincia','comune','lat','lng','phone','email'];
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;
	  protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
}