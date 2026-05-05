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

.cp{
    cursor: pointer;
}

</style>


<section class="hero2 py-5 mt-0">
    <div class="container bg-transparent">

        

        <?=$this->session->flashdata('message') ?>

        <form method="POST" action="<?=base_url($this->uri->segment('1').'/simpan')?>">
    
            <h1 class="fw-bold mb-5">Buat Resep Baru</h1>

            <div class="card shadow border-0">

                <div class="card-body p-3 p-md-5">

                    <h4 class="mb-4 fw-bold">Informasi Utama</h4>

                    <div class="row">
                        <div class="col-md-5 mb-4 mb-md-0 pe-0 pe-md-4">
                            <div class="mb-3">
                                <label for="i1" class="form-label fw-semibold">Nama Resep</label>
                                <input type="text" class="form-control" id="i1" name="nama_resep" placeholder="Nama Resep" required autocomplete="OFF">
                            </div>

                            <div class="mb-3">
                                <label for="i3" class="form-label fw-semibold">Kategori <span class="hasil_kategori"></span></label>
                                <select class="form-select kategori" name="kategori">
                                    
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="i3" class="form-label fw-semibold">Durasi Masak</label>
                                <input type="text" class="form-control" id="i3" name="durasi_masak" placeholder="Durasi Masak" required autocomplete="OFF" inputmode="numeric" oninput="$(this).val(this.value.replace(/[^0-9]/g, ''));">
                            </div>
                        </div>

                        <div class="col-md-7 mb-4 mb-md-0">
                            <div class="mb-3">
                                <label for="it1" class="form-label fw-semibold">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="it1" rows="8" placeholder="Isi deskripsi singkat tentang makanan" required autocomplete="OFF"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="card shadow border-0">

                        <div class="card-body p-3 p-md-5">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="fw-bold">Bahan - bahan</h4>
                                <button class="btn  py-1 btn-light border" type="button" onclick="tambahBahan()">Tambah Bahan</button>
                            </div>

                            <div class="tambah_bahan">
                                
                                <input type="text" class="form-control dbahan mb-2" name="bahan[]" placeholder="Bahan 1" required autocomplete="OFF">
                                <input type="text" class="form-control dbahan mb-2" name="bahan[]" placeholder="Bahan 2">
                                <input type="text" class="form-control dbahan mb-2" name="bahan[]" placeholder="Bahan 3">
                                
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow border-0">

                        <div class="card-body p-3 p-md-5">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="fw-bold">Instruksi Masak</h4>
                                <button class="btn  py-1 btn-light border" type="button" onclick="tambahInstruksi()">Tambah Instruksi</button>
                            </div>

                            <div class="tambah_instruksi">
                                
                                <input type="text" class="form-control dinstruksi mb-2" name="instruksi[]" placeholder="Instruksi 1" required autocomplete="OFF">
                                <input type="text" class="form-control dinstruksi mb-2" name="instruksi[]" placeholder="Instruksi 2">
                                <input type="text" class="form-control dinstruksi mb-2" name="instruksi[]" placeholder="Instruksi 3">
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-end mt-5">
                <button class="btn btn-warning py-3 px-5 fw-bold bg-warning-new text-white">Simpan Resep</button>
            </div>


        </form>
        

    </div>


    <div class="hasil_ajax"></div>
    

</section>






<script>

    function tambahBahan(){
        var dj=1;

        $(".dbahan").each(function(){
            dj += +1;
        });

        $('.tambah_bahan').append(`<input type="text" class="form-control dbahan mb-2" name="bahan[]" placeholder="Bahan `+dj+`" >`);
    }

    function tambahInstruksi(){
        var dj=1;

        $(".dinstruksi").each(function(){
            dj += +1;
        });

        $('.tambah_instruksi').append(`<input type="text" class="form-control dbahan mb-2" name="instruksi[]" placeholder="Instruksi `+dj+`" >`);
    }

    $(document).ready(function(){
        loadData()
    })

    function loadData(){
        $.ajax({
            url: "<?=base_url('category/getCategory')?>",
            method: "GET",
            dataType: 'json',
            beforeSend: function(){
                $('.hasil_kategori').html('Loading...');
            },
            success: function(data){
                
                if(data.categories && data.categories.length > 0){

                    $('.kategori').empty();

                    data.categories.forEach(function(item){

                        var dbnp = window.btoa(JSON.stringify(item));

                        $('.kategori').append(`<option value="${item.id}">${item.name}</option>`);
                        
                    });

                    $('.hasil_kategori').html('');

                } else {
                    $('.hasil_kategori').html('Data tidak ada');
                }

                
            },
            error: function(){
                $('.hasil_kategori').html('Gagal load kategori');
                swal('Error','Gagal '+jqXHR+'_'+textStatus+'_'+errorThrown+'\n','error');
            }
        });
    }


</script>