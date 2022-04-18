<?php

require_once('conn/db_connect.php');
?>

<!--options-->
<form action="" method="POST">

  <div align="center">
    <table dir="rtl" width="90%" border="2" bordercolor="#000000" > 
      <tr>
        <td align="center" colspan="6" bgcolor="#0D375F" style="border-radius:25px;"><b>
            <font face="Traditional Arabic" size="6" color="#FFFFFF" style="border-radius:25px;">شاشة البحث 
            </font>
          </b></td>
      </tr>


      <tr>
        <td width="122" align="center" bgcolor="#6c757d" style="border-radius:25px;">
          <font face="Traditional Arabic" size="4" color="#FFFFFF"><b  for="title">العام
                الجامعى </b></font>
        </td>
        <td width="1"></td>
        <td width="356">
          <font size="4" face="Traditional Arabic">

            <!--option value=''>من فضلك اختار</option-->

            <select name="bookCat" style="font-weight: 700;width:100%;border-radius:25px;" required>
              <option selected disabled value="">من فضلك اختار</option>

              <?php
                        $query = "SELECT categoryName FROM categories";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
              <option><?php echo $row['categoryName']; ?></option>
              <?php
                        }
                        ?>



            </select></font>
        </td>
        <td width="93" align="center" bgcolor="#6c757d" style="border-radius:25px;">
          <font face="Traditional Arabic" size="4" color="#FFFFFF"><b>الفرقة
                </b></font>
        </td>
        <td  width="1"></td>
        <td width="385">
            <font size="4" face="Traditional Arabic">
               <select name="num" style="font-weight: 700;width:100%;border-radius:25px;" required>
       <option selected disabled value="">من فضلك اختار</option>
      <option value="الأولى">الأولى</option>
      <option value="الثانية">الثانية</option>
      <option value="الثالثة">الثالثة</option>
      <option value="الرابعة">الرابعة</option>
    </select>
                
               </font>
         </td>
      </tr>
        
      <tr>
        <td width="122" align="center" bgcolor="#6c757d" style="border-radius:25px;">
          <font face="Traditional Arabic" size="4" color="#FFFFFF"><b>الترم</b></font>
        </td>
        <td width="1"></td>
        <td width="356">
            <font size="4" face="Traditional Arabic">
            <select name="term"  style="font-weight: 700;width:100%;border-radius:25px;" required>
      <option selected disabled value="">من فضلك اختار</option>
     <option value="الاول">الاول</option>
      <option value="الثانى">الثانى</option>
    </select>
            </font>
         </td>
        <td width="122" align="center" bgcolor="#6c757d" style="border-radius:25px;">
          <font face="Traditional Arabic" size="4" color="#FFFFFF"><b>النوع</b></font>
        </td>
        <td width="1"></td>
        <td width="356">
            <font size="4" face="Traditional Arabic">
            <select name="type"  style="font-weight: 700;width:100%;border-radius:25px;" required>
      <option selected disabled value="">من فضلك اختار</option>
      <option value="الكتاب الجامعى">الكتاب الجامعى</option>
      <option value="ملازم">ملازم</option>

    </select>
            </font>
         </td>
      </tr>
      <tr>
        <td width="122" align="center" bgcolor="#6c757d" style="border-radius:25px;">
          <font face="Traditional Arabic" size="4" color="#FFFFFF"><b>القسم</b></font>
        </td>
        <td width="1"></td>
        <td width="356">
            <font size="4" face="Traditional Arabic">
            <select name="department"  style="font-weight: 700;width:100%;border-radius:25px;" required>
      <option selected disabled value="">من فضلك اختار</option>
      <option value="القسم العام">القسم العام</option>
      <option value="قسم محاسبة"> قسم محاسبة</option>
      <option value="قسم أداره">قسم أداره</option>
      <option value="قسم لإحصاء">قسم لإحصاء</option>
      <option value="قسم الاقتصاد">قسم الاقتصاد والتجارة الخارجية</option>
      <option value=" قسم العلوم السياسية "> قسم العلوم السياسية</option>
      <option value="قسم نظم">قسم نظم المعلومات</option>

    </select>
            </font>
         </td>
       <td width="122" align="center" bgcolor="#6c757d" style="border-radius:25px;">
          <font face="Traditional Arabic" size="4" color="#FFFFFF"><b>الشعبة</b></font>
        </td>
        <td width="1"></td>
        <td width="356">
            <font size="4" face="Traditional Arabic">
            <select name="division"  style="font-weight: 700;width:100%;border-radius:25px;"required >
      <option selected disabled value="">من فضلك اختار</option>
      <option value="أنتظام">أنتظام</option>
      <option value="أنتساب">أنتساب</option>
      

    </select>
            </font>
         </td>  
      </tr>

      <tr>
        <td colspan="6" bgcolor="#0D375F" style="border-radius:25px;">
          <p align="center">
            <input type="submit" name="submit"  value="   بحـث   " style="font-weight: 700;border-radius:25px;">&nbsp;&nbsp;
           
            <input type="Reset"  value="تفريغ الحقول"  style="font-weight: 700;border-radius:25px;">
        </td>
      </tr>
    </table>
  </div>
 
</form>








<!--end-->


<!-- Start Books -->

<div class="books">
  <div class="container">
    <div class="row">
      <?php
            include ('conn/db_connect.php');
        if (isset($_POST['submit'])) {
            $num=$_POST['num'];
            $department=$_POST['department'];
            $term=$_POST['term'];
            $type=$_POST['type'];
            $division=$_POST['division'];
            $bookCat=$_POST['bookCat'];
            $query = "SELECT * FROM `books` WHERE num= '$num' AND department= '$department' AND term= '$term' AND type= '$type' AND division= '$division' AND bookCat= '$bookCat'";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

      <div class="col-md-6 col-lg-4">
        <div class="card text-center" style="border-radius:25px;">
          <div class="img-cover">

            <img src="uploads\bookCovers/<?php echo $row['bookCover']; ?>" alt="Book Cover" class="card-img-top">
          </div>
          <div class="card-body">
            <h4 class="card-title">
              <a href="book.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['bookCat']; ?>"><?php echo $row['bookTitle']; ?></a>
            </h4>
            <p class="card-text"><?php echo mb_substr($row['bookContent'], 0, 150, "UTF-8"); ?></p>
            <button class="custom-btn1" style="width: 160px">
              <a href="uploads\books/<?php echo $row['book']; ?>" download>تحميل الكتاب</a>
            </button>
          </div>
        </div>
      </div>
      <?php
                }
            } else {
                ?>

      <div class="alert">
        <span class="closebtn">&times;</span>
        <strong>لايوجد !</strong> اى كتب
      </div>

      <?php
            }
            }
            ?>
    </div>
  </div>
</div>
<style>
  .alert {

    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;

    margin-left: 50%;
  }


  .closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
  }

  .closebtn:hover {
    color: black;
  }

</style>
<script>
  var close = document.getElementsByClassName("closebtn");
  var i;

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.opacity = "0";
      setTimeout(function() {
        div.style.display = "none";
      }, 600);
    }
  }

</script>

<!-- End Books -->
