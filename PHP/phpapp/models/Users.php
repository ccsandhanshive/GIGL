<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
    public function actionView($id)
{
    // Find the user model by id
    $user = User::findOne($id);

    // Check if the user exists
    if (!$user) {
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Render the view and pass the $user variable to it
    return $this->render('view', [
        'user' => $user,
    ]);
}
    public function actionViewAll()
{
    // Find the user model by id
    $users = User::find();

    // Render the view and pass the $user variable to it
    return $this->render('view', [
        'user' => $users,
    ]);
}
}
