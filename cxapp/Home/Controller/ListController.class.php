<?php

/**
 * 文章列表
 */

namespace Home\Controller;

class ListController extends \Home\Controller\HomeController {

	//文章内页
	public function index() {
		$term = sp_get_term(I('get.id'));
		$tplname = empty($term['list_tpl']) ? 'default' : $term['list_tpl'];
		$this->assign($term);
		$this->assign('cat_id', intval($_GET['id']));
		$this->display('list:' . $tplname);
	}

	public function nav_index() {
		$navcatname = "文章分类";
		$datas = sp_get_terms("field:term_id,name");
		$navrule = array(
			"action" => "List/index",
			"param"	 => array(
				"id" => "term_id"
			),
			"label"	 => "name");
		echo sp_get_nav4admin($navcatname, $datas, $navrule);
	}

	public function test() {
		print_r($_GET);
	}

}
