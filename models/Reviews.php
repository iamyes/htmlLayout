<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $email
 * @property string $data
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'email'], 'required'],
            ['email','email'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['title', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'email' => 'Email',
            'date' => 'Data',
        ];
    }

    public $current_date;
    public function init(){
        parent::init();
        $this->current_date = date("Y-m-d H:i:s");
    }
}
