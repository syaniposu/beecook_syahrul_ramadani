<style>
.hero {
  position: relative;
  
}

.hero2 {
  position: relative;
  
}

/* efek glow / shadow halus */
.hero::before {
  content: "";
  position: absolute;
  top: 50px;
  left: -50px;
  width: 600px;
  height: 600px;
  background: radial-gradient(circle, rgba(212,160,23,0.4), transparent 90%);
  filter: blur(60px);
  z-index: 0;
}

.hero2::before {
  content: "";
  position: absolute;
  top: 50px;
  right: 0px;
  width: 600px;
  height: 600px;
  background: radial-gradient(circle, rgba(212,160,23,0.4), transparent 70%);
  filter: blur(90px);
  
}

/* pastikan konten di atas shadow */
.hero .container {
  position: relative;
  z-index: 2;
}
.hero-img{
  position: relative;
  right: -4%;
  width: 125%;
  
}

.avatar {
  width: 50px;
  height: 50px;
  object-fit: cover;
  margin-left: -7px; /* bikin numpuk */
}

.img-circle {
  width: 140px;
  height: 140px;
  border-radius: 50%;   /* bikin bulat */
  object-fit: cover;    /* crop isi gambar */
}

/* avatar pertama jangan ikut ketarik */
.avatar:first-child {
  margin-left: 0;
}




.subscribe-section {
  background: #f8f8f8;
}

