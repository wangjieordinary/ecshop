<?php
//zend websc在线更新版  禁止倒卖 一经发现停止任何服务
namespace App\Contracts\Services;

interface BrandServiceInterface
{
	public function create();

	public function get();

	public function update();

	public function delete();

	public function search();
}


?>
