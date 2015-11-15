<?php

use Illuminate\Database\Seeder;
use App\Model\Tag;

class TagTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('tags')->delete();

		$array = array(
			array("顶级标签", 0, 0, 0),
			array("演员", 1),
			array("编导", 1),
			array("摄影", 1),
			array("录音", 1),
			array("后期", 1),
			array("美术", 1),
			array("制片", 1),
			array("场务", 1),
			array("后勤", 1),
			array("活动", 1),
			array("男演员", 2),
			array("女演员", 2),
			array("特约演员", 2),
			array("群演", 2),
			array("主导演", 2),
			array("执行导演", 2),
			array("副导演", 2),
			array("编剧", 2),
			array("主摄影", 4),
			array("跟焦员", 4),
			array("摄影助理", 4),
			array("灯光", 4),
			array("录音师", 5),
			array("收音员", 5),
			array("录音助理", 5),
			array("后期导演", 6),
			array("剪辑", 6),
			array("特效", 6),
			array("配音", 6),
			array("作曲", 6),
			array("美术", 7),
			array("分镜师", 7),
			array("化妆师", 7),
			array("服装师", 7),
			array("制片人", 8),
			array("制片主任", 8),
			array("现场制片", 8),
			array("外联", 8),
			array("生活制片", 8),
			array("制作统筹", 8),
			array("场务", 9),
			array("道具师", 9),
			array("场记", 9),
			array("财务", 9),
			array("场地", 10),
			array("盒饭", 10),
			array("服装", 10),
			array("车辆", 10),
			array("道具", 10),
			array("模特", 11),
			array("观众", 11),
			array("志愿者", 11),
		);
		$count = 1;
		foreach ($array as $item) {
			Tag::create([
				'id' => $count,
				'name' => $item[0],
				'parent' => $item[1],
				'editable' => count($item)>2?$item[2]:1,
				'deletable' => count($item)>3?$item[3]:1,
			]);
			$count += 1;
		}

	}

}