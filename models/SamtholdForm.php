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
class Samtholdform extends Model
{
    public $pe_highest;
	public $pe_higher;
    public $pe_betw1;
    public $pe_betw2;
    public $pe_lower;



public function rules()
    {
        return [
            // username and password are both required
            [['pe_highest','pe_higher','pe_betw1','pe_betw2','pe_lower' ], 'required'],
            
        ];
    }

       public function attributeLabels()
    {
        return [
            'pe_highest' => 'Census Threshhold',
            'pe_higher' => 'Person Engaged_Lowerst Value',
            'pe_betw1' => 'Higherst Value',
            'pe_betw2' => 'Lowerst Value',
            'pe_lower' => 'Person Engaged_Higherst Value',
        ];
    }


   }



?>