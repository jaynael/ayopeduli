<div id="content" class="page">
	<div class="wrapper">
    	<div class="left" style="width:215px;">
    		<div class="profile-tab">
            	<div class="top">                
                    <div class="pic">
                    	<?php 
						//var_dump(!is_null($user_item['photo']));
						if ($user_item['photo']=='0'){ ?>
                        <img width="300px" src="/upload/user/0cc783073edbff95b4b94868c1f4e49c.jpg" />                         
                        <?php }else{?> 
                        <img width="300px" src="/upload/user/<?php echo $user_item['photo']?>" /> 
                        <?php }?>                  
                    </div>
                    <h4 style="margin:10px 0px;"><?php echo $user_item['fullname'] ?> </h4>
                    <span style="font-size:14px;text-align:center;margin:5px 0px;">AP ID : <?php echo $user_item['uid'] ?></span>
                </div>
                <div class="poin">
                	<div class="angka">
                    	<span class="main"><?php echo number_format($user_item['poin'],0) ?></span> 
                                                   	
                        <span class="second">Gudness</span>                        
                    </div>
                    <p>Lakukan donasi dan volunteering untuk meningkatkan jumlah poin kamu</p>
                    <p></p>
                </div>
            </div><!-- .end .profile-tab-->
        </div>
        <div class="right" style="width:730px;">
            <?php if (!isset($thanks)){
				echo "";
			}else{?>
				<div class="alert alert-success"><?php echo $thanks?></div>
			<?php } ?>
            <?php if (!isset($error)){
				echo "";
			}else{?>
				<div class="alert alert-danger"><?php echo $error?></div>
			<?php }			
			?>
            <?php if (!isset($success)){
				echo "";
			}else{?>
				<div class="alert alert-success"><?php echo $success?></div>
			<?php }			
			?>
        	<ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#buataksi" data-toggle="tab">Buat Aksi</a></li>
              <li><a href="#update" data-toggle="tab">Aksi saya</a></li>
              <li><a href="#history" data-toggle="tab">Hystori Donasi</a></li>              
              <li><a href="#redeem" data-toggle="tab">Redeem Poin</a></li>
              <li><a href="#volunteer" data-toggle="tab">Edit Profile</a></li>
            </ul>            
            <div class="tab-content">            
              <div class="tab-pane active" id="buataksi">              
              		<div class="create">
                    	<div class="right buataksi" style="width:730px;">
        	<?php // echo validation_errors(); ?>
			<?php // echo form_open('aksi/save'); ?>
            <script type="text/JavaScript">
				$(document).ready(function() { 
					var elem = $("#chars");
					$("#judul").limiter(30, elem);
					
					var elemdescing = $("#elemdescing");
					$("#descsing").limiter(70, elemdescing);
				
					$('#btn-aksi').click(function(e){
					
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
                    <div id="result"></div>
        	<form name="buataksi" method="post" class="styled buataksi" action="/aksi/savelogin" enctype="multipart/form-data">
            <div class="section" style="width: 580px;margin: 0px auto;">
                <h2 style="text-align:center;">Pilih Kategori Aksi</h2>
                    <div class="category">
                    	<div class="inp">
                        	<input type="radio" name="cat" class="radio required" checked="checked" value="kesehatan" />
                        </div>
                        <div class="content-category">
                            <div class="image">
                                <img src="/asset/images/Kesehatan.png" />
                            </div>
                            <div class="title">
                                <h2>Kesehatan</h2>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- end.content-category-->            
                    </div>
                    <div class="category">
                    	<div class="inp">
                        	<input type="radio" name="cat" class="radio required" value="pendidikan" />
                        </div>
                        <div class="content-category">
                            <div class="image">
                                <img src="/asset/images/education.png" />
                            </div>
                            <div class="title">
                                <h2>Pendidikan</h2>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- end.content-category-->            
                    </div>
                    <div class="category">
                    	<div class="inp">
                        	<input type="radio" name="cat" class="radio required" value="lingkungan" />
                        </div>
                        <div class="content-category">
                            <div class="image">
                                <img src="/asset/images/lingkungan.png" />
                            </div>
                            <div class="title">
                                <h2>Lingkungan</h2>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- end.content-category-->            
                    </div>        
                    <div class="clearfix"></div>
                    
				</div><!--end .section-->
                <div class="section">
                	<label for="exampleInputEmail1"><h3>Judul / Nama aksi :</h3></label>
                    <div class="inp">
                    	<input type="text" name="judul" class="input form-control required" id="judul"  value="<?php if (!isset($judul)){
						 }else { echo $judul ; } ?>">
                    </div>
                    <p>Tuliskan judul aksimu sesingkat dan sejelas mungkin, Agar mudah dimengerti oleh donatur dan volunteer, Tersedia <span id="chars">30</span> Karakter</p>                
                   	</div>
                <div class="section">
                	<label for="exampleInputEmail1"><h3>Deskripsi singkat aksi :</h3></label>
                    <!--<textarea name="descsingkat" class="desc" style="width: 595px;height: 130px;" ></textarea>-->
                    <div class="inp">
                    	<input type="text" name="descsing" class="input form-control required" id="descsing" value="<?php if (!isset($descsing)){
						 }else { echo $descsing ; } ?>">
                    </div>
                    <p>Tuliskan descripsi singkat tentang aksimu, Tersedia <span id="elemdescing">70</span> Karakter</p> </p>               
                </div>
                <div class="section">
                	<label for="exampleInputEmail1"><h3>Upload photo aksi :</h3></label>
                    <!--<textarea name="descsingkat" class="desc" style="width: 595px;height: 130px;" ></textarea>-->
                    <div class="inp">
                    	<!--<input type="file" name="pic" class="input form-control" id="pic" >-->
                        <input type="file" name="picaksi" id="picaksi" class="input form-control required" size="20" />
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                    </div>
                    <p>Upload photo aksimu dengan resolusi 1024px * 1024px untuk hasil yang lebih bagus</p>               
                </div>
                <div class="section">
                	<label for="exampleInputEmail1"><h3>Apakah aksi ini mebutuhkan donasi?</h3></label>
                    <div class="inp">
                        <select name="donasi" class="input form-control required" id="donasi">
                            <option value="">Pilih</option>
                            <option value="butuh">Ya, Kami membutuhkan dukungan donasi</option>
                            <option value="tidak">Tidak, Kami tidak membutuhkan dukungan donasi</option>                    
                        </select>
                    </div>
                    <p>Pilih apakah aksi kamu membutuhkan donasi publik?</p>               
                </div>
                <script src="/asset/ckeditor/ckeditor.js"></script>
                <script>
					// Remove advanced tabs for all editors.
					CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
					CKEDITOR.replace( 'desc' );
				</script>
                <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>-->
  				<script type="text/javascript" src="/asset/js/jquery.number.js"></script>
                <script type="text/javascript">
					$(document).ready(function() {
						$(".datepicker").datepicker();
						//$('.jumlahtarget').number( true, 0 );
						$('#butuh').hide();
						$('#donasi ').removeClass('required');
						$('.tidak .datepicker').removeClass('required');
						$('#donasi').change(function(){		
							$('.gak').hide();	
							$('#' + $(this).val()).show().addClass('butuh');
							$('.jumlahtarget').val('').addClass('required');
							//$('.datepicker').val('').addClass('required');
						});
						
					});
				</script>
                
                <div id="butuh" class="gak">
                    <div class="section">
                        <label for="exampleInputEmail1"><h3>Target donasi terkumpul :</h3></label>
                        <div class="input-prepend input-append" style="width: 595px;">
                            <span class="add-on" style="width: 51px;height: 30px;">Rp</span><input id="appendedPrependedInput" class="jumlahtarget" name="jumlahtarget" size="16" placeholder="1000000" type="text" style="width: 520px;height: 30px;">
                        </div>
                        <p>Pastikan target yang ingin anda capai adalah rasional untuk aksi anda. TANPA titik dan koma Ex.Rp.500000</p>               
                    </div>                    
                </div>
                <div class="section">
                        <label for="exampleInputEmail1"><h3>Kapan Kampanye Aksi ini akan berakhir :</h3></label>
                        <div class="inp">
                        	<input type="text" name="tgl" placeholder="01/30/2014" class="datepicker input form-control required" value="<?php if (!isset($tgl)){
						 }else { echo $tgl ; } ?>">
                        </div>
                        <p>Kapan penggalangan dana ini akan berakhir, pastikan seminggu sebelum pelaksanaan aksi kamu.</p>              
                </div>
                <div class="section">
                	<label for="exampleInputEmail1"><h3>Deskripsi aksi</h3></label>
                    <div class="inp">
                    <textarea  cols="80" id="desc" name="deskripsi" rows="20" class="form-control required">
                    <?php if (!isset($desc)){?> <h2><strong><span style="line-height:1.2em">Short Summary :</span></strong></h2>

<p>Contributors fund ideas they can be passionate about and to people they trust. Here are some things to do in this section:</p>

<ul>
	<li>Introduce yourself and your background.</li>
	<li>Briefly describe your campaign and why it&#39;s important to you.</li>
	<li>Express the magnitude of what contributors will help you achieve.</li>
</ul>

<p>Remember, keep it concise, yet personal. Ask yourself: if someone stopped reading here would they be ready to make a contribution?</p>

<h2><strong>What We Need &amp; What You Get :</strong></h2>

<p>Break it down for folks in more detail:</p>

<ul>
	<li>Explain how much funding you need and where it&#39;s going. Be transparent and specific&mdash;people need to trust you to want to fund you.</li>
	<li>Tell people about your unique perks. Get them excited!</li>
	<li>Describe where the funds go if you don&#39;t reach your entire goal.</li>
</ul>

<h2><strong>The Impact</strong></h2>

<p>Feel free to explain more about your campaign and let people know how the difference their contribution will make:</p>

<ul>
	<li>Explain why your project is valuable to the contributor and to the world.</li>
	<li>Point out your successful track record with projects like this (if you have one).</li>
	<li>Make it real for people and build trust.</li>
</ul>

<h2><strong>Other Ways You Can Help</strong><br />
<span style="font-size:13px; line-height:1.6em">Some people just can&#39;t contribute, but that doesn&#39;t mean they can&#39;t help:</span></h2>

<ul>
	<li>Ask folks to get the word out and make some noise about your campaign.</li>
	<li>Remind them to use the Indiegogo share tools!</li>
</ul>

<p>&nbsp;</p>

<h2><strong>And that&#39;s all there is to it.</strong></h2>
<?php }else{?>
<?php echo $desc;
} ?>
</textarea>
</div>
                    <p>Jelaskan secara lengkap tentang aksi ini</p>    
                    <script>
						// Remove advanced tabs for all editors.
						//CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
						CKEDITOR.replace( 'desc' );
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
                <div class="section">
                        <label for="exampleInputEmail1"><h3>Tambahkan code youtube embed</h3></label>
                        <div class="inp">
                        	<input type="text" name="vid" class=" input form-control" placeholder="iframe">
                        </div>
                        <p>Buat video campaign sosial kamu dan masukan embed video kamu disini ex. <code></code></p>               
               </div>
               <input type="hidden" name="uid" class="input form-control" id="uid" value="<?php echo $user_item['uid'] ?>" >
               <input type="hidden" name="email" class="input form-control" id="email" value="<?php echo $user_item['email'] ?>" >
               
               <div class="submit">
               			<button name="submit" id="btn-aksi" class="btn btn-submit btn-primary"> Buat Aksi Sekarang </button>
               </div>
            </form>
        </div>
<script src="/asset/js/jquery.tinylimiter.js"></script>
<script>
$(document).ready( function() {
	//var elem = $("#chars");
//	$("#judul").limiter(30, elem);
//	
//	var elemdescing = $("#elemdescing");
//	$("#descsing").limiter(70, elemdescing);
});
</script>
                    </div><!--end .create-->
              </div>
              <div class="tab-pane fade" id="update">
              		<div class="aksi-landscape">
                    <?php if (count($aksi_user) > 0) {?>
						
                     <?php for ($i=0;$i<count($aksi_user);$i++){ ?>
                    	<div class="item-aksi">
                            <div class="image">
                                <img src="/upload/aksi/<?php echo $aksi_user[$i]['pic'] ?>" />
                            </div>
                            <div class="desc-left">
                                <div class="title">
                                    <h2><?php echo $aksi_user[$i]['judul'] ?> </h2>            
                                </div>
                                <div class="desc">
                                    <div class="desc-top">
									<?php 
                                     $target_k = $aksi_user[$i]['jumlahtarget'];
                                     $terkumpul_k = $aksi_user[$i]['jumlahterkumpul'];
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
									$date = strtotime($aksi_user[$i]['tgl']);
									$remaining = $date - time();
									$days_remaining = floor($remaining / 86400);
									?>
                                        <a href="/aksi/view/<?php echo $aksi_user[$i]['slug']?>"><h4><?php echo $days_remaining ?> Hari lagi Aksi Berakhir</h4></a>
                                    </div>
                                    <div class="desc-bottom">
                                        <a href="/home/editaksi/<?php echo $aksi_user[$i]['aid']?>"><h4>Edit Aksi Ini</h4></a>
                                    </div>                                                     
                                </div><!-- .desc-->  
                            </div>         
                        </div><!--end .item-aksi-->
                        <?php } 
                   }else { ?>
                        <div class='alert alert-warning'>Anda belum memiliki Aksi</div>
                        <?php }?>
                        <div class="clearfix"></div> 
                                        	
                    </div> <!--end .item aksi-landscape-->                    
              </div>
              <div class="tab-pane fade" id="history">
              <?php if (count($donasi_user) > 0) {?>
              		<table class="table table-hover" style="font-size:13px;">
                    <thead>
                      <tr>
                        <th>ID Donasi</th>
                        <th>Untuk Aksi</th>
                        <th>Don. Aksi</th>
                        <th>Don. Aksi</th>
                        <th>Total Don.</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php for ($i=0;$i<count($donasi_user);$i++){ ?>
                      <tr>
                        <td><?php echo $donasi_user[$i]['did'] ?></td>
                        <td><?php echo $donasi_user[$i]['namaaksi'] ?></td>
                        <td>Rp.<?php echo number_format($donasi_user[$i]['donasi_aksi']) ?></td>
                        <td>Rp.<?php echo number_format($donasi_user[$i]['donasi_ap']) ?></td>
                        <td>Rp.<?php echo number_format($donasi_user[$i]['totaldon']) ?></td>
                        <td><?php echo $donasi_user[$i]['time1'] ?></td>
                        <td><?php
						 $stat = $donasi_user[$i]['statdon'];
						 if ($stat==0){?>
                         <span class="alert alert-warnning" style="padding:5px;">Belum Diterima</span>
						 <?php }
						 ?>
                         <?php if ($stat==1){?>
                         <span class="alert alert-success" style="padding:5px;"><span class="glyphicon glyphicon-ok" style="margin:0px 5px 0px 0px; "></span>Sudah Diterima</span>
						 <?php }
						 ?></td>
                      </tr>                      
                      <?php } ?>
                      
                    </tbody>
                  </table>
                 <?php }else { ?>
                        <div class='alert alert-warning'>Anda belum pernah melalukan donasi, bantu aksi sekarang klik <a href="/aksi">disini</a></div>
                        <?php }?>
              </div>
              <div class="tab-pane fade volunteer" id="volunteer">
              		<h3 style="margin:10px 0px 20px;">Edit Profile :</h3>
                    <div class="form-horizontal donasi styled" >
                    	<?php echo validation_errors(); ?>
   						<?php echo form_open_multipart('home/editprofile/'.$user_item['uid']); ?>
                    	<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                                 <input type="text" class="form-control required" name="fullname" id="fullname" value="<?php echo $user_item['fullname'] ?>">
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nama Panggilan</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                                  <input type="text" class="form-control required" name="panggilan" id="panggilan" value="<?php echo $user_item['panggilan'] ?>">
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">No Handphone</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                                  <input type="text" class="form-control required" name="handphone" id="handphone" value="<?php echo $user_item['hp'] ?>">
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                                  <input type="text" class="form-control required" readonly="readonly" name="email" id="email" value="<?php echo $user_item['email'] ?>">
                                </div>
                            </div>
                          </div>
                          <!--<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                                  <input type="password" class="form-control" name="password" id="password" value="">
                                </div>
                            </div>
                          </div>-->
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Photo profile</label>
                            <div class="col-sm-10">
                            	<div class="inp">
                                  <input type="file" name="photoimg" id="photoimg" class="form-control" />
                                </div>
                                <div class="imagese" style="margin:10px 0px 0px;">
                                	<img width="100px" src="/upload/user/<?php echo $user_item['photo']?>" />
                                </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="uid" id="uid" value="<?php echo $user_item['uid']?>" />
                                <input type="hidden" name="pass2" id="pass2" value="<?php echo $user_item['password']?>" />
                                <input type="hidden" name="submitted" id="submitted" value="thrue" />
                                <button type="submit" class="btn btn-primary" id="submit">Update Profile</button>
                            </div>
                          </div>
                       </form>
                    </div>
              		<!--<div class="item-volunteer">
                    	<div class="pic">
                        	<a href="#"></a><img src="/asset/img/avatar.jpg" />
                        </div>
                        <h4 class="name"><a href="#">Hans Prayipta</a></h4>
                    </div><!--end .item-volunteer-->
                    
                    
                    <div class="clearfix"></div>
              </div>
              <div class="tab-pane fade volunteer" id="redeem">
              		<div class="gabung" style="margin:12px;">
              			<a href="#" class="btn ">Gudness Poin anda saat ini sebanyak <?php echo number_format($user_item['poin'],0) ?> poin</a>
                    </div>                    
                    <?php echo form_open_multipart('redeem/poin'); ?> 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kirim Ke Alamat :</label>
                            <div class="inp">
                                <input type="text" name="alamat" class="form-control required" id="alamat" placeholder="Tuliskan Jalan" value="<?php if (!isset($alamat)){}else { echo $alamat ; } ?>">
                        	</div>
                            <div class="inp">
                                <input type="text" name="kota" class="form-control required" id="alamat" placeholder="Kota" value="<?php if (!isset($fullname)){}else { echo $fullname ; } ?>">
                        	</div>
                             <div class="inp">
                                <input type="text" name="pos" class="form-control required" id="alamat" placeholder="Kode Pos" value="<?php if (!isset($fullname)){}else { echo $fullname ; } ?>">
                                <input type="hidden" name="uid" class="form-control required" id="uid" value="<?php echo $user_item['uid'] ?>" />
                        	</div>
                            <label>Voucher akan dikirimkan kepada anda melalui alamat diatas</label>
                        </div>  
                        <h3>Silahkan pilih redeem poin anda  :</h3>                                      
                        <?php
						  for ($i=0;$i<count($product);$i++){
							// var_dump("$i=0;$i<count($aksi_donasi_all);$i++"); ?>
							<div class="item-volunteer redeem">
								<input type="radio" class="radio" name="item" value="<?php echo $product[$i]['productid'] ?>" />
								<span class="jumpoin btn btn-primary"><?php echo $product[$i]['poin'] ?> Poin</span>
								<div class="pic">
									<a href="#"></a><img src="/upload/product/<?php echo $product[$i]['pic'] ?>" />
								</div>
								<h4 class="name"><a href="#"><?php echo $product[$i]['namapartner'] ?></a></h4>
							</div><!--end .item-volunteer-->                        
						   <?php } ?>
                    <div class="clearfix"></div>
                    <div class="keterangan" style="margin:20px 0px 0px;">
                    	<h3 style="margin:0px 0px 10px;">Keterangan</h3>
                        <p>- Poin yang sudah diredeem tidak dapat ditukar kembali.</p>
                    	<p>- Voucer akan kami kirimkan melalui alamat tempat tinggal anda, mohon mengisi lengkap alamat anda.</p>
                    </div>
                    <div class="gabung" style="margin:12px;">
                    	<input type="submit" name="submit" value="Redeem Sekarang" class="btn btn-primary" />              			
                    </div>
                     </form>
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