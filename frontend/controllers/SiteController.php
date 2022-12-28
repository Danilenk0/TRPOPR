<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\RegisterForm;
use common\models\User;
use yii\web\NotFoundHttpException;
use PhpOffice\PhpWord;
use common\models\Checkmaterial;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegister()
    {
        $modelForm = new RegisterForm();

        if ($modelForm->load(Yii::$app->request->post()) && $modelForm->validate()) {
            $user = new User([
                'login' => $modelForm->login,
                'password_hash' => Yii::$app->security->generatePasswordHash($modelForm->password),
                'auth_key' => Yii::$app->security->generateRandomString(32)
            ]);

            if ($user->save()) {
                Yii::$app->user->login($user, 3600 * 24 * 7);
                return $this->goHome();
            }
        }

        return $this->render('register', compact('modelForm'));
    }

    public function actionLogin()
    {
        $modelForm = new RegisterForm();

        if ($modelForm->load(Yii::$app->request->post()) && $modelForm->validate()) {
            $user = User::findOne(['login' => $modelForm->login]);

            if ($user && Yii::$app->security->validatePassword($modelForm->password, $user->password_hash)) {
                Yii::$app->user->login($user, 3600 * 24 * 7);
                return $this->goHome();
            }
        }

        return $this->render('login', compact('modelForm'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionPrint($checkId)
    {
        $check = Checkmaterial::findOne(['id' => $checkId]);

        if (!$check) {
            throw new NotFoundHttpException('ЧЕКА НЕТ В БАЗЕ ДАННЫХ');
        }

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $section->addText(
            '                                                            OOO "СТРОЙМАТЕРИАЛ"                                            '
                . '****************************************************************************************************************** '

        );
        $section->addText(
            'УНП 121421343'
        );
        $section->addText(
            'РН 123423523'
        );
        $section->addText(
            '                                                            ПЛАТЕЖНЫЙ ДОКУМЕНТ'
        );
        $section->addText(
            '                                                                   ЧЕК ПРОДАЖИ'
        );
        $table_styleFont_bold = array('name' => 'Times New Roman', 'size' => 16, 'color' => '000000', 'bold' => TRUE);
        $section->addText(
            'ПОКУПАТЕЛЬ =  ' . $check->idcustomer0->name
        );
        $section->addText(
            'ТОВАР =  ' . $check->idbuilding0->name
        );
        $section->addText(
            '----------------------------'
        );
        $section->addText(
            'ИТОГОВАЯ СТОИМОСТЬ =   ' . $check->amount * $check->idbuilding0->cost,
            $table_styleFont_bold
        );
        $section->addText(
            
            '****************************************************************************************************************** '

        );
        $section->addText(
            '                                                                 СПАСИБО ЗА ПОКУПКУ'
        );
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('./helloWorld.docx');
    }
}
