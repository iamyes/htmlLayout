<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 */
class Slider extends \yii\db\ActiveRecord
{
    

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Изображение',
            'url' => 'Url',
        ];
    }

    public function upload(){
        if($this->validate()){
            $image = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($image);
            @unlink($image);
            return true;
        }else{
            return false;
        }
    }
    /*public function upload(){
        if($this->validate()){
            $this->image->saveAs("upload/global/{$this->image->baseName}.{$this->image->extension}");
        }else{
            return false;
        }
    }*/
}
