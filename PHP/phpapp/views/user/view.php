<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this user?',
            'method' => 'post',
        ],
    ]) ?>
</p>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?= $model->id ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?= $model->username ?></td>
    </tr>
    <!-- Add more user details here -->
</table>
