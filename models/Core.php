<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "core".
 *
 * @property integer $SLID
 * @property integer $District
 * @property integer $Ds
 * @property integer $Gn
 * @property integer $McUcPs
 * @property string $Establishment
 * @property string $PostalNo
 * @property string $FloorNo
 * @property string $BuildingName
 * @property string $Street
 * @property string $VillageTown
 * @property string $PostalTown
 * @property string $Other
 * @property integer $LegalState
 * @property integer $UnitNature
 * @property string $BeginingYear
 * @property integer $AccountStaus
 * @property integer $PersonEngage
 * @property string $Tel_Land1
 * @property string $Tel_Land2
 * @property string $Tel_Mob1
 * @property string $Tel_Mob2
 * @property string $E_mail1
 * @property string $E_mail2
 * @property integer $RegInst1
 * @property integer $RegInst2
 * @property integer $RegInst3
 * @property integer $RegInst4
 * @property integer $RegInst5
 * @property integer $slsic
 * @property string $create_at
 * @property string $update_at
 * @property string $user_id
 * @property integer $edit_ver
 * @property string $ip
 * @property integer $ins_method
 *
 * @property District $district
 * @property Email[] $emails
 * @property Registerd[] $registerds
 * @property Telno[] $telnos
 */
class Core extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public function behaviors()
    {
        return [
            'bedezign\yii2\audit\AuditTrailBehavior'
        ];
    }
    
    public static function tableName()
    {
        return 'core';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['District','Establishment','slsic'],'required'],
            [['District', 'Ds', 'Gn', 'McUcPs', 'LegalState', 'UnitNature', 'AccountStaus', 'PersonEngage', 'slsic', 'edit_ver', 'ins_method'], 'integer'],
            [['BeginingYear', 'create_at', 'update_at','vfy_id','ip','user_id','RegInst1', 'RegInst2', 'RegInst3', 'RegInst4', 'RegInst5',], 'safe'],
            [['Establishment', 'Other'], 'string', 'max' => 200],
            [['PostalNo', 'FloorNo'], 'string', 'max' => 10],
            [['BuildingName'], 'string', 'max' => 50],
            [['Street', 'VillageTown', 'PostalTown'], 'string', 'max' => 100],
            [['E_mail1', 'E_mail2'], 'string', 'max' => 45],
            //[['user_id'], 'string', 'max' => 5],
            //[['ip'], 'string', 'max' => 255],
            [['District'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['District' => 'dis']],
            [['E_mail1', 'E_mail2'], 'email'],
            ['Establishment', 'unique', 'targetAttribute' => ['District', 'Ds', 'Gn', 'McUcPs','slsic','Establishment'],'message' => 'Establishment must be uniquely identified'],
           // [['Tel_Land1','Tel_Land2','Tel_Mob1','Tel_Mob2'],'number','min'=>10],
             [['Tel_Land1','Tel_Land2','Tel_Mob1','Tel_Mob2'],'integer'],
             [['Tel_Land1','Tel_Land2','Tel_Mob1','Tel_Mob2'],'string','length'=>10],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SLID' => 'Slid',
            'District' => 'District',
            'Ds' => 'DS Division',
            'Gn' => 'GN Division',
            'McUcPs' => 'MC/UC/PS',
            'Establishment' => 'Establishment',
            'PostalNo' => 'Postal No',
            'FloorNo' => 'Floor No',
            'BuildingName' => 'Building Name',
            'Street' => 'Street',
            'VillageTown' => 'Village Town',
            'PostalTown' => 'Postal Town',
            'Other' => 'Other',
            'LegalState' => 'Legal State',
            'UnitNature' => 'Unit Nature',
            'BeginingYear' => 'Begining Year',
            'AccountStaus' => 'Account Status',
            'PersonEngage' => 'Person Engage',
            'Tel_Land1' => 'Telephone-Landline',
            'Tel_Land2' => 'Telephone-Landline',
            'Tel_Mob1' => 'Telephone-Mobile',
            'Tel_Mob2' => 'Telephone-Mobile',
            'E_mail1' => 'E Mail1',
            'E_mail2' => 'E Mail2',
            'RegInst1' => 'Registered Institute',
            'RegInst2' => 'Reg Inst2',
            'RegInst3' => 'Reg Inst3',
            'RegInst4' => 'Reg Inst4',
            'RegInst5' => 'Reg Inst5',
            'slsic' => 'SLSIC',
            'create_at' => 'Created On',
            'update_at' => 'Update At',
            'user_id' => 'User ID',
            'edit_ver' => 'Edit Ver',
            'ip' => 'ip',
            'ins_method' => 'Ins Method',
            'vfy_id'=>'vfy_id',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['dis' => 'District']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /* public function getEmails()
    {
        return $this->hasMany(Email::className(), ['SLID' => 'SLID']);
    }
 */
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegisterds()
    {
        return $this->hasMany(Registerd::className(), ['SLID' => 'SLID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /* public function getTelnos()
    {
        return $this->hasMany(Telno::className(), ['SLID' => 'SLID']);
    } */

    /**
     * @inheritdoc
     * @return CoreQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CoreQuery(get_called_class());
    }
    public function getFull_Address() {
        return $this->PostalNo . ' ' . $this->FloorNo . ' ' . $this->BuildingName . ' ' . $this->Street . ' ' . $this->VillageTown . ' ' . $this->PostalTown;

    }
    
    public function getTel(){
        return $this->Tel_Land1 .' '. $this->Tel_Land2 .' '.$this->Tel_Mob1 .' '. $this->Tel_Mob2;
    }
    public function getMail(){
        return $this->E_mail1 .' '. $this->E_mail2 ;
    }
    public function getGeoID(){
        return '['.$this->District .'/'. $this->Ds .'/'. $this->Gn.'] '.$this->Establishment;
    }
    
    public function getRgdins(){
        return $this->RegInst1 . ' '.$this->RegInst2 .' '.$this->RegInst3 .' '.$this->RegInst4 .' '.$this->RegInst5 ;
    }
   
}
