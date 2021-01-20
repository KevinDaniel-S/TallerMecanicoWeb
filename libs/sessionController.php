<?php 
include_once 'models/empleado.php';

class SessionController extends Controller_{

    private $userSession;
    private $username;
    private $userid;

    private $session;
    private $sites;

    private $user;
 
    function __construct(){
        parent::__construct();

        $this->init();
    }

    public function getUserSession(){
        return $this->userSession;
    }

    public function getUsername(){
        return $_SESSION['nombre'];
    }

    public function getUserId(){
        return $this->userid;
    }


    private function init(){
        $this->session = new Session();
        $json = $this->getJSONFileConfig();
        $this->sites = $json['sites'];
        $this->defaultSites = $json['default-sites'];
        $this->validateSession();
    }

    private function getJSONFileConfig(){
        $string = file_get_contents("config/access.json");
        $json = json_decode($string, true);

        return $json;
    }

    function validateSession(){
        error_log('SessionController::validateSession()');
        if($this->existsSession()){
            $role = $_SESSION['puesto'];
            error_log("sessionController::validateSession(): username:" . $_SESSION['nombre'] . " - role: " . $_SESSION['puesto']);
            if($this->isPublic()){
                $this->redirectDefaultSiteByRole($role);
                error_log( "SessionController::validateSession() => sitio público, redirige al main de cada rol" );
            }else{
                if($this->isAuthorized($role)){
                    error_log( "SessionController::validateSession() => autorizado, lo deja pasar" );
                }else{
                    error_log( "SessionController::validateSession() => no autorizado, redirige al main de cada rol" );
                    $this->redirectDefaultSiteByRole($role);
                }
            }
        }else{
            if($this->isPublic()){
                error_log('SessionController::validateSession() public page');
            }else{
                error_log('SessionController::validateSession() redirect al login');
                header('location: '. constant('URL') . '/login');
            }
        }
    }
    function existsSession(){
      return isset($_SESSION['nombre']);
    }

    function getUserSessionData(){
        $id = $this->session->getCurrentUser();
        $this->user = new Empleado();
        $this->user->get($id);
        error_log("sessionController::getUserSessionData(): " . $this->user->getUsername());
        return $this->user;
    }

    public function initialize($user){
        error_log("sessionController::initialize(): user: " . $user->getUsername());
        $this->session->setCurrentUser($user->getId());
        $this->authorizeAccess($user->getRole());
    }

    private function isPublic(){
        $currentURL = $this->getCurrentPage();
        error_log("sessionController::isPublic(): currentURL => " . $currentURL);
        $currentURL = preg_replace( "/\?.*/", "", $currentURL); //omitir get info
        for($i = 0; $i < sizeof($this->sites); $i++){
          if($currentURL != $this->sites[$i]['site']){
            continue;
          }

          if($this->sites[$i]['access'] === 'public'){
            return true;
          }
        }
        return false;
    }

    private function redirectDefaultSiteByRole($role){
        $url = '';
        for($i = 0; $i < sizeof($this->sites); $i++){
            if(in_array($role, $this->sites[$i]['role'])){
                $url = '/'.$this->sites[$i]['site'];
            break;
            }
        }
        header('location: '.$url);
        
    }

    private function isAuthorized($role){
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace( "/\?.*/", "", $currentURL); //omitir get info
        
        for($i = 0; $i < sizeof($this->sites); $i++){
          if($currentURL != $this->sites[$i]['site']){
            continue;
          }
          if(in_array($role, $this->sites[$i]['role'])){
            return true;
          }
        }
        return false;
    }

    private function getCurrentPage(){
        
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actual_link);
        error_log("sessionController::getCurrentPage(): actualLink =>" . $actual_link . ", url => " . $url[1]);
        return $url[1];
    }

    function authorizeAccess($role){
        error_log("sessionController::authorizeAccess(): role: $role");
        switch($role){
            case 'Administrativo':
                $this->redirect($this->defaultSites['Administrativo']);
            break;
            case 'Jefe mecanico':
                $this->redirect($this->defaultSites['Jefe mecanico']);
            break;
            case 'Ayudante'    :
                $this->redirect($this->defaultSites['Ayudante']);
            default:
        }
    }

    function logout(){
        $this->session->closeSession();
    }
}

?>
