<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class TemplatesModel extends Model
{
    protected $table = 'templates';
	protected $primaryKey = 'id';
    protected $allowedFields = ['module', 'subject','html'];
	
	protected $returnType = 'array';
	
	
}