<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use dektrium\user\filters\AccessRule;
use common\models\LoginForm;
use dektrium\user\models\User;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => ['error'],
                    'allow' => true,
                ],
                [
                    
                    'allow' => true,
                    'roles' => ['Superadmin'],
                ],
            ],
        ],
    ];
}
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
		if(\Yii::$app->user->can('superadmin'))
		{
			echo \Yii::$app->user->identity->username;
		}
		return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
	 
     */
	/* public function actionSuper(){
		
		$else = "sads";
		$session = \Yii::$app->session['BACKENDSESSID'];
		
		echo $session = $else;
	} */
	
	public function actionSuper(){
		 
		$else = "user_backend";
		$id_user = \Yii::$app->session;
	    $id_user['backend'] = $else;
		echo $id_user;
	}
	
	public function actionSes(){
		
		$session = \Yii::$app->session;
		
		echo $session->get('id');
		
	}
	public function actionSesa(){
		
		$session = \Yii::$app->session;
		
		echo $session->get('backend');
		
	}
	public function actionSe(){
		
		$session = \Yii::$app->session;
		
		echo $session->get('frontend');
		
	}
}
