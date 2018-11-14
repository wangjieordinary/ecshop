<?php
///WEBSC在线更新版  禁止倒卖 一经发现停止任何服务
namespace App\Api\Controllers\Wx;

class IndexController extends \App\Api\Controllers\Controller
{
	/** @var IndexService  */
	private $indexService;

	public function __construct(\App\Services\IndexService $indexService)
	{
		$this->indexService = $indexService;
	}

	public function index()
	{
		$banners = $this->indexService->getBanners();
		$data['banner'] = $banners;
		$adsense = $this->indexService->getAdsense();
		$ad = $this->indexService->getAd();
		$data['ad'] = $ad;
		$data['adsense'] = $adsense;
		$goodsList = $this->indexService->bestGoodsList('best');
		$data['goods_list'] = $goodsList;
		$goodsList_new = $this->indexService->bestGoodsList('new');
		$data['goods_list_new'] = $goodsList_new;
		return $this->apiReturn($data);
	}
}

?>
