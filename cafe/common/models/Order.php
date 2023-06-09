<?php

namespace common\models;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $date
 *
 * @property OrderMenu[] $orderMenus
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['date', 'default', 'value' => date('Y-m-d H:i:s')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[OrderMenus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderMenus()
    {
        return $this->hasMany(OrderMenu::class, ['order_id' => 'id']);
    }
}
