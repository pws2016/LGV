<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ClinicTeamModel extends Model
{
	
    protected $table = 'clinic_team';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','name','description','image','enable'];
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;
	//protected $dateFormat='datetime';
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
}