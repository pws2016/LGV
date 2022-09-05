<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UserProfileModel extends Model
{
	
    protected $table = 'user_profile';
	protected $primaryKey = 'id';
    protected $allowedFields = [ 'user_id','nome','cognome','email','telefono','cf','residenza_stato','residenza_provincia','residenza_comune','residenza_cap','residenza_indirizzo','nascita_data','nascita_stato','nascita_provincia','nascita_comune',
	
	'ragione_sociale','fattura_piva','fattura_cf','fattura_stato','fattura_provincia','fattura_comune','fattura_cap','fattura_indirizzo','fattura_pec','fattura_sdi','fattura_phone','dettagli','mobile','fattura_nome','fattura_cognome','fattura_type','fattura_sesso','fattura_birthdate','fattura_IBAN',
	'tipologia','ordre_prof','structure_sanitaire','ordre_city','ids_specification','ids_patologie','ids_prestation','ordre_num','logo','title'];
	
	protected $returnType = 'array';
	
}