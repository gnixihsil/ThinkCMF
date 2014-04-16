<?php

/**
 * 幻灯片分类管理
 * 
 * @author Anyon <cxphp@qq.com>
 * @date 2014/04/06 20:08
 */

namespace Admin\Controller;

class SlidecatController extends \Admin\Controller\AdminController {

	protected $slidecat_obj;

	function _initialize() {
		parent::_initialize();
		$this->slidecat_obj = D("SlideCat");
	}

	function index() {
		$cats = $this->slidecat_obj->where("cat_status!=0")->select();
		$this->assign("slidecats", $cats);
		$this->display($this->getLowerTplName());
	}

	/**
	 *  添加
	 */
	public function add() {
		if (IS_POST) {
			if ($this->slidecat_obj->create()) {
				if ($this->slidecat_obj->add()) {
					$this->success("添加成功！", U("slidecat/index"));
				} else {
					$this->error("添加失败！");
				}
			} else {
				$this->error($this->slidecat_obj->getError());
			}
		} else {
			$this->display($this->getLowerTplName('info'));
		}
	}

	function edit() {
		if (IS_POST) {
			if ($this->slidecat_obj->create()) {
				if (FALSE !== $this->slidecat_obj->save()) {
					$this->success("保存成功！", U("slidecat/index"));
				} else {
					$this->error("保存失败！");
				}
			} else {
				$this->error($this->slidecat_obj->getError());
			}
		} else {
			$id = I("get.id");
			$slidecat = $this->slidecat_obj->where("cid=$id")->find();
			$this->assign($slidecat);
			$this->display($this->getLowerTplName('info'));
		}
	}

}
