<!doctype html>
<html lang="en">
  <head>
    <title>Bee Cook</title>
    <meta charset="utf-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="icon" type="image/x-icon" href="<?=base_url()?>favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/dist/css/bootstrap.min.css">
    <script src="<?=base_url()?>assets/js/jquery-3.7.1.min.js"></script>

    <script src="<?=base_url()?>assets/sweetalert.min.js"></script>

    <style>
      .navbar-nav .nav-link.active {
        color: #e8b431 !important;
        font-weight: bolder;
      }

      .text-warning-new{
        color: #e8b431 !important;
      }

      .bg-warning-new{
        background: #e8b431 !important;
      }
    </style>
  </head>

  <?
  $uri1=$this->uri->segment('1');
  ?>

  <body >

    <nav class="navbar navbar-expand-lg bg-transparent  py-4">
      <div class="container bg-transparent">

        <a class="navbar-brand bg-transparent" href="<?=base_url()?>">
          <img src="<?=base_url()?>assets/logo/logo-beecook-color.png" alt="Logo" height="50" class="d-inline-block me-2">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navbarTogglerDemo02">

          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 font-weight-bold">
            <li class="nav-item">
              <a class="nav-link fw-bold <?=($uri1=='' || $uri1=='lp')?'active':''?> mx-3 fs-5" href="<?=base_url()?>">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold <?=($uri1=='category')?'active':''?> mx-3 fs-5" href="<?=base_url('category')?>" >Resep</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold  mx-3 fs-5 <?=($uri1=='kelola')?'active':''?>" href="<?=base_url('kelola')?>">Kelola</a>
            </li>
          </ul>
          

        </div>


      </div>
    </nav>


    <div class="loading_load" style="top:0;position:fixed ;width: 100%;height: 100%;background: rgba(255,255,255,0.8);z-index: 1001;">
      <div style="position:absolute;z-index:1002;top: 48%;left: 35%;text-align:center;color: #000;width: 30%;"><i class="fas fa-fw fa-spinner fa-spin"></i> Loading</div>
    </div>



          <?=$_content?>





    <div class="text-white" style="background:#111827;">
      <div class="container">
        <footer class="pt-4 pb-1">
          <div class="row">

            <div class="col-lg-3 my-4">
              <h5 class="mb-3 cursor-pointer" onclick="document.location='<?=base_url()?>'">
                <img src="<?=base_url()?>assets/logo/logo-beecook-white.png" alt="Logo" height="40" class="d-inline-block me-2">
              </h5>
              <!-- <ul class="nav flex-column">
                
                <li class="nav-item mb-2 fw-bold">CV. Mitra Digital Solusi</li>
                <li>Jl. Sukun, Perum Mataram Bumi Sejahtera No.3,<br>Desa Condongcatur,<br>Kecamatan Depok, Kab. Sleman,<br> Daerah Istemewa Yogyakarta 55281</li>
                
              </ul> -->
            </div>

            <div class="col-lg-3 my-4">
              <h4 class="mb-3">Partnership</h4>
              <ul class="nav flex-column gap-2">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white fs-5">Layanan</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white fs-5">Kontributor</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white fs-5">Iklan</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white fs-5">Karir</a></li>
              </ul>
            </div>

            <div class="col-lg-2 my-4">
              <h5 class="mb-3">Bantuan</h5>
              <ul class="nav flex-column gap-2">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white fs-5">FAQ</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white fs-5">Kontak Kami</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white fs-5">Aksesibilitas</a></li>
              </ul>
            </div>

            <div class="col-lg-4 my-4 ps-lg-5">
                
                
                  <ul class="nav flex-column gap-2 float-lg-end ">
                    
                    <li class="">
                      <a class="btn p-0 pb-1 px-1 me-2">
                        <img src="<?=base_url('assets/sosmed/socmed-tiktok.png')?>" width="40">
                      </a>

                      <a class="btn p-0 pb-1 px-1 me-2">
                        <img src="<?=base_url('assets/sosmed/socmed-facebook.png')?>" width="40">
                      </a>
                      <a class="btn p-0 pb-1 px-1 me-2">
                        <img src="<?=base_url('assets/sosmed/socmed-instagram.png')?>" width="40">
                      </a>

                      <a class="btn p-0 pb-1 px-1">
                        <img src="<?=base_url('assets/sosmed/socmed-x.png')?>" width="40">
                      </a>

                      

                    </li>
                  </ul>
                
                
              
            </div>
          </div>

          <div class="d-flex flex-column flex-sm-row">
            
            <p class="pb-4 mb-0 mt-5">BEECOOK MEDIA | ALL RIGHTS RESERVED</p>

            
            <!-- <ul class="list-unstyled d-flex">
              <li class="ms-3"><a class="link-body-emphasis" href="#" aria-label="Instagram"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
              <li class="ms-3"><a class="link-body-emphasis" href="#" aria-label="Facebook"><svg class="bi" width="24" height="24" aria-hidden="true"><use xlink:href="#facebook"/></svg></a></li>
            </ul> -->
          </div>
        </footer>
      </div>
    </div>

  </body>

  <script src="<?=base_url()?>assets/dist/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function(){
      $('.loading_load').hide();
    })
    function clickHarga(){
      $('html').animate({
          scrollTop: $('#section_harga').offset().top
      }, 500);
    }

    function clickFitur(){
      $('html').animate({
          scrollTop: $('#section_fitur').offset().top
      }, 500);
    }
  </script>

</html>