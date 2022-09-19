<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UsersMobileModel extends Model
{
	
    protected $table = 'users_mobile';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','mobile'];
	protected $returnType = 'array';

	
}