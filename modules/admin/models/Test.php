<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $anons
 * @property string $content
 * @property double $price
 * @property double $old_price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 * @property integer $visible
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'anons', 'old_price'], 'required'],
            [['category_id', 'visible'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price', 'old_price'], 'number'],
            [['name', 'anons', 'keywords', 'description', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'anons' => 'Anons',
            'content' => 'Content',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'img' => 'Img',
            'hit' => 'Hit',
            'new' => 'New',
            'sale' => 'Sale',
            'visible' => 'Visible',
        ];
    }
}
