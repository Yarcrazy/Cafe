<?php

namespace common\models;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property int $dish_id
 *
 * @property Dish $dish
 * @property OrderMenu[] $orderMenus
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dish_id'], 'required'],
            [['dish_id'], 'default', 'value' => null],
            [['dish_id'], 'integer'],
            [['dish_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dish::class, 'targetAttribute' => ['dish_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dish_id' => 'Dish ID',
        ];
    }

    /**
     * Gets query for [[Dish]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDish()
    {
        return $this->hasOne(Dish::class, ['id' => 'dish_id']);
    }

    /**
     * Gets query for [[OrderMenus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderMenus()
    {
        return $this->hasMany(OrderMenu::class, ['menu_id' => 'id']);
    }
}
