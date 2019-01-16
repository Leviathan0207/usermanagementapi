<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->autoRender=false;
      
    }
    public function getUsers(){
        $this->loadModel('Users');
        $users = $this->Users->find('all')->first();
        $response = [
            'status'=> 200,
            'datas'=> [
                'username'=>$users->user_name,
                'password'=>$users->user_password
            ],
            'errors' => [
                'code'=> '123',
                'source'=>'123',
                'message'=>'123',
                'detail'=>'123'
            ]
        ];
        $this->response->type('json');       
        $this->response->body(json_encode($response, JSON_PRETTY_PRINT));
    }
    
}
