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
			array("演员", 0),
			array("编导", 0),
			array("摄影", 0),
			array("录音", 0),
			array("后期", 0),
			array("美术", 0),
			array("制片", 0),
			array("场务", 0),
			array("后勤", 0),
			array("活动", 0),
			array("男演员", 1),
			array("女演员", 1),
			array("特约演员", 1),
			array("群演", 1),
			array("主导演", 2),
			array("执行导演", 2),
			array("副导演", 2),
			array("编剧", 2),
			array("主摄影", 3),
			array("跟焦员", 3),
			array("摄影助理", 3),
			array("灯光", 3),
			array("录音师", 4),
			array("收音员", 4),
			array("录音助理", 4),
			array("后期导演", 5),
			array("剪辑", 5),
			array("特效", 5),
			array("配音", 5),
			array("作曲", 5),
			array("美术", 6),
			array("分镜师", 6),
			array("化妆师", 6),
			array("服装师", 6),
			array("制片人", 7),
			array("制片主任", 7),
			array("现场制片", 7),
			array("外联", 7),
			array("生活制片", 7),
			array("制作统筹", 7),
			array("场务", 8),
			array("道具师", 8),
			array("场记", 8),
			array("财务", 8),
			array("场地", 9),
			array("盒饭", 9),
			array("服装", 9),
			array("车辆", 9),
			array("道具", 9),
			array("模特", 10),
			array("观众", 10),
			array("志愿者", 10),
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