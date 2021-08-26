<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Category;


$this->title = 'Technical Round';
?>
<div class="container">
    <div class="container head">
        <div class="row">
            <div class="col-4">
                <img src="assets/img/handysolver.png" style="width:40%;" class="img-thumbnail">
            </div>
            <div class="col-7 text-center p-4">
                <h1>TO-DO List Application</h1>
                
                <h5 class="text-muted">Where to-do itemes are added/deleted and belong to category</h5>
            </div>
        </div>
    </div>
    <div class="container align-middle border border-dark p-4">
        <div class="row">
            <div class="col-md-12 mb-5 pb-5">
                <?php $form = ActiveForm::begin(['id'=>'add', 'action'=>'#' , 'class'=>'add']); ?>
                   <div class="container justify-content-center">
                       <div class="row form-group h-4">
                            <?php $cat = ArrayHelper::map(Category::find()->all(),'id','name');?>
                           <div class="col-md-2">
                                  <?= $form->field($model,'id')->dropDownList($cat, ['data-live-search' => 'true','label'=>false])->label(false);?>
                           </div>
                            <div class="col-md-6">
                                <?= $form->field($model,'todo',['options' => ['class' => ' input text'], 'inputOptions'=>[ 'class'=>'form-control','placeholder'=>'Type Todo item name']])->label(false);?>
                           </div>
                           <div class="col-md-2">
                                <?= Html::submitbutton("ADD", ['class' => "btn btn-success", 'id'=>'addbtn']); ?>
                           </div>
                       </div>
                </div>
                  <?php ActiveForm::end(); ?>  
            </div>
            <div class="col-md-12">
                <div class="container-fluid border border-secondary" id="dis">
                    <!-- Display Table data -->
                    <?php// include('display.php');?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/Technical Round by Vikash using Yii2 Framework/handysolver/web/assets/acc5d8bf/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
            function tbldisplay(){
              $.ajax({
                method: "GET", 
                url: '<?= Url::toRoute('site/display');?>',
                }).done(function( data ) { 
                    $('#dis').html(data);
                });

            }
            $(document).ready(function () {
                  console.log("ready");
                  tbldisplay();
                  $('#addbtn').click(function(e){
                            // e.preventDefault(); 
                             
                    });
                  
             });
            $(function () {
             $("#add").submit(function(event) {
                     // stopping submitting
                    event.preventDefault(); 
               
                     var data = $(this).serializeArray();
                     var url = $(this).attr('action');
                     $.ajax({
                         url: '<?= Url::toRoute('site/insert');?>',
                         type: 'post',
                         data: {'name':data[1].value , 'Category_id':data[0].value},
                         success: function (response) {
                                 if (response == 1) {
                                 console.log("Successfully Added");
                                 $("#add")[0].reset();
                                 tbldisplay();
                             
                          }
                        }
                     });
                     event.stopImmediatePropagation();
                    console.log(data[0].value+" "+data[1].value);
                    return false;
                 });
             
            });
        
    
         function deleted(v){
         $.ajax({
                method: "Post", 
                url: '<?= Url::toRoute('site/deletetodo');?>',
                data: {'id': v },
                }).done(function( response ) { 
                   if(response == 1){
                      console.log("Successfully Deleted");
                      tbldisplay();
                   }else{
                       console.log("failed");
                   }
                });

            }
</script>


 