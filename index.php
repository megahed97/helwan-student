<!DOCTYPE html>
<html lang="ar">
    <?php
    session_start();
    include('admin/db_connect.php');
    ob_start();
        $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
         foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
    include('header.php');

	
    ?>

   
        
           
<style>
section#contact {
    background-color: #121212 ;
   padding:inherit;
       margin-bottom: 4rem;

}

section#contact form#contactForm .form-group {
    margin-bottom: 1.5rem;
}

section#contact form#contactForm .form-group input,
section#contact form#contactForm .form-group textarea {
    padding: 1.25rem;
}

section#contact form#contactForm .form-group input.form-control {
    height: auto;
}

section#contact form#contactForm .form-group-textarea {
    height: 100%;
}

section#contact form#contactForm .form-group-textarea textarea {
    height: 100%;
    min-height: 10rem;
}

section#contact form#contactForm p.help-block {
    margin: 0;
}

section#contact form#contactForm .form-control:focus {
    border-color: #0059ff;
    box-shadow: none;
}

section#contact form#contactForm ::-webkit-input-placeholder {
    font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-weight: 700;
    color: #ced4da;
}

section#contact form#contactForm :-moz-placeholder {
    font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-weight: 700;
    color: #ced4da;
}

section#contact form#contactForm ::-moz-placeholder {
    font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-weight: 700;
    color: #ced4da;
}

section#contact form#contactForm :-ms-input-placeholder {
    font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-weight: 700;
    color: #ced4da;
}
    
        
        
    	header.masthead {
		  background: url(admin/assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		}
    
  #viewer_modal .btn-close {
    position: absolute;
    z-index: 999999;
    /*right: -4.5em;*/
    background: unset;
    color: white;
    border: unset;
    font-size: 27px;
    top: 0;
}
#viewer_modal .modal-dialog {
        width: 80%;
    max-width: unset;
    height: calc(90%);
    max-height: unset;
}
  #viewer_modal .modal-content {
       background: black;
    border: unset;
    height: calc(100%);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  #viewer_modal img,#viewer_modal video{
    max-height: calc(100%);
    max-width: calc(100%);
  }
  main {
    background: #121212 !important;
    padding-bottom: 15px;
}
footer{
  background: #020202 !important;
}
 

a.jqte_tool_label.unselectable {
    height: auto !important;
    min-width: 4rem !important;
    padding:5px
}

#carousel-field{
    position: fixed;
    z-index: -1;
    width: calc(100%)
}
#carousel-field, #carsCarousel, #carsCarousel .carousel-inner,#carsCarousel .carousel-item,#carsCarousel img{
    /*max-height: 60vh*/
} 
.col-lg-8.align-self-end.mb-4.page-title {
    background: #00000070;
}

/*
a.jqte_tool_label.unselectable {
    height: 22px !important;
}*/
    </style>
    <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "أخر الأخبار";
        // if($page == 'news'):
     ?>
     <style>
       .masthead{
    background: unset!important
}
.masthead:before{
    content: unset!important;
}
     </style>
    
<!--    start carousel-->
  <header class="masthead">
        <?php 
        $cars_img = scandir('admin/assets/uploads/carousel/');
            foreach($cars_img as $k=> $fname){
                if(in_array($fname,array('.','..'))){
                    unset($cars_img[$k]);
                }
            }
            if(count($cars_img) > 0):
        ?>
        <div id="carousel-field">
        <div id="carsCarousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php
            $i = 0 ;
             foreach($cars_img as $fname):
                $active = ($i == 0) ? 'active' : '';
                $i++;
            ?>
            <div class="carousel-item <?php echo $active ?>">
              <img class="d-block w-100" src="admin/assets/uploads/carousel/<?php echo $fname ?>" alt="ADS">
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        </div>
    <?php endif; ?>
      <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end mb-4 page-title">
                  <h3 class="text-white"><?php echo strtoupper(str_replace("_", " ", $page)) ?></h3>
                    <hr class="divider my-4" />
                </div>
            </div>  
      </div>  
            </header>
    <?php //endif; ?>
    
    <!--    end carousel-->
    
    
    <body id="page-top">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
<!--       start menu-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <span>
                  <img src="admin/assets/uploads/<?php echo isset($_SESSION['system']['cover_img']) ? $_SESSION['system']['cover_img'] : '' ?>" alt="logo" style="height:45px;max-width: calc(100%)" >
                </span>
                <a class="navbar-brand js-scroll-trigger ml-2" href="./"><?php echo $_SESSION['system']['name'] ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0" dir="rtl">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=أخر الأخبار">الصفحة الرئيسة</a></li>
                         <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=شاشة البحث عن نتائج الطلاب">نتائج الامتحانات</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=أرقام الجلوس">أرقام الجلوس</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=أقسام الكليه">أقسام الكليه</a></li>
                         <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=المقرر الدراسى"> المقرر الدراسى</a></li>
                         <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=فديوهات شرح">فديوهات شرح</a></li>
                        
                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
         خدمات
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="text-align: center; min-width:150px;">
          <a class="dropdown-item" href="http://app2.helwan.edu.eg/military/login.asp">التربية العسكرية</a>
          <a class="dropdown-item" href="http://app2.helwan.edu.eg/commerce/Arabic/login.asp">التشعيب الالكترونى</a>
          <a class="dropdown-item" href="http://app2.helwan.edu.eg/helcode/Codesrch.asp"> أكواد الدفع</a>
          <a class="dropdown-item" href=" http://app2.helwan.edu.eg/Detmed/"> الكشف الطبى</a>
           <a class="dropdown-item" href=" http://app2.helwan.edu.eg/certificate/ComA">أستكمال بيانات شهادة التخرج</a>
            <a class="dropdown-item" href="http://app2.helwan.edu.eg/Fatoraa/Payedsrch.asp">طباعة فاتورة السداد</a>
            <a class="dropdown-item" href=" http://app2.helwan.edu.eg/Detmed/"></a>
        </div>
      </li>       
                    </ul>
                </div>
            </div>
        </nav>
       
<!--        end menu-->
  <main class="">
        <?php 
        include $page.'.php';
        ?>
       
</main>

<!--        footer-->

       
  <div id="preloader"></div>
        <footer class=" py-5" >
            <div class="container">
               
               
	 <div class="row1 justify-content-center">
                    <div class="col-lg-8 text-center">
                       
                        
                        <h2 class="mt-0 text-white">تحميل التطبيق</h2>
                                               <hr class="divider my-4" />
                         <a href="conn/google-play-badge.eps"download><img src="conn/google-play.png"  width="35%"></a> 
                    </div>
                </div>
		
                <div class="row1">
                    
                    <div class="col mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        
                        <a class="d-block" href="mailto:<?php echo $_SESSION['system']['email'] ?>"><?php echo $_SESSION['system']['email'] ?></a>
                    </div>
                </div>
            </div>
            <br>
            <div class="container"><div class="small text-center text-muted"> | Copyright © 2021 - <?php echo $_SESSION['system']['name'] ?> | </div></div>
        </footer>
        
       <?php include('footer.php') ?>
    </body>
    <script type="text/javascript">
      $('#login').click(function(){
        uni_modal("Login",'login.php')
      })
      $('.datetimepicker').datetimepicker({
          format:'Y-m-d H:i',
      })
      $('#find-car').submit(function(e){
        e.preventDefault()
        location.href = 'index.php?page=search&'+$(this).serialize()
      })
    </script>
    <?php $conn->close() ?>
 
    
</html>
