<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UserDocsModel extends Model
{
	
    protected $table = 'user_docs';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','title','type'];
	protected $returnType = 'array';
	
	protected $useTimestamps = true;
	//protected $dateFormat='datetime';
    protected $createdField  = 'created_at';

}