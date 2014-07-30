<div id="quote">
	<div class="wrapper">
        <div class="left">
            <h1 class="quote">
                Platform Kolaborasi<br /> Aksi Sosial, Apa Aksi Sosialmu ?
            </h1>
        </div>
        <div class="right">
        	<a href="<?php echo base_url(); ?>buataksi" class="btn btn-primary"><h1> Buat Aksimu Sekarang </h1></a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div id="slider">
	<div class="wrapper">    	
            <ul id="featured">
                <li>
                	<div class="image">
                        <a href="#"><img src="asset/images/zildam.png" width="552px" height="369px"/></a>
                   	</div>
                    <div class="sobat-ribbon">
						<h3>Kesehatan</h3>
                    </div><!--end .sobat-ribbon-->
                    <div class="info">
                    	<div class="nama">
                            <h4>Zildam</h4>
                            <p>Penderita Selebral Palsy</p>
                            </div>
                        <div class="donasi">
                        	<a href="#">
                            	<h2>Rp.1.000.000</h2>
                                <p>Terkumpul</p>
                                <p>Donasi Sekarang</p>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                </li>
                <li>
                	<div class="image">
                        <a href="#"><img src="asset/images/zildam.png" width="552px" height="369px"/></a>
                   	</div>
                    <div class="sobat-ribbon">
						<h3>Kesehatan</h3>
                    </div><!--end .sobat-ribbon-->
                    <div class="info">
                    	<div class="nama">
                            <h4>Zildam</h4>
                            <p>Penderita Selebral Palsy</p>
                            </div>
                        <div class="donasi">
                        	<a href="#">
                            	<h2>Rp.1.000.000</h2>
                                <p>Terkumpul</p>
                                <p>Donasi Sekarang</p>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                </li>
                <li>
                	<div class="image">
                        <a href="#"><img src="asset/images/zildam.png" width="552px" height="369px"/></a>
                   	</div>
                    <div class="sobat-ribbon">
						<h3>Kesehatan</h3>
                    </div><!--end .sobat-ribbon-->
                    <div class="info">
                    	<div class="nama">
                            <h4>Zildam</h4>
                            <p>Penderita Selebral Palsy</p>
                            </div>
                        <div class="donasi">
                        	<a href="#">
                            	<h2>Rp.1.000.000</h2>
                                <p>Terkumpul</p>
                                <p>Donasi Sekarang</p>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                </li>
            </ul> 
    </div>
</div>
<div id="content">
	<div class="wrapper">
    	<div class="category">
        	<div class="content-category">
            	<div class="image">
                	<img src="asset/images/Kesehatan.png" />
                </div>
                <div class="title">
                	<h2>Kesehatan</h2>
                </div>
                <div class="clearfix"></div>
            </div><!-- end.content-category-->
            <?php
				//$result=mysql_query("select aid from ap_aksi where cat='kesehatan' order by id DESC limit 1 ")or die (mysql_error());//query sang database	
