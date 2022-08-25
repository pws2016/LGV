<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UserDocsModel extends Model
{
	
    protected $table = 'user_docs';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','doc','type'];
	protected $returnType = 'array';
	
	protected $useTimestamps = true;
	//protected $dateFormat='datetime';
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';

}