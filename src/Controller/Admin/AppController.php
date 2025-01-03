<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        //$this->loadComponent('Csrf');
        $this->loadComponent('RequestHandler');

        $this->loadComponent('Flash');
		$this->viewBuilder()->setLayout('layout_admin');
         $this->loadComponent('Auth', [
		 'authenticate' => [
                'Form' => [
                    'scope' => ['Users.is_deleted' => 0,'Users.is_active'=>1],
					'fields' => [
                            'username' => 'email',
                            'password' => 'password'
                        ]
                ]
                
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'dashboard',
				'prefix' => 'Admin',
				'plugin' => NULL,
					'_matchedRoute' => '/admin',
            ],
            'logoutRedirect' => [
                 'controller' => 'Users',
                'action' => 'login',
				'prefix' => 'Admin',
				'plugin' => NULL,
					'_matchedRoute' => '/admin',
            ]
        ]);
        //$this->loadComponent('MyAcl',["request"=>$this->request]);
        
       $this->_access_type = [
            ACCESS_GENERAL => 'General',
            ACCESS_VENDOR => 'Vendor',
            ACCESS_ADMIN => 'Admin',
            ACCESS_API => 'Api'
        ]; 

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }
	
}
