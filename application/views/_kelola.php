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



.upload-box {
  border: 1px dashed #ddd;
  border-radius: 15px;
  background: #fdfdfd;
}

.preview-box {
  width: 100%;
  height: 220px;
  background: #eee;
  border-radius: 12px;
  overflow: hidden;

  display: flex;
  align-items: center;
  justify-content: center;
}

/* gambar full width */
.preview-box img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* biar tidak gepeng */
}

#placeholder {
  font-size: 40px;
  color: #fdfdfd;
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



<div class="modal fade view_gambar" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="formUpload">

                <input type="hidden" name="id_menu" class="id_menu">

                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <h4 class="modal-title text-center" id="exampleModalLabel" style="margin-top: -20px;">Upload Gambar</h4>

                

                <div class="modal-body p-5">

                      <div class="upload-box text-center p-5 mb-3 mx-3">
                        <input type="file" name="gambar" id="fileInput" hidden accept="image/*">

                        <div>
                          <div class="mb-2 fs-1">
                              
                                <svg width="70" height="51" viewBox="0 0 70 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.05172 8.74547L17.2131 6.88524V40.7377L12.3018 41.7717C9.01306 42.464 5.79705 40.3203 5.17081 37.0184L1.14319 15.7818C0.515988 12.4748 2.73148 9.29884 6.05172 8.74547Z" stroke="#2563EB" stroke-width="2"/>
                                <path d="M63.9483 8.74547L52.7869 6.88524V40.7377L57.6982 41.7717C60.9869 42.464 64.203 40.3203 64.8292 37.0184L68.8568 15.7818C69.484 12.4748 67.2685 9.29884 63.9483 8.74547Z" stroke="#2563EB" stroke-width="2"/>
                                <g filter="url(#filter0_d_301876_3295)">
                                <rect x="17.0654" y="1" width="35.8689" height="42.7541" rx="5" stroke="#2563EB" stroke-width="2" shape-rendering="crispEdges"/>
                                </g>
                                <path d="M38.9824 33.0893C39.7831 34.0105 41.215 34.0058 42.0098 33.0796L47.2451 26.976L52.9346 33.0981V38.7544C52.9344 41.5156 50.6958 43.7542 47.9346 43.7544H22.0654C19.3041 43.7544 17.0656 41.5157 17.0654 38.7544V35.2934L29.4727 22.145L38.9824 33.0893Z" fill="#DBEAFE" stroke="#2563EB" stroke-width="2"/>
                                <circle cx="39.5897" cy="14.3443" r="4.16393" fill="#DBEAFE" stroke="#2563EB" stroke-width="2"/>
                                <defs>
                                <filter id="filter0_d_301876_3295" x="13.0654" y="0" width="43.8691" height="50.7541" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset dy="3"/>
                                <feGaussianBlur stdDeviation="1.5"/>
                                <feComposite in2="hardAlpha" operator="out"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.12 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_301876_3295"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_301876_3295" result="shape"/>
                                </filter>
                                </defs>
                                </svg>

                          </div>
                          <p class="mb-1">
                            Drop your files here or 
                            <span class="text-primary fw-semibold" style="cursor:pointer;" onclick="$('#fileInput').click()">browse</span>
                          </p>
                          <small class="text-secondary">Maximum size: 50MB</small>
                        </div>
                      </div>

                      <!-- Preview -->
                      <p class="mb-1 mt-2">Preview</p>
                      <div class="preview-box d-flex justify-content-center align-items-center">
                        <img id="previewImage" src="" class="img-fluid d-none">
                        <span id="placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" width="70" fill="#ccc" class="bi bi-file-image" viewBox="0 0 16 16">
                              <path d="M8.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                              <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v8l-2.083-2.083a.5.5 0 0 0-.76.063L8 11 5.835 9.7a.5.5 0 0 0-.611.076L3 12z"/>
                            </svg>
                        </span>
                      </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light border px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-primary px-3" id="btnUpload">Upload</button>
                </div>

            </form>

        </div>
    </div>
</div>






<script>

    $('#btnUpload').click(function(){

        let formData = new FormData();
        let file = $('#fileInput')[0].files[0];

        if(!file){
            alert('Pilih gambar dulu!');
            return;
        }

        formData.append('gambar', file);

        $.ajax({
            url: "<?=base_url($this->uri->segment('1').'/upload')?>",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,

            beforeSend: function(){
                $('#btnUpload').text('Uploading...');
            },

            success: function(res){
                console.log(res);
                alert('Upload berhasil');
            },

            error: function(){
                alert('Upload gagal');
            },

            complete: function(){
                $('#btnUpload').text('Upload');
            }
        });

    });

    $('#fileInput').on('change', function(e){
        let file = e.target.files[0];

        if(file){
            let reader = new FileReader();

            reader.onload = function(e){
                $('#previewImage')
                    .attr('src', e.target.result)
                    .removeClass('d-none');

                $('#placeholder').hide();
            }

            reader.readAsDataURL(file);
        }
    });

    $('.upload-box').on('dragover', function(e){
        e.preventDefault();
    });

    $('.upload-box').on('drop', function(e){
        e.preventDefault();

        let file = e.originalEvent.dataTransfer.files[0];
        $('#fileInput')[0].files = e.originalEvent.dataTransfer.files;
        $('#fileInput').trigger('change');
    });


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
                                        <div class="text-success mx-1 cp" data-bs-toggle="modal" data-bs-target=".view_gambar">Gambar</div>
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