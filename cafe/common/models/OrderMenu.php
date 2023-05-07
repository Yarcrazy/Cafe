<?php

namespace common\models;

/**
 * This is the model class for table "order_menu".
 *
 * @property int $id
 * @property int $order_id
 * @property int $menu_id
 * @property int $amount
 *
 * @property Menu $menu
 * @property Order $order
 */
class OrderMenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'menu_id', 'amount'], 'required'],
            [['order_id', 'menu_id', 'amount'], 'default', 'value' => null],
            [['order_id', 'menu_id', 'amount'], 'integer'],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::class, 'targetAttribute' => ['menu_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'menu_id' => 'Menu ID',
            'amount' => 'Amount',
        ];
    }

    /**
     * Gets query for [[Menu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::class, ['id' => 'menu_id']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }
}
