<?php
//module/SanAuth/Module.php
namespace SanAuth;
 
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Authentication\Storage;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;
 
class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig(){/*common code*/}
    public function getConfig(){ /*common code*/}
     
    public function getServiceConfig()
    {
        return array(
            'factories'=>array(
        'SanAuth\Model\MyAuthStorage' => function($sm){
            return new \SanAuth\Model\MyAuthStorage('zf_tutorial');  
        },
         
        'AuthService' => function($sm) {
                    //My assumption, you've alredy set dbAdapter
                    //and has users table with columns : user_name and pass_word
                    //that password hashed with md5
            $dbAdapter           = $sm->get('Zend\Db\Adapter\Adapter');
                    $dbTableAuthAdapter  = new DbTableAuthAdapter($dbAdapter, 
                                              'users','user_name','pass_word', 'MD5(?)');
             
            $authService = new AuthenticationService();
            $authService->setAdapter($dbTableAuthAdapter);
                    $authService->setStorage($sm->get('SanAuth\Model\MyAuthStorage'));
              
            return $authService;
        },
            ),
        );
    }
 
}