<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $email
 * @property string $date
 * @property string $active
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
            [['content', 'active'], 'string'],
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
            'date' => 'Date',
            'active' => 'Active',
        ];
    }
}
