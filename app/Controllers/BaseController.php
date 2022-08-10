<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\SettingModel;
use App\Models\UserModel;
use App\Models\UserProfileModel;
use App\Models\UserOfficesModel;
use App\Models\UserDocsModel;
use App\Models\UsersLogModel;
use App\Models\UsersAuthSmsModel;
use App\Models\TemplatesModel;
use App\Models\ComuniModel;
use App\Models\NazioniModel;
use App\Models\ProvinceModel;

use App\Models\OrdreCityModel;
use App\Models\OrdreProfessionelModel;
use App\Models\PatologieModel;
use App\Models\PrestationsModel;
use App\Models\SpecificationsModel;
use App\Models\StructureSanitaireModel;
use App\Models\ClinicTeamModel;

use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\AbstractDeviceParser;
/**
 * Class BaseController
 * test
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
  protected $helpers = ['form','url','text'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
			$this->session = \Config\Services::session();
		 $session = session()->start();
		 
		$this->SettingModel =  new SettingModel();
		$this->ComuniModel =  new ComuniModel();
		$this->NazioniModel =  new NazioniModel();
		$this->ProvinceModel =  new ProvinceModel();
		$this->UsersAuthSmsModel=new UsersAuthSmsModel();
		$this->UsersLogModel=new UsersLogModel();
		$this->UserModel =  new UserModel();
		$this->UserProfileModel =  new UserProfileModel();
		$this->UserOfficesModel =  new UserOfficesModel();
		$this->UserDocsModel =  new UserDocsModel();
		$this->TemplatesModel =  new TemplatesModel();
		$this->OrdreCityModel=new OrdreCityModel();
		$this->OrdreProfessionelModel=new OrdreProfessionelModel();
		$this->PatologieModel=new PatologieModel();
		$this->PrestationsModel=new PrestationsModel();
		$this->SpecificationsModel=new SpecificationsModel();
		$this->StructureSanitaireModel=new StructureSanitaireModel();
		$this->ClinicTeamModel=new ClinicTeamModel();
    }
	public function common_data(){
		$common_data=array();
		$is_logged=false;
		$user_data=$this->session->get('user_data');	
		if(!empty($user_data)) $is_logged=true;
		$common_data['is_logged']=$is_logged;
		$common_data['user_data']=$user_data;
		$settings=$this->SettingModel->getByMetaKey();
		$common_data['settings']=$settings;
		$user_loginas=$this->session->get('user_loginas');	
		if(!empty($user_loginas)) $common_data['user_loginas']=$user_loginas;
		
		
		switch($user_data['role']){
			case 'A': $common_data['prefix_route']='admin/';break;
			case 'C':
			case 'M': $common_data['prefix_route']='MyAccount/';break;
			default:$common_data['prefix_route']='';
		}			
		
		return $common_data;
	}
	
		
public function addUserLog($user_id,$action,$details=null){
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
		
		
		AbstractDeviceParser::setVersionTruncation(AbstractDeviceParser::VERSION_TRUNCATION_NONE);

		$userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse

		$dd = new DeviceDetector($userAgent);
			$dd->parse();

		if ($dd->isBot()) {
		  // handle bots,spiders,crawlers,...
		  $botInfo = $dd->getBot();
		} else {
		  $clientInfo = $dd->getClient(); // holds information about browser, feed reader, media player, ...
		  $osInfo = $dd->getOs();
		  $device = $dd->getDeviceName();
		  $brand = $dd->getBrandName();
		  $model = $dd->getModel();
		}	

	$tab_cookies=array("IP"=>$ip,"USER_AGENT"=>$_SERVER['HTTP_USER_AGENT'],"HTTP_REFERER"=>$_SERVER['HTTP_REFERER'],"device"=>$device ?? '',"brand"=>$brand ?? '',"model"=>$model ?? '',"osInfo"=>$osInfo ?? '');
	$tab_cookies=array_merge($tab_cookies,$clientInfo ?? array());
		$cookies=json_encode($tab_cookies,true);
		$tt=array('user_id'=>$user_id,"action"=>$action,"date"=>date('Y-m-d H:i:s'),"cookies"=>$cookies,"details"=>$details ?? null);
		
		
		$UsersLogModel=new UsersLogModel();
		$xx=$UsersLogModel->insert($tt);
		/* $error = $UsersLogModel->error(); 
		var_dump($error);*/
		return $xx; 
	}
	
	
	
}
