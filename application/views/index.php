<!--<script src="/asset/vendor/jquery.js"></script>
    <script src="/asset/vendor/bootstrap.js"></script>
    <script src="/asset/vendor/prism.js"></script>
    <script src="/asset/vendor/jquery.smoothscroll.js"></script>-->
<script type="text/javascript">
	$(document).ready(function() {
    	// Instance the tour
		var tour = new Tour({
		  
		  });
		
		// Add your steps. Not too many, you don't really want to get your users sleepy
		tour.addSteps([
		  {
			element: "#logo", // string (jQuery selector) - html element next to which the step popover should be shown
			title: "Selamat datang di ayopeduli.com", // string - title of the popover
			content: "ayopeduli.com adalah sebuah platform website untuk kolaborasi aksi sosial", // string - content of the popover
		  	placement:"bottom",
		  },
		  {
			element: ".main-menu",
			title: "Aksi sosial apa yang ayopeduli fokuskan?.",
			content: "Kami percaya 3 element penting ini dapat meningkatkan kesejahteraan masyarakat.",
		  },
		  {
			element: "#item",
			title: "Solusi apa yang kami tawarkan?.",
			content: "Informasi mengenai Aksi kami tampilkan dengan lebih jelas dan transparan.",
			placement:"top",
		  },
		  {
			element: "#poin",
			title: "Mengapa saya harus bergabung?.",
			content: "Mari berkolaborasi untuk membantu aksi sosial dan kumpulkan gudnes poin untuk dapatkan penawaran menarik dari partner kami.",
			placement:"top",
		  },
		  {
			element: "#buat",
			title: "Bergabunglah bersama kami",
			content: "Tunggu apa lagi, ayo buat aksi sosialmu dan sebarkan untuk dapatkan dukungan lebih banyak, buat aksi sekarang, atau...",
			placement:"left",
		  },
		  {
			element: "#loginson",
			title: "Login atau Register",
			content: "Gabung dan join bersama ribuan volunteer dan fasilitator di seluruh Nusantara untuk lakukan hal yang lebih baik.",
			placement:"bottom",
		  }	  
		]);
		
		
		// Initialize the tour
		tour.init();
		
		// Start the tour
		tour.start();
		$("#slideshow > div:gt(0)").hide();
	
			setInterval(function() { 
			  $('#slideshow > div:first')
			    .fadeOut(700)
			    .next()
			    .fadeIn(700)
			    .end()
			    .appendTo('#slideshow');
			},  7000);
	});
</script>
<div id="quote">
	<div class="wrapper">
        <div class="left">            
            <div id="slideshow">
            	<div>
                	<div class="testimonial">
                    <h1 class="quote" id="quote">
                        Bahagia itu ketika kita bisa membuat orang lain tersenyum. Ngga perlu menyumbang Rp.1 Milyar, meski sedikit (sesanggupnya), yang penting rutin dan ikhlas.
                    </h1>                    
                    <p class="author">@BillyBoen | <span>Founder Young On Top</span></p>
                    </div>
               		<!--<div class="arrow-down"></div>
                    <p class="testimonial-author">Billy Boen | <span>Founder Young On TOP</span></p>-->
           		</div>
                <div>
                <div class="testimonial">
                    <h1 class="quote" id="quote" style="font-size:38px;">
                            Platform Kolaborasi<br /> Aksi Sosial, Apa Aksi Sosialmu ?
                    </h1>
                   <p class="author">~ @ayopeduli | <span> ayopeduli.com </span></p>
                </div>
                                <!--<div class="arrow-down"></div>
                                <p class="testimonial-author">Holip Soekawan | <span>Balanced Pillar Author</span></p>-->
                           </div>
                        </div>
        </div>
        <div class="right" id="buat">
        	<a href="<?php //echo base_url(); ?>aksi/create" class="btn btn-primary"><h1> Buat Aksimu Sekarang </h1></a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div id="slider">
	<div class="wrapper">    	
            <ul id="featured">
            <?php	
			
	for ($i=0;$i<count($aksi_slider);$i++){ 	
	?>
                <li>
                	<div class="image">
                        <a href="/aksi/view/<?php echo $aksi_slider[$i]['slug'] ?>"><img src="/upload/aksi/<?php echo $aksi_slider[$i]['pic'] ?>" width="552px" height="369px"/></a>
                   	</div>
                    <div class="sobat-ribbon">
						<h3><?php echo $aksi_slider[$i]['cat'] ?></h3>
                    </div><!--end .sobat-ribbon-->
                    <div class="info">
                    	<div class="nama">
                            <h4><?php echo $aksi_slider[$i]['judul'] ?></h4>
                            <p><?php echo $aksi_slider[$i]['descsing'] ?></p>
                            </div>
                        <div class="donasi">
                        	<a href="/aksi/view/<?php echo $aksi_slider[$i]['slug'] ?>">
                            	<h2>Rp.<?php 
								$terkumpul = $aksi_slider[$i]['jumlahterkumpul'];
								//if (isset($terkumpul)){
//									echo "Rp.".number_format($terkumpul = $aksi_slider[$i]['jumlahterkumpul']);																		
//								}else{
//									echo("gak ada");
//									
//								}
									if($aksi_slider[$i]['jumlahterkumpul']){                                                
									   print number_format($aksi_slider[$i]['jumlahterkumpul'],0);
									}
									else{
									   print "0.00";
									} ?></h2>
                                <p>Terkumpul</p>
                                <p>Donasi Sekarang</p>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                </li>
                <?php } ?>
                
            </ul> 
    </div>
</div>
