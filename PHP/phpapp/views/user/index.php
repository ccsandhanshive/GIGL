<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= Html::a('Create', ['create', ['class' => 'btn btn-primary']]) ?>
</br></br></br>

<?php foreach ($users as $user): ?>
    <table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?= $user->id ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?= $user->username ?></td>
    </tr>
    <tr>
    <?= Html::a('Update', ['update', 'id' => $user->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'id' => $user->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this user?',
            'method' => 'post',
        ],
    ]) ?>
    </tr>
    <!-- Add more user details here -->
<?php endforeach; ?>
</table>
