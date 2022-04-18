
<style>



.middle {
    color:azure;
  
  text-align: center;
}

hr {
  margin: auto;
  width: 10%;
}
</style>


  
  <div class="middle">
    <h1>COMING SOON</h1>
    <hr>
    <p id="demo" style="font-size:30px"></p>
  </div>
  


<script>
var countDownDate = new Date("9 1, 2021 15:37:25").getTime();
var countdownfunction = setInterval(function() {
    var now = new Date().getTime();
     var distance = countDownDate - now;
   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
     document.getElementById("demo").innerHTML = days + "d  " + hours + "h  "
  + minutes + "m  " + seconds + "s  ";
    if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>



