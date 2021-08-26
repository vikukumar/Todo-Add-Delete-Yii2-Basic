<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class addcat extends Model
{
    public $id;
    public $todo;
     public function rules()
    {
        return [
            // name, email, subject and body are required
            [['id', 'todo'], 'required'],
            
        ];
    }

}
?>