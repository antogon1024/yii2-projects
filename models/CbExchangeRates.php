<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cb_exchange_rates".
 *
 * @property integer $id
 * @property string $usd
 * @property string $eur
 * @property string $nok
 * @property string $date
 */
class CbExchangeRates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cb_exchange_rates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usd', 'eur', 'nok', 'date'], 'required'],
            [['date'], 'safe'],
            [['usd', 'eur', 'nok'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'usd' => Yii::t('app', 'Usd'),
            'eur' => Yii::t('app', 'Eur'),
            'nok' => Yii::t('app', 'Nok'),
            'date' => Yii::t('app', 'Date'),
        ];
    }
}
