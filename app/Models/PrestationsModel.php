<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class PrestationsModel extends Model
{
	
    protected $table = 'prestations';
	protected $primaryKey = 'id';
    protected $allowedFields = ['title','enable','ids_specification','is_default'];
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $useTimestamps = true;
	//protected $dateFormat='datetime';
    protected $createdField  = 'created_at';
	protected $deletedField  = 'deleted_at';
}