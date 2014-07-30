<?php
//include('connection.php');
//			session_start();
//			if (!isset($_SESSION['uid'])){
//            header('location:login.php');
//}

?>
<?php // include "header.php";?>
<div id="content" class="page">
	<div class="wrapper">
    	<div class="left" style="width:300px;">
    		<div class="profile-tab">
            	<div class="top">
                    <div class="pic">
                        <img width="300px" src="/asset/img/avatar6.jpg" />                    
                    </div>
                    <?php			
						if (!isset($_SESSION['uid'])){?> 
                    		<h4>No Name</h4>
                   		 <?php } else { ?>
							<?php  //mag show sang information sang user nga nag login
							$member_id=$_SESSION['uid'];
							
							$result=mysql_query("select * from ap_user where uid='$member_id'")or die(mysql_error);
							$row=mysql_fetch_array($result);
							
							$fullname=$row['fullname'];
							$poin=$row['poin'];  ?>
                            <h4><?php echo "$fullname"; ?></h4>                         
                        <?php } ?>
                </div>
                <div class="poin">
                	<div class="angka">
                    	<?php			
						if (!isset($_SESSION['uid'])){?> 
                    		<span class="main">0</span>
                   		 <?php } else { ?>
							<?php  //mag show sang information sang user nga nag login
							//$member_id=$_SESSION['uid'];
							
							//$result=mysql_query("select * from ap_user where uid='$member_id'")or die(mysql_error);
							//$row=mysql_fetch_array($result);
							
							?>
                            <span class="main"><?php echo "$poin"; ?></span>                      
                        <?php } ?>                    	
                        <span class="second">Poin</span>                        
                    </div>
                    <p>Lakukan donasi dan volunteering untuk meningkatkan jumlah poin kamu</p>
                    <p></p>
                </div>
            </div><!-- .end .profile-tab-->
        </div>
        <div class="right">
        	<?php
				//if (isset($_GET[action]){
				//}
			?>
        	<ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#buataksi" data-toggle="tab">Buat Aksi</a></li>
              <li><a href="#update" data-toggle="tab">Aksi saya</a></li>
              <li><a href="#update" data-toggle="tab">Aksi yang anda bantu</a></li>
              <li><a href="#volunteer" data-toggle="tab">Follower</a></li>
            </ul>            
            <div class="tab-content">
              <div class="tab-pane active" id="buataksi">
              		<div class="create">
                    	<h3>Pilih Kategori Aksi Sosial</h3>
                        <ul class="category-aksi">
                        	<li class="kesehatan">
                            	<a href="#">
                                	<img src="/asset/images/Kesehatan.png" />
                                    <h4>Kesehatan</h4>
                                </a>
                            </li>
                            <li class="pendidikan">
                            	<a href="#">
                                	<img src="/asset/images/education.png" />
                                    <h4>Pendidikan</h4>
                                </a>
                            </li>
                            <li class="lingkungan">
                            	<a href="#">
                                	<img src="/asset/images/lingkungan.png" />
                                    <h4>Lingkungan</h4>
                                </a>
                            </li>  
                            <div class="clearfix"></div>                      
                        </ul>
                        <div class="formaksi">
                        	<div id="formkesehatan" class="item-form">
                            	<form class="form-horizontal">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Auto complete </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]">
								<p class="help-block">Start typing to activate auto complete!</p>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Date input</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker hasDatepicker" id="date01" value="02/16/12">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">File input</label>
							  <div class="controls">
								<div class="uploader" id="uniform-fileInput"><input class="input-file uniform_on" id="fileInput" type="file"><span class="filename" style="-webkit-user-select: none;">No file selected</span><span class="action" style="-webkit-user-select: none;">Choose File</span></div>
							  </div>
							</div>          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Textarea WYSIWYG</label>
							  <div class="controls">
								<div class="cleditorMain" style="width: 500px; height: 250px;"><div class="cleditorToolbar" style="height: 53px;"><div class="cleditorGroup"><div class="cleditorButton" title="Bold"></div><div class="cleditorButton" title="Italic" style="background-position: -24px 50%;"></div><div class="cleditorButton" title="Underline" style="background-position: -48px 50%;"></div><div class="cleditorButton" title="Strikethrough" style="background-position: -72px 50%;"></div><div class="cleditorButton" title="Subscript" style="background-position: -96px 50%;"></div><div class="cleditorButton" title="Superscript" style="background-position: -120px 50%;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup"><div class="cleditorButton" title="Font" style="background-position: -144px 50%;"></div><div class="cleditorButton" title="Font Size" style="background-position: -168px 50%;"></div><div class="cleditorButton" title="Style" style="background-position: -192px 50%;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup"><div class="cleditorButton" title="Font Color" style="background-position: -216px 50%;"></div><div class="cleditorButton" title="Text Highlight Color" style="background-position: -240px 50%;"></div><div class="cleditorButton cleditorDisabled" title="Remove Formatting" style="background-position: -264px 50%;" disabled="disabled"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup"><div class="cleditorButton" title="Bullets" style="background-position: -288px 50%;"></div><div class="cleditorButton" title="Numbering" style="background-position: -312px 50%;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup"><div class="cleditorButton" title="Outdent" style="background-position: -336px 50%;"></div><div class="cleditorButton" title="Indent" style="background-position: -360px 50%;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup"><div class="cleditorButton" title="Align Text Left" style="background-position: -384px 50%;"></div><div class="cleditorButton" title="Center" style="background-position: -408px 50%;"></div><div class="cleditorButton" title="Align Text Right" style="background-position: -432px 50%;"></div><div class="cleditorButton" title="Justify" style="background-position: -456px 50%;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup"><div class="cleditorButton cleditorDisabled" title="Undo" style="background-position: -480px 50%;" disabled="disabled"></div><div class="cleditorButton cleditorDisabled" title="Redo" style="background-position: -504px 50%;" disabled="disabled"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup"><div class="cleditorButton" title="Insert Horizontal Rule" style="background-position: -528px 50%;"></div><div class="cleditorButton" title="Insert Image" style="background-position: -552px 50%;"></div><div class="cleditorButton" title="Insert Hyperlink" style="background-position: -576px 50%;"></div><div class="cleditorButton cleditorDisabled" title="Remove Hyperlink" style="background-position: -600px 50%;" disabled="disabled"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup"><div class="cleditorButton cleditorDisabled" title="Cut" style="background-position: -624px 50%;" disabled="disabled"></div><div class="cleditorButton cleditorDisabled" title="Copy" style="background-position: -648px 50%;" disabled="disabled"></div><div class="cleditorButton cleditorDisabled" title="Paste" style="background-position: -672px 50%;" disabled="disabled"></div><div class="cleditorButton" title="Paste as Text" style="background-position: -696px 50%;"></div><div class="cleditorDivider"></div></div><div class="cleditorGroup"><div class="cleditorButton" title="Print" style="background-position: -720px 50%;"></div><div class="cleditorButton" title="Show Source" style="background-position: -744px 50%;"></div></div></div><textarea class="cleditor" id="textarea2" rows="3" style="display: none; width: 500px; height: 197px;"></textarea><iframe frameborder="0" src="javascript:true;" style="width: 500px; height: 197px;"></iframe></div>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>    
                            </div><!--end .formkesehatan-->
                        </div>
                    </div>
              </div>
              <div class="tab-pane fade" id="update">Update Aksi</div>
              <div class="tab-pane fade" id="datadonasi">
              		<table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Donatur</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Rp.200.000</td>
                        <td>21/09/2013</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Rp.450.000</td>
                        <td>30/11/2013</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Steve</td>
                        <td>Rp.450.000</td>
                        <td>30/11/2013</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <div class="tab-pane fade" id="volunteer">
              		<div class="gabung" style="margin:12px;">
              			<a href="#" class="btn btn-primary">Gabung jadi volunteer</a>
                    </div>
              		<div class="item-volunteer">
                    	<div class="pic">
                        	<a href="#"></a><img src="/asset/img/avatar.jpg" />
                        </div>
                        <h4 class="name"><a href="#">Hans Prayipta</a></h4>
                    </div><!--end .item-volunteer-->
                    <div class="item-volunteer">
                    	<div class="pic">
                        	<a href="#"></a><img src="/asset/img/gallery/photo1.jpg" />
                        </div>
                        <h4 class="name"><a href="#">Susanti</a></h4>
                    </div><!--end .item-volunteer-->
                    <div class="item-volunteer">
                    	<div class="pic">
                        	<a href="#"></a><img src="/asset/img/gallery/photo5.jpg" />
                        </div>
                        <h4 class="name"><a href="#">Jaenal gufron</a></h4>
                    </div><!--end .item-volunteer-->
                    <div class="item-volunteer">
                    	<div class="pic">
                        	<a href="#"></a><img src="/asset/img/avatar9.jpg" />
                        </div>
                        <h4 class="name"><a href="#">Darren</a></h4>
                    </div><!--end .item-volunteer-->
                    <div class="item-volunteer">
                    	<div class="pic">
                        	<a href="#"></a><img src="/asset/img/avatar.jpg" />
                        </div>
                        <h4 class="name"><a href="#">Simmons</a></h4>
                    </div><!--end .item-volunteer-->
                    <div class="item-volunteer">
                    	<div class="pic">
                        	<a href="#"></a><img src="/asset/img/avatar9.jpg" />
                        </div>
                        <h4 class="name"><a href="#">Abdul</a></h4>
                    </div><!--end .item-volunteer-->
                    
                    <div class="clearfix"></div>
              </div>
              <div class="tab-pane fade" id="donasi">
              		<h3>Silahkan isikan form donasi anda</h3>
                    <form class="form-horizontal donasi" role="form">
                    	<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Panggilan</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Donasi</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Pilih Donasi</label>
                            <div class="col-sm-10">
                                 <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                    Saya hanya akan donasi untuk Aksi ini
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                    Saya akan menambahkan 10% donasi untuk operational cost ayopeduli.com
                                  </label>
                                </div>
                            </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Remember me
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Sign in</button>
                        </div>
                      </div>
                    </form>
              </div>
            </div>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
			<script type="text/javascript" src="js/tab.js"></script>
            <script>
              $(function () {
                $('#myTab a:first').tab('show')
              })
            </script>
        </div>        
        <div class="clearfix"></div>
    </div><!--end .wrapper-->
</div><!-- end #content-->