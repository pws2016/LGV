<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class NazioniModel extends Model
{
	
    protected $table = 'nazione';
	protected $primaryKey = 'ID';
    protected $allowedFields = ['NAZIONE'];
	
	protected $returnType = 'array';
	
	
}