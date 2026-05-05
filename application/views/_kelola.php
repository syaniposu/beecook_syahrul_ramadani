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


<section class=" py-5 mt-0 mb-5">
    <div class="container pb-5">

        <?=$this->session->flashdata('message') ?>
    
        <h1 class="fw-bold">Kelola Resep</h1>

        <a href="<?=base_url($this->uri->segment('1').'/tambah')?>" class="btn btn-warning py-2 px-5 text-white bg-warning-new mt-4">Tambah Resep</a>

        <table class="table table-sm mt-5 z-2 table_kelola" style="background:none !important">
            <thead>
                <tr>
                    <th>Nama Resep</th>
                    <th>Kategori</th>
                    <th>File ID</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            
        </table>



        <div class="hasil_ajax"></div>

        <div class="hasil_hapus"></div>

    </div>


    

</section>






<script>
    $(document).ready(function(){

        loadData()

    })

    function loadData(){
        $.ajax({
            url: "<?=base_url('category/getByCategory')?>",
            method: "GET",
            dataType: 'json',
            data: { id: 'all' },
            beforeSend: function(){
                $('.loading_load').show();
            },
            success: function(data){
                
                if(data.menus && data.menus.length > 0){

                    $('.table_kelola > tbody').empty();

                    data.menus.forEach(function(item){

                        let appende =  `
                            <tr>
                                <td>${item.name}</td>
                                <td>${item.category.name}</td>
                                <td>${item.file_id}</td>
                                <td class="fw-bold text-center">
                                    <div class="d-flex justify-content-center">
                                        <div class="text-danger mx-1 cp" onclick="delData('${item.id}')">Del</div>
                                        <a href="<?=base_url($this->uri->segment('1').'/edit/')?>${item.id}" class="text-primary mx-1 cp text-decoration-none">Edit</a>
                                        <div class="text-success mx-1 cp">Gambar</div>
                                    </div>
                                </td>
                            </tr>`;                   

                        $('.table_kelola > tbody:last-child').append(appende);
                        
                    });

                    

                } else {
                    $('.hasil_ajax').html('Data tidak ada');
                }

                $('.loading_load').hide();

                
            },
            error: function(){
                $('.loading_load').hide();
                $('.hasil_ajax').html('<p>Gagal load data</p>');
                swal('Error','Gagal '+jqXHR+'_'+textStatus+'_'+errorThrown+'\n','error');
            }
        });
    }


    function delData(id){

      swal({
        title : "Hapus data ini?",
        // text: "Proses ini akan mempengaruhi stok",
        buttons: true,
        icon: 'warning',
        danger:true,
        dangerMode: true,
      })
      
      .then(konfirm => {
        if (konfirm) {
          
          $('.loading_load').show();
          $.ajax({
              type:'POST',
              url: "<?=base_url($this->uri->segment('1').'/hapus')?>",
              data: ({'id':id}),
              /*dataType: 'json',*/
              success: function(data){

                    $('.hasil_hapus').html(data);
                
                  
                  $('.loading_load').hide();
              },
              error : function (jqXHR, textStatus, errorThrown){
                  $('.loading_load').hide();
                  swal('Error','Gagal '+jqXHR+'_'+textStatus+'_'+errorThrown+'\n Silahkan hubungi Admin Web','error');
              }
          }); 
        }
      });
    }


</script>