//				//$count=mysql_num_rows($result);//isipon kn may tyakto sa query
//				$row=mysql_fetch_array($result);//ma return row sa database		
//						
//				while($data=mysql_fetch_assoc($row))
// 			 {
//				 $judul=$data['judul'];
//				$jumlahtarget=$data['jumlahtarget'];
//				$aid=$data['aid']; 
//			 }
			?>
            <div class="item-aksi">
                <div class="image">
                    <a href="aksi-detail.php?aid=<?php // echo "$aid"; ?>"><img src="asset/images/zildam.png" /></a>
                </div>
                <div class="title">
                    <a href="aksi-detail.php?aid=<?php // echo "$aid"; ?>"><h2><?php // echo "$judul"; ?> Zildam</h2></a>         
                </div>
                <div class="desc">
                    <div class="desc-top">
                        <div class="text">Target Donasi</div>
                        <div class="info target" style="float:right;">
                            <p>Rp.2.100.000</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89">80<div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: 50%;"></div></div>
                        <div class="info terkumpul" style="float:left;">
                            <p>Rp.500.000</p>
                        </div>
                        <div class="text terkumpul">Donasi Terkumpul</div>
                        <div class="clearfix"></div>
                    </div><!--end .desc-top-->
                    <div class="desc-bottom">
                    	<a href="#"><h4>40 Hari lagi Aksi Berakhir</h4></a>
                    </div>
                    <div class="desc-bottom">
                    	<a href="aksi-detail.php"><h4>Dukung Aksi Ini</h4></a>
                    </div>
                    <div class="desc-middle">
                    	<div class="fasilitator">
                        	<div class="image">
                            	<img src="asset/img/avatar9.jpg" />
                            </div>
                            <div class="desc">
                            	<h3>Jaenal Gufron</h3>
                                <p>Founder ayopeduli.com, proven fasilitator ayopeduli wilayah Jakarta</p>
                            </div>
                            <div class="clearfix"></div>
                            <h4>Fasilitator</h4>
                        </div>
                    </div><!--end .desc-middle-->                    
                </div><!-- .desc--> 
            </div><!--end .item-aksi-->
            
            <a href="#">Semua Aksi Kesehatan</a>
        </div>
        <div class="category">
        	<div class="content-category">
            	<div class="image">
                	<img src="asset/images/education.png" />
                </div>
                <div class="title">
                	<h2>Pendidikan</h2>
                </div>
                <div class="clearfix"></div>
            </div><!-- end.content-category-->
            <div class="item-aksi">
                <div class="image">
                    <img src="asset/images/Bssc-slide.jpg" />
                </div>
                <div class="title">
                    <h2>Binus Student</h2>            
                </div>
               <div class="desc">
                    <div class="desc-top">
                        <div class="text">Target Donasi</div>
                        <div class="info target" style="float:right;">
                            <p>Rp.2.100.000</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89">80<div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: 50%;"></div></div>
                        <div class="info terkumpul" style="float:left;">
                            <p>Rp.500.000</p>
                        </div>
                        <div class="text terkumpul">Donasi Terkumpul</div>
                        <div class="clearfix"></div>
                    </div><!--end .desc-top-->
                    <div class="desc-bottom">
                    	<a href="#"><h4>30 Hari lagi Aksi Berakhir</h4></a>
                    </div>
                    <div class="desc-bottom">
                    	<a href="#"><h4>Dukung Aksi Ini</h4></a>
                    </div>
                    <div class="desc-middle">
                    	<div class="fasilitator">
                        	<div class="image">
                            	<img src="asset/img/avatar9.jpg" />
                            </div>
                            <div class="desc">
                            	<h3>Jaenal Gufron</h3>
                                <p>Founder ayopeduli.com, proven fasilitator ayopeduli wilayah Jakarta</p>
                            </div>
                            <div class="clearfix"></div>
                            <h4>Fasilitator</h4>
                        </div>
                    </div><!--end .desc-middle-->                    
                </div><!-- .desc-->         
            </div><!--end .item-aksi-->
            <a href="#">Semua Aksi Pendidikan</a>
        </div>
        <div class="category">
        	<div class="content-category">
            	<div class="image">
                	<img src="asset/images/lingkungan.png" />
                </div>
                <div class="title">
                	<h2>Lingkungan</h2>
                </div>
                <div class="clearfix"></div>
            </div><!-- end.content-category-->
            <div class="item-aksi">
                <div class="image">
                    <img src="asset/images/pic.png" />
                </div>
                <div class="title">
                    <h2>Save Muara Gembong </h2>            
                </div>
                <div class="desc">
                    <div class="desc-top">
                        <div class="text">Target Donasi</div>
                        <div class="info target" style="float:right;">
                            <p>Rp.2.100.000</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="progress simpleProgress progressBlue ui-progressbar ui-widget ui-widget-content ui-corner-all" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="89">80<div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: 30%;"></div></div>
                        <div class="info terkumpul" style="float:left;">
                            <p>Rp.750.000</p>
                        </div>
                        <div class="text terkumpul">Donasi Terkumpul</div>
                        <div class="clearfix"></div>
                    </div><!--end .desc-top-->
                    <div class="desc-bottom">
                    	<a href="#"><h4>20 Hari lagi Aksi Berakhir</h4></a>
                    </div>
                    <div class="desc-bottom">
                    	<a href="#"><h4>Dukung Aksi Ini</h4></a>
                    </div>
                    <div class="desc-middle">
                    	<div class="fasilitator">
                        	<div class="image">
                            	<img src="asset/img/avatar.jpg" />
                            </div>
                            <div class="desc">
                            	<h3>Hans Prayipta</h3>
                                <p>Verified fasilitator ayopeduli wilayah Bandung</p>
                            </div>
                            <div class="clearfix"></div>
                            <h4>Fasilitator</h4>
                        </div>
                    </div><!--end .desc-middle-->                    
                </div><!-- .desc-->           
            </div><!--end .item-aksi-->
            <a href="#">Semua Aksi Lingkungan</a>
        </div>        
        <div class="clearfix"></div>
    </div><!--end .wrapper-->
</div><!-- end #content-->