<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Car;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            // 'access' => [
            //     'class' => AccessControl::class,
            //     'rules' => [
            //         ...
            //     ],
            // ],
            // 'verbs' => [
            //     'class' => VerbFilter::class,
            //     'actions' => [
            //         'logout' => ['post'],
            //     ],
            // ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        // Remova ou comente todo o conteúdo deste método
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        // Remova ou comente todo o conteúdo deste método
    }

    public function actionContact($id)
    {
        $car = Car::findOne($id);

        // Aqui você pode adicionar a lógica para enviar um e-mail ou uma mensagem para a empresa sobre o carro.

        return $this->redirect(['car/index']);
    }
}
