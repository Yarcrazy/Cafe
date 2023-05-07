<?php

namespace common\models;

/**
 * This is the model class for table "dish".
 *
 * @property int $id
 * @property int $cook_id
 * @property string $name
 *
 * @property Cook $cook
 * @property Menu[] $menus
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dish';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cook_id', 'name'], 'required'],
            [['cook_id'], 'default', 'value' => null],
            [['cook_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['cook_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cook::class, 'targetAttribute' => ['cook_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cook_id' => 'Cook ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Cook]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCook()
    {
        return $this->hasOne(Cook::class, ['id' => 'cook_id']);
    }

    /**
     * Gets query for [[Menus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::class, ['dish_id' => 'id']);
    }
}
