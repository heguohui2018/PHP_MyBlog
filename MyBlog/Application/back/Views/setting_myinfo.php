<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>123</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/MyBlog/css/bootstrap.min.css">
<link rel="stylesheet" href="/MyBlog/css/bootstrap-theme.min.css">
<script src="/MyBlog/js/bootstrap.min.js"></script>
<script src="/MyBlog/jQuery/jquery-3.1.1.min.js"></script>
<script src="/MyBlog/js/bootstrap-dropdown.min.js"></script>

<script src="/MyBlog/js/jquery.min.js"></script>
<script src="/MyBlog/js/bootstrap.min.js"></script>
</head>



                                      
                               <form class="form-horizontal">   <!--保证样式水平不混乱-->   
							
										<div class="form-group">	
											<label for="firstname" class="col-sm-2 control-label">头像</label>
											<div class="col-sm-2">
											 <label for="inputfile"></label>
										     <!--为了jquery获得basePath的值，必须写（如果没有更好的办法） -->
											<input type="hidden" value="<%=basePath%>" id="updateBasePath2"/>
											<input type="hidden" id="updateImg"/>
											<!--id是给jquery使用的，name是给后台action使用的，必须和后台的名字相同！！ -->
											<input type="file" id="updateUpload" name="upload"/><br/>
											<label class="control-label" for="updateUpload" style="display: none;"></label>	
										    <p class="help-block"><img class="img-rounded" src="#" width="100" height="100" id="img2" alt="请上传头像"  /></p>
											</div>
										</div>
										
							
				
										<div class="form-group">	
											<label for="firstname" class="col-sm-2 control-label">QQ</label>
												<div class="col-sm-2">
													<input type="hidden" id="updateId">
													<input type="text" class="form-control" id="updateName" placeholder="请输入QQ号码">
												<label class="control-label" for="updateName" style="display: none;"></label>	
												</div>
										</div>
											
										
										<div class="form-group">	
											<label for="firstname" class="col-sm-2 control-label">Email</label>
											<div class="col-sm-2">
													<input type="text" class="form-control" id="updateName2" placeholder="请输入Email地址">
													<label class="control-label" for="updateDesc" style="display: none;"></label>	
											</div>
										</div>
										
										
										<div class="form-group">	
											<label for="firstname" class="col-sm-2 control-label">微信二维码</label>
											<div class="col-sm-2">
											 <label for="inputfile"></label>
										     <!--为了jquery获得basePath的值，必须写（如果没有更好的办法） -->
											<input type="hidden" value="<%=basePath%>" id="updateBasePath3"/>
											<input type="hidden" id="updateImg2"/>
											<!--id是给jquery使用的，name是给后台action使用的，必须和后台的名字相同！！ -->
											<input type="file" id="updateUpload3" name="upload3"/><br/>
											<label class="control-label" for="updateUpload" style="display: none;"></label>	
										    <p class="help-block"><img class="img-rounded" src="#" width="100" height="100" id="img122" alt="请上传微信二维码"  /></p>
											</div>
										</div>
										
									
															
									
											<div class="form-group">
											<label for="firstname" class="col-sm-2 control-label"></label>
												<div class="col-sm-2">
													<button type="button" class="btn btn-danger" id="updateProductInfo">
														修改
													</button>
												</div>
											</div>
								
	
                                 </form>
                              

<body>
</body>
</html>