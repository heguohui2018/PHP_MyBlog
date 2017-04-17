$(document).ready(function(){
    //解决file的change事件只能执行一次的问题
    $(document).on('change','#wechatImgUpload',function(){
        ajaxWeChatImgUpload();

    });
});


//上传微信二维码图片的方法，
function ajaxWeChatImgUpload(){
    //调用ajaxfileupload.js中的方法
    $.ajaxFileUpload({
        url:'/MyBlog/index.php?p=back&c=Uploader&a=uploaderWeChat',//上传图片要提交到的PHP后台Action方法
        secureuri:false,//是否用安全提交，默认为false
        fileElementId:'wechatImgUpload',//file选择文件的框的id
        dataType:'json',//数据返回格式，如果用json，需要修改ajaxfileupload.js中的内容 eval("data = " + data ); -->data = jQuery.parseJSON(jQuery(data).text());
        success: function (data){
            if(data.success){
                //获得json格式数据的值，并转换显示图片在页面上
                 $("#img2").attr("src",data.path);
                 $("#wechatImg").val(data.path);

            }
            showInfo(data.info);
        },
        error: function(data, status, e){   //提交失败自动执行的处理函数
            alert(e);
        }
    });
}


function showInfo(msg) {
    $("#div_info").text(msg);
    $("#modal_info").modal('show');
}