<?php
namespace frontend\modules\api;

use yii\base\Module;

/**
 * api module definition class
 */
class Api extends Module
{
	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'frontend\modules\api\controllers';

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();
	}
}