/* shape oval kuning */
.chef-wrapper {
  width: 320px;
  height: 420px;
  margin: auto;
  background: linear-gradient(to bottom, #e0ac2b, #f4d27a);
  border-radius: 200px;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  overflow: hidden;
}

/* gambar chef */
.chef-img {
  width: 210px;
  object-fit: cover;
  z-index: 2;
}

/* input biar lebih halus */
.subscribe-section .form-control {
  border-radius: 10px;
  padding: 12px;
}

.chef-wrapper {
  position: relative;
  width: 320px;
  height: 420px;
  background: linear-gradient(to bottom, #e0ac2b, #f4d27a);
  border-radius: 200px;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  overflow: hidden;
}

/* shadow putih di belakang */
.chef-wrapper::before {
  content: "";
  position: absolute;
  bottom: 20px;
  width: 200px;
  height: 200px;
  background: rgba(255, 255, 255, 0.8);
  filter: blur(60px);
  border-radius: 50%;
  z-index: 1;
}


</style>
<section class="hero py-5">

    <div class="d-flex  justify-content-between">

        <div class="w-50 position-relative" style="left:10%">

            <div class="d-flex flex-column">
                <div class="d-flex flex-column">
                    <div class="d-flex align-top">
                        <div class="fw-bolder me-3" style="font-size:85px">Where </div>
                        <div class="fw-bolder text-warning-new" style="font-size:85px">Quality</div>
                        <div ><img class="position-relative" src="<?=base_url('assets/stars.png')?>" width="70" style="top:-18px;left:-14px"></div>
                    </div>
                    <div class="" style="line-height:25px">
                        <div style="font-size:60px">Meets <b>Flavor.</b> </div>
                    </div>
                    
                </div>
                <div class="py-5 my-2">
                    <button class="btn btn-dark px-5 py-3">Eksplor Sekarang</button>
                </div>
                <div class="d-flex align-items-center">
                    <div class="d-flex me-2">
                        <img src="<?=base_url('assets/avatar/people1.png')?>" class="rounded-circle avatar z-3">
                        <img src="<?=base_url('assets/avatar/people2.png')?>" class="rounded-circle avatar z-2">
                        <img src="<?=base_url('assets/avatar/people3.png')?>" class="rounded-circle avatar z-1">
                    </div>
                    <span class="ms-3 fw-medium fs-5">1.000+ Pengguna</span>
                </div>
            </div>
        
      </div>

      <div class="w-50 position-relative " style="overflow: hidden;">
        <img src="<?=base_url('assets/hero-image.png')?>" class="hero-img" alt="">
      </div>

    </div>
  
</section>



<section class="hero2 py-5 my-5">

    <div class="d-flex justify-content-center fw-bold">

        <div class="text-dark">
            <h1>Eksplor berdasarkan</h1>
        </div>

        <div class="d-flex flex-column position-relative" style="margin-left: -5px;overflow: hidden;">
            <h1 class="text-warning-new z-1 text-center">Kategori</h1>
            <img class="position-relative " src="<?=base_url('assets/line-doodle.png')?>" alt="" width="180" style="top:-18px">
        </div>

    </div>

    <div class="d-flex justify-content-center mt-4 pt-2 hasil_get_category" >

        Loading...

        <!-- <div class="col-6 col-md-2 text-center z-1">
            <img src="<?=base_url('assets/category/category-appetizer.png')?>" alt="" class="img-circle">
            <h4 class="mt-4">Main Course</h4>
        </div>

        <div class="col-6 col-md-2 text-center z-1">
            <img src="<?=base_url('assets/category/category-appetizer.png')?>" alt="" class="img-circle">
            <h4 class="mt-4">Main Course</h4>
        </div>

        <div class="col-6 col-md-2 text-center z-1">
            <img src="<?=base_url('assets/category/category-appetizer.png')?>" alt="" class="img-circle">
            <h4 class="mt-4">Main Course</h4>
        </div>

        <div class="col-6 col-md-2 text-center z-1">
            <img src="<?=base_url('assets/category/category-appetizer.png')?>" alt="" class="img-circle">
            <h4 class="mt-4">Main Course</h4>
        </div>

        <div class="col-6 col-md-2 text-center z-1">
            <img src="<?=base_url('assets/category/category-appetizer.png')?>" alt="" class="img-circle">
            <h4 class="mt-4">Main Course</h4>
        </div> -->
    </div>
  
</section>



<section class="py-5 my-5">

    <div class="container">
        <div class="row align-items-center">

          <!-- TEXT -->
          <div class="col-md-6">
            <h2 class="fw-bold mb-3">
              Dapatan menu menarik setiap hari
            </h2>
            <p class="text-muted mb-4">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
            </p>

            <div class="d-flex">
                <div class="input-group me-2">
                    <span class="input-group-text bg-white border-end-0">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M61.4 64C27.5 64 0 91.5 0 125.4 0 126.3 0 127.1 .1 128L0 128 0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-256-.1 0c0-.9 .1-1.7 .1-2.6 0-33.9-27.5-61.4-61.4-61.4L61.4 64zM464 192.3L464 384c0 8.8-7.2 16-16 16L64 400c-8.8 0-16-7.2-16-16l0-191.7 154.8 117.4c31.4 23.9 74.9 23.9 106.4 0L464 192.3zM48 125.4C48 118 54 112 61.4 112l389.2 0c7.4 0 13.4 6 13.4 13.4 0 4.2-2 8.2-5.3 10.7L280.2 271.5c-14.3 10.8-34.1 10.8-48.4 0L53.3 136.1c-3.3-2.5-5.3-6.5-5.3-10.7z"/></svg>
                    </span>
                    <input type="email" class="form-control me-2 border-start-0" placeholder="you@email.com">
                    
                </div>
                <button class="btn btn-dark px-4">Langganan</button>
            </div>
              
          </div>

          <!-- IMAGE -->
          <div class="col-md-6 text-center">
            <div class="chef-wrapper">
              <img src="<?=base_url('assets/people-chef-subscribe.png')?>" alt="chef" class="img-fluid chef-img">
            </div>
          </div>

        </div>
      </div>
</section>


<script>
    $(document).ready(function(){

        $.ajax({
            method:'GET',
            url: "<?=base_url('category/getCategory')?>",
            dataType: 'json',
            success: function(data){
                 let html = '';
                 if(data.categories && data.categories.length > 0){

                    data.categories.forEach(function(item){
                        html += `
                        <div class="col-6 col-md-2 text-center z-1">
                            <img src="<?=base_url('assets/category/category-')?>${item.slug}.png" 
                                 class="img-circle" alt="${item.name}">
                            <h4 class="mt-4">${item.name}</h4>
                        </div>
                        `;
                    });

                } else {
                    html = `<p>Tidak ada kategori</p>`;
                }

                $('.hasil_get_category').html(html);
            },
            error : function (jqXHR, textStatus, errorThrown){
              $('.hasil_get_category').html('Loading...');
              swal('Error','Gagal '+jqXHR+'_'+textStatus+'_'+errorThrown+'\n','error');
            }
        });

    })
</script>