<?php

/**
 * 首页
 */

namespace Home\Controller;

class IndexController extends \Home\Controller\HomeController {

	//首页
	public function index() {
		$this->display("index:index");
	}

}
