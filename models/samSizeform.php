<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SamSizeform extends Model
{
    public $sam_size;
    public $maxS_size;
	



public function rules()
    {
        return [
            // username and password are both required
            [['sam_size','maxS_size' ], 'required'],
            [['maxS_size' ], 'safe'],
            [['sam_size','maxS_size' ], 'integer'],
            
        ];
    }

       public function attributeLabels()
    {
        return [
            'sam_size' => 'Sample Size',
            'maxS_size' => 'Maximum Allocation per strata',
        ];
    }

   }



?>