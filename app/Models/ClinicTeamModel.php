<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ClinicTeamModel extends Model
{
	
    protected $table = 'clinic_team';
	protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','name','description','image','enable','ids_specification','ids_patologie'];
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;
	//protected $dateFormat='datetime';
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
	protected $updatedField  = 'updated_at';
}