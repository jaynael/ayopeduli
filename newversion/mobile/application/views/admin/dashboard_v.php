<div id="content" class="page">
	<div class="wrapper">
    	<div class="right" style="width:100%;">
        	<?php if (!isset($error)){
                            echo "";
                            }else{?>
                                <div class="alert alert-danger"><?php echo $error?></div>
             <?php }?>
             <?php if (!isset($success)){
                            echo "";
                            }else{?>
                                <div class="alert alert-success"><?php echo $success?></div>
             <?php }?>
        	<ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#update" data-toggle="tab">Aksi Baru</a>
              <?php 
			  $count = count($aksi);
			  if ($count==0){ ?>
              <?php } else { ?> 
              <span class="badge pull-right" style="position: absolute;top: -8px;left: 70px;"><?php echo count($aksi)?></span>              
              <?php } ?>
              </li>              
              <li><a href="#history" data-toggle="tab">Donasi Baru</a>
              <?php 
			  $count2 = count($aksi_donasi_all);
			  if ( $count2 == 0){ ?>
              <?php } else { ?> 
              <span class="badge pull-right" style="position: absolute;top: -8px;left: 70px;"><?php echo count($aksi_donasi_all)?></span>
              <?php } ?></li>
              
              </li>
               <li><a href="#app" data-toggle="tab">Donasi Approve</a><span class="badge pull-right" style="position: absolute;top: -8px;left: 70px;"><?php echo count($donasi_approve)?></span></li>
              <li><a href="#product" data-toggle="tab">Add Product</a></li>
              <li><a href="#redeem" data-toggle="tab">Add partner</a></li>
            </ul>            
            <div class="tab-content">
              
              <div class="tab-pane active" id="update">
              		<div class="aksi-landscape">
                    <?php for ($i=0;$i<count($aksi);$i++){ ?>
                    	<div class="item-aksi">
                            <div class="image">
                                <img src="/upload/aksi/<?php echo $aksi[$i]['pic'] ?>" />
                            </div>
                            <div class="addon" style="float:left;">
                            	<a href="/atur/adddonasi/<?php echo $aksi[$i]['aid'] ?>"> Tambahkan manual donasi</a>
                            </div>
                            <div class="desc-left">
                                <div class="title">
                                    <h2><?php echo $aksi[$i]['judul'] ?></h2>            
                                </div>
                                <div class="desc">
                                    <div class="desc-top">
										<?php 
                                         $target_k = $aksi[$i]['jumlahtarget'];
                                         $terkumpul_k = $aksi[$i]['jumlahterkumpul'];
                                         $progress_k = $terkumpul_k/$target_k * '100';
                                        ?>
                                        <div class="text">Target Donasi</div>
                                        <div class="info target" style="float:right;">
                                            <p>Rp.<?php echo number_format("$target_k") ?></p>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89"><div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: <?php echo "$progress_k"; ?>%;"></div></div>
                                        <div class="info terkumpul" style="float:left;">
                                            <p>Rp.<?php echo number_format("$terkumpul_k") ?></p>
                                        </div>
                                        <div class="text terkumpul"><?php echo intval($progress_k) ?>%Donasi Terkumpul</div>
                                        <div class="clearfix"></div>
                                    </div><!--end .desc-top-->
                                    <div class="desc-bottom">
                                        <?php 
											$date = strtotime($aksi[$i]['tgl']);
											$remaining = $date - time();
											$days_remaining = floor($remaining / 86400);
										?>
										<a href="/aksi/view/<?php echo $aksi[$i]['slug'] ?>/#donasi"><h4><?php echo $days_remaining ?> Hari lagi Aksi Berakhir</h4></a>
                                    </div>
                                    <div class="desc-bottom">
                                    <?php if ($aksi[$i]['verified'] == '0' ) {?>
                                        <a href="/atur/viewaksi/<?php echo $aksi[$i]['slug'] ?>"><h4>Validasi Aksi Ini</h4></a>
                                    <?php }else{ ?>
                                       	<h4>Sudah di validasi</h4>
                                    <?php } ?>
                                    </div>                                                     
                                </div><!-- .desc-->  
                            </div>         
                        </div><!--end .item-aksi-->
                        
                        <?php } ?>
                        
                        <div class="clearfix"></div>                 	
                    </div> <!--end .item aksi-landscape-->                    
              </div>
              <div class="tab-pane fade" id="history">
              		<div class="row" >                      
                      <div class="col-lg-6" style="float:right;margin:10px 0px 20px;">
                        <div class="input-group">
                          <input type="text" style="height:34px;" class="form-control">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Cari !</button>
                          </span>
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                      <div class="clearfix"></div>
                    </div><!-- /.row -->              		
                    <script type="text/javascript">
						$(function(){
							$(".repdon").each(function () {
							var $this = $(this).find('.approve');
							var $target = $(this).find('.did');
							var $poin = $(this).find('.poin');
							var $uid = $(this).find('.uid');
							var $aid = $(this).find('.aid');
							var $totaldon = $(this).find('.totaldon');
							var $parent = $this.parent();
							$this.click(function () {
								//alert($totaldon.val());
								$('#loading').show();
								var did = $target.val();
								var totaldon = $totaldon.val();
								var poin = $poin.val();
								var uid = $uid.val();
								var aid = $aid.val();																
								$.post('/donasi/update',{action: "update", did:did, poin:poin, uid:uid, aid:aid, totaldon:totaldon},function(res){
								$('#result').html(res);								
							});
							//});
					 
							//show records
							$('#show').click(function(){
								$.post('/donasi/update',{action: "show"},function(res){
									$('#result').html(res);
								});        
							});
							$(this).hide();
						});
													
							
					});
				});
					</script>
                    <div id="result"></div> 
                    <table class="table table-hover">
                    <thead>
                      <tr>
                      	<th>Donasi ID</th>
                        <th>Dari</th>
                        <th>User ID</th>
                        <th>Untuk</th>
                        <th>donasi aksi</th>
                        <th>donasi ap</th>
                        <th>Total Donasi</th>
                        <th>Tanggal</th>
                        <th>Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
					  for ($i=0;$i<count($aksi_donasi_all);$i++){
						// var_dump("$i=0;$i<count($aksi_donasi_all);$i++"); ?>
                      <tr class="repdon">
                      	<td><?php echo $aksi_donasi_all[$i]['did'] ?><input type="hidden" name="did" id="did" class="did" value="<?php echo $aksi_donasi_all[$i]['did'] ?>" />
                        <input type="hidden" name="poin" id="poin" class="poin" value="<?php echo $aksi_donasi_all[$i]['poin'] ?>" />
                        <input type="hidden" name="uid" id="uid" class="uid" value="<?php echo $aksi_donasi_all[$i]['uid'] ?>" />
                        <input type="hidden" name="aid" id="aid" class="aid" value="<?php echo $aksi_donasi_all[$i]['aid'] ?>" />
                        </td>
                        <td><?php echo $aksi_donasi_all[$i]['donatur'] ?></td>
                        <td><?php echo $aksi_donasi_all[$i]['uid'] ?></td>
                        <td><?php echo $aksi_donasi_all[$i]['namaaksi'] ?></td>
                        <td>Rp.<?php echo number_format($aksi_donasi_all[$i]['donasi_aksi']) ?></td>
                        <td>Rp.<?php echo number_format($aksi_donasi_all[$i]['donasi_ap']) ?></td>
                        <td>Rp.<?php echo number_format($aksi_donasi_all[$i]['totaldon']) ?><input type="hidden" class="totaldon" name="totaldon" id="totaldon" value="<?php echo $aksi_donasi_all[$i]['donasi_aksi'] ?>" /></td>
                        <td><?php echo $aksi_donasi_all[$i]['time1'] ?></td>
                        <td><a href="#" id="approve" class="btn approve btn-primary">Approve</a></td>
                      </tr>  
                      <p><?php // echo $links; ?></p>                    
                      <?php } ?>
                      <!--<tr>
                        <td>Samsul</td>
                        <td>Zildam Penderita Celebral Palsy</td>
                        <td>Rp.450.000</td>
                        <td>30/11/2013</td>
                        <td><a href="#" id="approve" class="btn btn-primary">Approve</a></td>
                      </tr>
                      <tr>
                        <td>Soleh</td>
                        <td>Hanna Penderita Leukimia</td>
                        <td>Rp.450.000</td>
                        <td>30/11/2013</td>
                        <td><a href="#" id="approve" class="btn btn-primary">Approve</a></td>
                      </tr>-->
                    </tbody>
                  </table>
              </div>
              <div class="tab-pane fade" id="app">
              		<div class="row" >                      
                      <div class="col-lg-6" style="float:right;margin:10px 0px 20px;">
                        <div class="input-group">
                          <input type="text" style="height:34px;" class="form-control">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Cari !</button>
                          </span>
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                      <div class="clearfix"></div>
                    </div><!-- /.row -->              		
                    <script type="text/javascript">
						$(function(){
							$(".appdon").each(function () {
							var $this = $(this).find('.cancel');
							var $target = $(this).find('.did');
							var $poin = $(this).find('.poin');
							var $uid = $(this).find('.uid');
							var $aid = $(this).find('.aid');
							var $totaldon = $(this).find('.totaldon');
							var $parent = $this.parent();
							$this.click(function () {
								//alert($totaldon.val());
								$('#loading').show();
								var did = $target.val();
								var totaldon = $totaldon.val();
								var poin = $poin.val();
								var uid = $uid.val();
								var aid = $aid.val();																
								$.post('/donasi/cancel',{action: "update", did:did, poin:poin, uid:uid, aid:aid, totaldon:totaldon},function(res){
								$('#result2').html(res);								
							});
							//});
					 
							//show records
							$('#show').click(function(){
								$.post('/donasi/cancel',{action: "show"},function(res){
									$('#result2').html(res);
								});        
							});
							$(this).hide();
						});
													
							
					});
				});
					</script>
                    <div id="result2"></div> 
                    <table class="table table-hover">
                    <thead>
                      <tr>
                      	<th>Donasi ID</th>
                        <th>Dari</th>
                        <th>Untuk</th>
                        <th>donasi aksi</th>
                        <th>donasi ap</th>
                        <th>Total Donasi</th>
                        <th>Tanggal</th>
                        <th>Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
					  for ($i=0;$i<count($donasi_approve);$i++){
						// var_dump("$i=0;$i<count($aksi_donasi_all);$i++"); ?>
                      <tr class="appdon">
                      	<td><?php echo $donasi_approve[$i]['did'] ?><input type="hidden" name="did" id="did" class="did" value="<?php echo $donasi_approve[$i]['did'] ?>" />
                        <input type="hidden" name="poin" id="poin" class="poin" value="<?php echo $donasi_approve[$i]['poin'] ?>" />
                        <input type="hidden" name="uid" id="uid" class="uid" value="<?php echo $donasi_approve[$i]['uid'] ?>" />
                        <input type="hidden" name="aid" id="aid" class="aid" value="<?php echo $donasi_approve[$i]['aid'] ?>" />
                        </td>
                        <td><?php echo $donasi_approve[$i]['donatur'] ?></td>
                        <td><?php echo $donasi_approve[$i]['namaaksi'] ?></td>
                        <td>Rp.<?php echo number_format($donasi_approve[$i]['donasi_aksi']) ?></td>
                        <td>Rp.<?php echo number_format($donasi_approve[$i]['donasi_ap']) ?></td>
                        <td>Rp.<?php echo number_format($donasi_approve[$i]['totaldon']) ?><input type="hidden" class="totaldon" name="totaldon" id="totaldon" value="<?php echo $donasi_approve[$i]['donasi_aksi'] ?>" /></td>
                        <td><?php echo $donasi_approve[$i]['time1'] ?></td>
                        <td><a href="#" id="approve" class="btn cancel btn-danger">Cancel</a></td>
                      </tr>  
                      <p><?php // echo $links; ?></p>                    
                      <?php } ?>
                      <!--<tr>
                        <td>Samsul</td>
                        <td>Zildam Penderita Celebral Palsy</td>
                        <td>Rp.450.000</td>
                        <td>30/11/2013</td>
                        <td><a href="#" id="approve" class="btn btn-primary">Approve</a></td>
                      </tr>
                      <tr>
                        <td>Soleh</td>
                        <td>Hanna Penderita Leukimia</td>
                        <td>Rp.450.000</td>
                        <td>30/11/2013</td>
                        <td><a href="#" id="approve" class="btn btn-primary">Approve</a></td>
                      </tr>-->
                    </tbody>
                  </table>
              </div>
              <div class="tab-pane fade volunteer" id="product">              		
              		<script type="text/JavaScript">
						$(document).ready(function() { 
						
						
							$('#submit').click(function(e){
							
								// Declare the function variables:
								// Parent form, form URL, email regex and the error HTML
								var $formId = $(this).parents('form');
								var formAction = $formId.attr('action');
								var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
								var $error = $('<span class="error"></span>');
						
								// Prepare the form for validation - remove previous errors
								$('li',$formId).removeClass('error');
								$('span.error').remove();
						
								// Validate all inputs with the class "required"
								$('.required',$formId).each(function(){
									var inputVal = $(this).val();
									var $parentTag = $(this).parent();
									if(inputVal == ''){
										$parentTag.addClass('error').append($error.clone().text('Required Field'));
									}
									
									// Run the email validation using the regex for those input items also having class "email"
									if($(this).hasClass('email') == true){
										if(!emailReg.test(inputVal)){
											$parentTag.addClass('error').append($error.clone().text('Enter valid email'));
										}
									}
									
									// Check passwords match for inputs with class "password"
									if($(this).hasClass('password') == true){
										var password1 = $('#password-1').val();
										var password2 = $('#password-2').val();
										if(password1 != password2){
										$parentTag.addClass('error').append($error.clone().text('Passwords must match'));
										}
									}
								});
						
								// All validation complete - Check if any errors exist
								// If has errors
								if ($('span.error').length > 0) {
									
									$('span.error').each(function(){
										
										// Set the distance for the error animation
										var distance = 5;
										
										// Get the error dimensions
										var width = $(this).outerWidth();
										
										// Calculate starting position
										var start = width + distance;
										
										// Set the initial CSS
										$(this).show().css({
											display: 'block',
											opacity: 0,
											right: -start+'px'
										})
										// Animate the error message
										.animate({
											right: -width+'px',
											opacity: 1
										}, 'slow');
										
									});
								} else {
									$formId.submit();
								}
								// Prevent form submission
									e.preventDefault();
							});
							
							// Fade out error message when input field gains focus
							$('.required').focus(function(){
								var $parent = $(this).parent();
								$parent.removeClass('error');
								$('span.error',$parent).fadeOut();
							});
							$('#left').affix({
											offset: {
											  top: 250
											, bottom: function () {
												return (this.bottom = $('.bs-footer').outerHeight(true))
											  }
											}
										  })
						});
						</script>
						<style type="text/css">
						/* Tutorial CSS */
						/*Form styles*/
						.styled {
						}
						.styled fieldset { 
						padding: 0 25px 20px 25px; 
						position: relative;
						}
						.styled fieldset h3 { 
						color: #555;
						margin-bottom: 0.5em;
						}
						/* Form rows */
						.styled .inp {
						position: relative;
						}
						.styled label {
						display: block; 
						font-weight: bold; 
						line-height: 24px; 
						padding-top: 4px; 
						color: #555;
						}
						.styled label.double {
						padding-top: 0; 
						line-height: 20px; 
						margin-top: -3px;
						}
						.styled fieldset li.button-row {
						margin-bottom: 0; 
						padding: 5px 0 0; 
						text-align: right;
						}
						/* Text input styles */
						/* Default */
						.styled input.text-input {
						height: 22px;
						width: 254px;
						padding: 5px 8px; 
						background: url(images/bg_input.png) no-repeat 0 0;  
						border: none;   
						font: normal 15px Arial, sans-serif;
						color: #333;
						line-height: 1em;
						}
							/* Form Validation */
						.styled span.error {
							font: bold 11px Arial, sans-serif;
							color:#fff;
							text-shadow: 1px 1px 1px #000;
							display: none; 
							background: url(/asset/images/arrow_error.png) no-repeat 0 center; 
							height: 11px;
							padding: 7px 15px 20px 20px; 
							line-height: 1em; 
							position: absolute; 
							top: 3px; 
							right: 0; 
							border-right: 1px solid #6c0202;
						}
						.styled fieldset li.error input.text-input {
						background-position: 0 -64px;
						}
						</style>
                        <script src="/asset/ckeditor/ckeditor.js"></script>
						<script>
                            // Remove advanced tabs for all editors.
                            CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
                            CKEDITOR.replace( 'desk' );
                        </script>
                        <div class="content-category" style="float:none; margin:15px auto 10px; text-align:center;">
                            <div class="title">
                                <h2 style="font-weight:normal;margin:15px 0px;">Tambahkan Produk Untuk di Redeem</h2>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- end.content-category-->
                        <div class="item-aksi" style="width: auto;float: none;margin: 0px auto 20px;padding: 20px;height: auto;overflow:inherit;">            
                            <div class="register styled">                            
                                <?php echo validation_errors(); ?>
                                    <?php echo form_open_multipart('partner/new_product'); ?>
                                    <!--<div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>-->
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Partner :</label>
                                    <div class="inp">
                                        <input type="text" name="namapartner" class="form-control required" id="namapartner" placeholder="Nama Partner" value="<?php if (!isset($namapartner)){}else { echo $namapartner ; } ?>">
                                    </div>
                                  </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Nama  Product :</label>
                                    <div class="inp">
                                        <input type="text" name="product" class="form-control required" id="product" placeholder="Nama Product" value="<?php  if (!isset($product)){}else { echo $product ; } ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Jumlah Poin :</label>
                                    <div class="inp">
                                        <input type="text" name="poin" class="form-control required" id="poin" placeholder="Masukan harga redeem poin" value="<?php if (!isset($poin)){}else { echo $poin ; } ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Jumlah Tersedia :</label>
                                    <div class="inp">
                                        <input type="text" name="tersedia" class="form-control required" id="tersedia" placeholder="Jumlah Voucher" value="<?php if (!isset($tersedia)){}else { echo $tersedia ; } ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputFile">Pic Promosi</label>
                                    <div id='imageloadbutton' class="inp">                        
                                    <input type="file" name="photoimg" id="photoimg" class="form-control required" />
                                    
                                    </div>
                                  </div>                      
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Deskripsi :</label>
                                    <div class="inp">
                                        <textarea name="desk" id="desk"><?php if (!isset($desk)){}else{ echo $desk ; } ?></textarea>
                                    </div>
                                    <script>
						// Remove advanced tabs for all editors.
						//CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
						CKEDITOR.replace( 'desk' );
						CKEDITOR.plugins.add('ajaxsave',
						{
							init: function(editor)
							{
								var pluginName = 'ajaxsave';
								editor.addCommand( pluginName,
								{
									exec : function( editor )
									{
										$.post("result.php", {
											data : editor.getSnapshot()
										} );
									},
									canUndo : true
								});
								editor.ui.addButton('Ajaxsave',
								{
									label: 'Save Ajax',
									command: pluginName,
									className : 'cke_button_save'
								});
							}
						});
					</script>
                                  </div>
                                    
                                  <div class="form-group">                    
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Gabung sekarang</button>
                                  </div>
                               </form>
                            </div>
                        </div><!--end .item-aksi-->
              </div>
              <div class="tab-pane fade volunteer" id="redeem">              		
                    <h3>Daftar Partner :</h3>
                    <form name="redeem">
                    <?php
					  for ($i=0;$i<count($productis);$i++){
						// var_dump("$i=0;$i<count($aksi_donasi_all);$i++"); ?>
                        <div class="item-volunteer redeem">
                        	<input type="radio" class="radio" name="item" value="<?php echo $productis[$i]['poin'] ?>" />
                        	<span class="jumpoin btn btn-primary"><?php echo $productis[$i]['poin'] ?> Poin</span>
                            <div class="pic">
                                <a href="#"></a><img src="/upload/product/<?php echo $productis[$i]['pic'] ?>" />
                            </div>
                            <h4 class="name"><a href="#"><?php echo $productis[$i]['namapartner'] ?></a></h4>
                        </div><!--end .item-volunteer-->                        
                       <?php } ?>
                        
                    </form>
                    <div class="clearfix"></div>
                    <div class="keterangan" style="margin:20px 0px 0px;">
                    	<h3 style="margin:0px 0px 10px;">Keterangan</h3>
                        <p>- Poin yang sudah diredeem tidak dapat ditukar kembali.</p>
                    	<p>- Voucer akan kami kirimkan melalui alamat tempat tinggal anda, mohon mengisi lengkap alamat anda.</p>
                    </div>
                    <div class="gabung" style="margin:12px;">
              			<a href="#" class="btn btn-primary">Redeem Sekarang</a>
                    </div>
              </div>
            </div>
            <script type="text/javascript" src="/asset/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="/asset/js/tab.js"></script>
            <script>
              $(function () {
                $('#myTab a:first').tab('show')
              })
            </script>
        </div>        
        <div class="clearfix"></div>
    </div><!--end .wrapper-->
</div><!-- end #content-->