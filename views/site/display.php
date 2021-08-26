<?php 
use yii\console\widgets\Table;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Todo;
use app\models\Category;

$this->title = 'Display';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="overflow-Y:scroll; Overflow-X:hidden; height:300px;">
    <?php $data =Todo::find()->asArray()->all();
     $cate = ArrayHelper::map(Category::find()->all(),'id','name');
     //print_r($data);
     if(!empty($data)){
         $td = "<table class='table table-striped table-bordered'>
               <thead>
                  <tr>
                     <th> To-do item name</th>
                     <th> Category</th>
                     <th> Timestamp</th>
                     <th> Actions</th>
                  </tr>
                </thead>
                <tbody>";
         foreach($data as $row){
            $date=date_create($row['timestamp']);
            $td .= "<tr><td>".$row['name']."</td><td>".$cate[$row['Category_id']]."</td><td>".date_format($date,'d M')."</td><td>".Html::Button('Delete', ['class' => 'btn btn-danger', 'onclick'=>'deleted('.$row["id"].')'])."</td></tr>";
         
        }
        $td .="</tbody></table>";
        echo $td;
     }else{
         echo "NO Todo Records Found!";
     }
     
    
    ?>
     
</div>
