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
    to top,
    rgba(0,0,0,0.9) 0%,
    rgba(0,0,0,0.6) 40%,
    rgba(0,0,0,0.3) 100%
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



.step-list {
  list-style: none;
  padding: 0;
  counter-reset: step;
}

.step-list li {
  display: flex;
  align-items: flex-start;
  margin-bottom: 20px;
  position: relative;
  padding-left: 60px;
}

/* angka bulat */
.step-list li::before {
  counter-increment: step;
  content: counter(step);

  position: absolute;
  left: 0;
  top: 0;

  width: 40px;
  height: 40px;

  background: #e8b431;
  color: #000;

  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;

  font-weight: bold;
}

</style>

<?
$datane=$data['menu'];
?>

<section class="hero2 pb-5 pt-4 mt-0">


    <div class="container pb-5">
    
        <div class="trending-card position-relative text-white">
          
          <!-- Background Image -->
          <img src="<?=base_url('assets/nasi-goreng-with-satay.png')?>" class="w-100 h-100 object-fit-cover" alt="">

          <!-- Overlay -->
          <div class="overlay"></div>

          <!-- Content -->
          <div class="content position-absolute top-50 start-0 translate-middle-y px-4 px-md-5">
            <h1 class="fw-bold text-center text-md-normal"><?=$datane['name']?></h1>
          </div>

        </div>



        <div class="d-flex mt-4 justify-content-center justify-content-md-start">
           <div class="d-flex align-items-center me-md-5 me-4">
               <div>
                   <span class="text-warning-new">
                       
                        <svg width="61" height="61" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_301850_95063)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6934 30.495C12.6934 35.4195 14.4259 39.6242 17.8959 43.0942C21.3708 46.5691 25.5706 48.3066 30.495 48.3066C35.3997 48.3066 39.5994 46.5741 43.0793 43.0942C46.5542 39.6242 48.3016 35.4195 48.3016 30.495C48.3016 25.5855 46.5592 21.4006 43.0793 17.9158C39.5894 14.4408 35.3947 12.6934 30.495 12.6934C25.5706 12.6934 21.3708 14.4359 17.8959 17.9158C14.4309 21.4006 12.6934 25.5855 12.6934 30.495ZM52.8736 27.2137C51.3099 26.1464 50.5256 24.7515 50.6596 21.5595V13.3537C50.6745 12.207 52.7545 12.068 52.8587 13.3537L52.9382 20.0107C52.9431 21.2567 54.8146 21.2964 54.8097 20.0107L54.7302 13.1253C54.755 11.8942 56.7407 11.7701 56.7655 13.1253C56.7655 15.0365 56.845 18.0994 56.845 20.0107C56.7457 21.217 58.4832 21.3758 58.4385 20.0107L58.359 13.17C58.4037 12.2417 59.4264 11.9091 60.1213 12.346C60.861 12.8175 60.7121 13.7657 60.7419 14.5649L61 22.4183C60.9603 24.7018 60.3596 26.5584 58.5725 27.3477C58.2995 27.4669 57.9222 27.5612 57.4854 27.6257L58.1009 46.7776C58.1357 47.9144 57.2074 48.8427 56.1202 48.8427H55.872C54.6458 48.8427 53.6083 47.7953 53.6431 46.5195L54.1842 27.6208C53.6133 27.5314 53.1417 27.3974 52.8736 27.2137ZM8.01221 46.2017L8.042 29.0008C14.0735 25.516 12.1523 12.0878 6.11589 12.1623C-1.22119 12.2467 -2.08992 27.2931 4.21957 28.9462L3.75293 46.2712C3.66358 49.5476 8.00725 49.8504 8.01221 46.2017ZM20.1298 30.4801C20.1298 33.3494 21.1375 35.7968 23.1679 37.8272C25.1933 39.8476 27.6406 40.8652 30.5099 40.8652C33.3594 40.8652 35.8067 39.8476 37.8321 37.8272C39.8575 35.7968 40.8702 33.3494 40.8702 30.4801C40.8702 27.6307 39.8575 25.1834 37.8321 23.1629C35.8018 21.1425 33.3594 20.1248 30.5099 20.1248C24.7465 20.1298 20.1298 24.7118 20.1298 30.4801ZM17.7023 30.4801C17.7023 26.9556 18.9434 23.9423 21.4403 21.4453C23.9373 18.9483 26.9605 17.7073 30.5099 17.7073C34.0494 17.7073 37.0627 18.9483 39.5448 21.4453C42.0417 23.9423 43.2977 26.9556 43.2977 30.4801C43.2977 34.0147 42.0417 37.0279 39.5448 39.5348C37.0627 42.0368 34.0494 43.2927 30.5099 43.2927C26.9655 43.2927 23.9423 42.0368 21.4403 39.5348C18.9483 37.023 17.7023 34.0097 17.7023 30.4801Z" fill="#E8B431"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_301850_95063">
                        <rect width="61" height="61" fill="white" transform="matrix(-1 0 0 1 61 0)"/>
                        </clipPath>
                        </defs>
                        </svg>

                   </span>
               </div>
               <div class="d-flex flex-column ps-3" style="line-height:20px">
                   <div class="text-secondary fw-bold fs-6">Kategori</div>
                   <div class="text-dark fw-bold fs-5"><?=$datane['category']['name']?></div>
               </div>
           </div>




           <div class="d-flex align-items-center ms-0 ms-lg-5">
               <div>
                   <span class="text-warning-new">
                       
                        
                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 38C13.9609 38 9.12816 35.9982 5.56497 32.435C2.00178 28.8718 0 24.0391 0 19C0 13.9609 2.00178 9.12816 5.56497 5.56497C9.12816 2.00178 13.9609 0 19 0C24.0391 0 28.8718 2.00178 32.435 5.56497C35.9982 9.12816 38 13.9609 38 19C38 24.0391 35.9982 28.8718 32.435 32.435C28.8718 35.9982 24.0391 38 19 38ZM19 34.2C23.0313 34.2 26.8975 32.5986 29.748 29.748C32.5986 26.8975 34.2 23.0313 34.2 19C34.2 14.9687 32.5986 11.1025 29.748 8.25198C26.8975 5.40142 23.0313 3.8 19 3.8C14.9687 3.8 11.1025 5.40142 8.25198 8.25198C5.40142 11.1025 3.8 14.9687 3.8 19C3.8 23.0313 5.40142 26.8975 8.25198 29.748C11.1025 32.5986 14.9687 34.2 19 34.2ZM17.1 19.779V7.6H20.9V18.221L28.405 25.726L25.726 28.405L17.1 19.779Z" fill="#E8B431"/>
                        </svg>

                   </span>
               </div>
               <div class="d-flex flex-column ps-3" style="line-height:20px">
                   <div class="text-secondary fw-bold fs-6">Durasi</div>
                   <div class="text-dark fw-bold fs-5"><?=$datane['cooking_duration']?> Menit</div>
               </div>
           </div>

           
        </div>


        <p class="my-5"><?=$datane['description']?></p>

        <h3 class="fw-bold">Informasi Nutrisi</h3>

        <div class="row mb-5 mt-3">

            <div class="col-md-3 col-6 fw-semibold">
                <div class="rounded-4 border border-warning border-2 p-3 text-center bg-light w-100 mb-4">
                    <h4 class="mb-0 fw-bold"><?=$datane['nutrition']['calory']?> kcal</h4> 
                    Kalori
                </div>
            </div>

            <div class="col-md-3 col-6 fw-semibold">
                <div class="rounded-4 border border-warning border-2 p-3 text-center bg-light w-100 mb-4">
                    <h4 class="mb-0 fw-bold"><?=$datane['nutrition']['protein']?>g</h4> 
                    Protein
                </div>
            </div>

            <div class="col-md-3 col-6 fw-semibold">
                <div class="rounded-4 border border-warning border-2 p-3 text-center bg-light w-100">
                    <h4 class="mb-0 fw-bold"><?=$datane['nutrition']['fat']?>g</h4> 
                    Lemak
                </div>
            </div>

            <div class="col-md-3 col-6 fw-semibold">
                <div class="rounded-4 border border-warning border-2 p-3 text-center bg-light w-100">
                    <h4 class="mb-0 fw-bold"><?=$datane['nutrition']['carbohydrate']?>g</h4> 
                    Karbohidrat
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-md-6 pb-5">
                <h4 class="fw-bold mb-4">Bahan-bahan</h4>
                <?
                foreach ($datane['ingredients'] as $value) {
                    ?>
                    <p class="mb-2 text-dark"><?=$value['description']?></p>
                    <?
                }
                ?>
            </div>
            <div class="col-md-6 pb-5">
                <h4 class="fw-bold mb-4">Cara Masak</h4>

                <ol class="step-list">

                    <?
                    foreach (array_reverse($datane['recipes']) as $value) {
                        ?>
                        <li ><?=$value['description']?></li>
                        <?
                    }
                    ?>
                </ol>



            </div>
        </div>

    </div>
</section>



