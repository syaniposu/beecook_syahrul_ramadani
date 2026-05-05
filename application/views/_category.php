<style>

.hero2 {
  position: relative;
  
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
  z-index:-1;
}


.img-circle {
  width: 140px;
  height: 140px;
  border-radius: 50%;   /* bikin bulat */
  object-fit: cover;    /* crop isi gambar */
}


.trending-card {
  height: 250px;
  border-radius: 20px;
  overflow: hidden;
}

/* gambar biar full */
.trending-card img {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1;
}

/* overlay gelap */
.trending-card .overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 2;

  background: linear-gradient(
    to right,
    rgba(0,0,0,0.7) 0%,
    rgba(0,0,0,0.5) 30%,
    rgba(0,0,0,0.2) 80%,
    rgba(0,0,0,0) 100%
  );
}

/* text di atas */
.trending-card .content {
  z-index: 3;
}





.kategori-btn {
  background: #0b1a2b;
  color: #fff;
  border-radius: 12px;
  padding: 15px 0px;
  width: 175px;
  border: none;
  transition: 0.3s;
  margin:0px 10px;
  
}

/* hover */
.kategori-btn:hover {
  background: #14263d;
  color: #eee;
}

/* active (kuning) */
.kategori-btn.active {
  background: #e0ac2b;
  color: #fff;
}

</style>


<section class="hero2 py-5 mt-0">
    <div class="container">
    
        <div class="trending-card position-relative text-white">
          
          <!-- Background Image -->
          <img src="<?=base_url('assets/nasi_goreng.png')?>" class="w-100 h-100 object-fit-cover" alt="">

          <!-- Overlay -->
          <div class="overlay"></div>

          <!-- Content -->
          <div class="content position-absolute top-50 start-0 translate-middle-y px-5">
            <p class="text-warning mb-2">Sedang Trending</p>
            <h2 class="fw-bold">Nasi Goreng Udang Mentega</h2>
          </div>

        </div>


        <div class="d-flex kategori-filter mt-4 justify-content-center">

            

        </div>

        <div class="row container justify-content-center hasil_menu mt-4">

           
            
           
        </div>

    </div>
</section>


<input type="hidden" class="page_pgntn" value="1">



<script>
    $(document).ready(function(){

        $.ajax({
            method:'GET',
            url: "<?=base_url('category/getCategory')?>",
            dataType: 'json',
            success: function(data){
                 let html = '<button class="btn kategori-btn active data_all" data-id="all">Semua</button>';
                 if(data.categories && data.categories.length > 0){

                    data.categories.forEach(function(item){
                        html += `
                        <button class="btn kategori-btn" data-id="${item.id}">${item.name}</button>`;
                    });

                } else {
                    html = `<p>Tidak ada kategori</p>`;
                }

                $('.kategori-filter').html(html);
                $('.data_all').trigger('click')
            },
            error : function (jqXHR, textStatus, errorThrown){
              $('.hasil_get_category').html('Loading...');
              swal('Error','Gagal '+jqXHR+'_'+textStatus+'_'+errorThrown+'\n','error');
            }
        });


        

    })


        $(document).on('click', '.kategori-btn', function(){

            // hapus active semua
            $('.kategori-btn').removeClass('active');

            // tambah active ke yang diklik
            $(this).addClass('active');

            let id = $(this).data('id');

            // AJAX
            $.ajax({
                url: "<?=base_url($this->uri->segment('1').'/getByCategory')?>",
                method: "GET",
                dataType: 'json',
                data: { id: id ,page : $('.page_pgntn').val()},
                beforeSend: function(){
                    $('.hasil_menu').html('<p class="text-center">Loading...</p>');
                },
                success: function(data){
                    let html = '';
                    if(data.menus && data.menus.length > 0){

                        data.menus.forEach(function(item){
                            html += `
                                <div class="col-md-4 p-4">
                                    <a href="<?=base_url($this->uri->segment('1').'/resep/')?>${item.id}" style="text-decoration:none !important">
                                    <div class="card shadow">
                                        <img src="<?=base_url('assets/nasi-goreng-with-satay.png')?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <span class="badge text-bg-primary">${item.category.name}</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-2 text-secondary"><?=getIconClock()?><span>${item.cooking_duration} m</span></div>
                                            </div>
                                            <h5 class="card-title fw-bold mt-3">${item.name}</h5>
                                        </div>
                                    </div></a>
                                </div>
                            `;
                        });

                    } else {
                        html = `<p>Tidak ada kategori</p>`;
                    }

                    $('.hasil_menu').html(html);
                },
                error : function (jqXHR, textStatus, errorThrown){
                    $('.hasil_menu').html('<p>Gagal load data</p>');
                    swal('Error','Gagal '+jqXHR+'_'+textStatus+'_'+errorThrown+'\n','error');
                }
            });

        })




</script>