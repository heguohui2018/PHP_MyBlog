<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:50
 */

class ArticleController extends BaseController {

    public function getLimitBlogsAction(){
        $pageCode = @$_GET['pageCode'];
        // 获取页面传递过来的当前页码数
        if (empty($pageCode)) {
            $pageCode = 1;
        }
        $pageSize = 3;
        $articleModel = ModelFactory::getModel("ArticleModel");
        $result = $articleModel->getLimitArticles($pageCode,$pageSize);
        //echo json_encode($result);
        require VIEW_PATH."blog_content.php";
    }

    public function getBlogByIdAction(){
        $aid = @$_GET['id'];
        $articleModel = ModelFactory::getModel("ArticleModel");
        $result = $articleModel->getArticleById($aid);
        $result['acontent'] = urldecode($result['acontent']);
        echo json_encode($result);
        //   require VIEW_PATH."blog_detail_content.php";
    }
}