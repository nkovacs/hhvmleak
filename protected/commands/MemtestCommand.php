<?php

class MemtestCommand extends CConsoleCommand
{
	private function test()
	{
		$users = TestModel::model()->findAll();
	}

	public function actionIndex()
	{
		ini_set('memory_limit','10M');

		//echo "Mem before: " . memory_get_usage() . "\n";

		for ($i=0; $i<10000; $i++) {
			$this->test();
			Yii::getLogger()->flush();
			echo "Mem after $i: " . memory_get_usage() . "\n";
			//echo "Cycles collected $i: " .gc_collect_cycles() . "\n";
			//echo "Mem after collection $i: " . memory_get_usage() . "\n";
		}
	}
}
