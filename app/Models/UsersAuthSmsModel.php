<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UsersAuthSmsModel extends Model
{
	
    protected $table = 'users_auth_sms';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','code','expired_at'];
	protected $returnType = 'array';

	
}