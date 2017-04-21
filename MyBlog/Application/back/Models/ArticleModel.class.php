<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:42
 */

class ArticleModel extends BaseModel {

    /**
     * 根据ID得到指定文章
     * @param $aid
     * @return bool|mixed
     */
    public function getArticleById($aid){
        $sql = "SELECT tb_article.aid,tb_article.mid,tb_article.page_view,tb_article.img,tb_article.like_num,
                tb_article.tid,tb_article.atitle,tb_article.acontent,tb_article.atime,tb_myinfo.mname,tb_type.tname
                FROM tb_article,tb_type,tb_myinfo 
                WHERE tb_myinfo.mid = tb_article.mid 
                AND tb_article.tid = tb_type.tid AND tb_article.aid= ?";
        $stmt = $this->_dao->prepare($sql);
        if(!empty($aid)){
            $stmt->bindValue(1,$aid);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        return false;
    }


    /**
     * 得到所有的文章
     * @return array
     */
    public function getAllArticles(){
        $sql = "SELECT * FROM tb_article";
        $stmt = $this->_dao->query($sql);
        $arr = array();
        while (  $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
            $result['acontent'] = urldecode($result['acontent']);   //URL解码，解出来是带有样式的html文本
            //strip_tags — 从字符串中去除 HTML 和 PHP 标记
            $result['content'] = strip_tags($result['acontent']);   //得到存文本的内容
            $arr[] = $result;
        }
        return $arr;
    }

    public function addBlog($title,$type,$content,$img){
        //获得当前时间 2017-4-20 00:00:00
        date_default_timezone_set('Asia/Shanghai');//设置时区
        $date = @date("Y-m-d H:i:s");//H大写H表示24小时制
        $sql = "INSERT INTO tb_article(mid, tid, atitle, acontent, atime,img) VALUES (1,?,?,?,?,?)";
        $stmt = $this->_dao->prepare($sql);
        if(!empty($title) && !empty($type) && !empty($content)){
            $stmt->bindValue(1,$type);
            $stmt->bindValue(2,$title);
            $stmt->bindValue(3,$content);
            $stmt->bindValue(4,$date);
            $stmt->bindValue(5,$img);
            $result = $stmt->execute();
            return $result;
        }
    }


    public function getLimitArticles($pageCode,$pageSize){
        $page = ($pageCode - 1) * $pageSize;
        $sql = "SELECT tb_article.aid,tb_article.mid,tb_article.page_view,tb_article.img,tb_article.like_num,
                tb_article.tid,tb_article.atitle,tb_article.acontent,tb_article.atime,tb_myinfo.mname,tb_type.tname
                FROM tb_article,tb_type,tb_myinfo 
                WHERE tb_myinfo.mid = tb_article.mid 
                and tb_article.tid = tb_type.tid 
                limit $page,$pageSize";
        $stmt = $this->_dao->query($sql);
        $arr = array();
        if(!empty($pageCode) && !empty($pageSize)){
            while (  $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
                $result['acontent'] = urldecode($result['acontent']);   //URL解码，解出来是带有样式的html文本
                //strip_tags — 从字符串中去除 HTML 和 PHP 标记
                $result['content'] = strip_tags($result['acontent']);   //得到存文本的内容
                $arr[] = $result;
            }
            $pageBean = array();   //装载分页信息
            //获取总记录数
            $sql = "SELECT count(*) FROM tb_article";
            $stmt = $this->_dao->query($sql);
            $pageBean['totalRecord'] = $stmt->fetchColumn();//得到总记录数
            $tp =  (int)($pageBean['totalRecord'] / $pageSize);
            $pageBean['totaPage'] = $pageBean['totalRecord']  % $pageSize == 0 ? $tp : $tp + 1;  //得到总页数
            $pageBean['pageCode'] = $pageCode; //当前页码
            $pageBean['pageSize'] = $pageSize; //每页记录数
            $pageBean['url'] = "p=back&c=Article&a=getLimitBlogs";
            $arr['pageBean'] = $pageBean;
        }
        return $arr;
    }
}