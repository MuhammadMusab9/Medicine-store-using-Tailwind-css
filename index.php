<?php
require 'admin/include/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
require 'include/head.php';
?>

<body>
  <div class="min-h-screen">
    <!--Navbar-->
    <?php
require 'include/header.php';
?>
    <!--Navbar ends-->

    <main>
        <div> <!--problem in applying  blur-[2px] on img--> 
          <img src="img/med/buying-medical-supplies-with-shopping-cart-concept bg.jpg" class=" w-screen  "   alt="">  
          





        </div>
                <div class="-my-[700px]" >
            <div class=" text-5xl cursor-pointer  text-blue-600   pl-12 tracking-wide text-  font-bold bg-slate-500   ">
                BRINGING PHARMACY SERVICES TO <span class="text-yellow-400  "> YOUR FINGERTIPS</span>
                
           </div ><br>
           
           <div>
            <p class=" mstart font-light  bg-black  pl-12  mt-5 w-1/2 tracking-wide text-slate-900  ">Welcome to Life Serve, your one-stop solution for all your medicinal needs. Whether you prefer the convenience of ordering medicines online or a personal touch with physical purchases, we've got you covered. With a wide range of high-quality medications.</p></div>
        <div class="buttons my-4 ">
            <a href="product.php" >
              <button class="bg-white  w-60 border-green-900 focus:ring-1   focus:ring-green-500  rounded-3xl px-3 py-2 mt-6 ml-36 hover:bg-white  hover:border-2 hover:border-green-500 hover:text-green-500 font-bold text-lg ">
              Buy Now
            </button> </a>
         </div>
        </div>
      </div>


      <!--CATEGORIES START-->
      <div class="bg-gradient-to-b from-green-500 to-blue-300   w-auto h-[950px]">
        
         <h1 class="text-white pt-[430px] pb-6 pl-10 font-bold text-3xl  ">Categories</h1>

         <section class=" py-4">
          <div class="container mx-auto px-3 py-4 rounded-3xl  ">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">

               <!-- Content for box 1 -->
              <div class="  bg-white   p-4  rounded-xl h-32 w-56 shadow-xl    hover:shadow-2xl hover:bg-slate-100">
                <h1 class="text-center font-medium">Tablets and Capsules</h1>
               <a href="#Tablets-and-Capsules"> <img class="w-20 h-16 ml-12 mt-2" src="img/med/capsule.png" alt=""></a>
              </div>
                <!-- Content for box 2 -->
              <div class="bg-white p-4 shadow-xl hover:shadow-2xl hover:bg-slate-100 rounded-xl h-32 w-56  ">
                <h1 class="text-center font-medium">Liquids/Syrups</h1>
                <a href="#Liquids/Syrups"><img class="w-20 h-16 ml-12  mt-2" src="img/med/syrup.png" alt=""></a>
              </div>
            </a>

                <!-- Content for box 3 -->
              <div class="bg-white p-4 shadow-xl hover:shadow-2xl hover:bg-slate-100 rounded-xl h-32 w-56">
                <h1 class="text-center font-medium">Creams and Ointments</h1>
                <a href="#Creams and Ointments"><img class="w-20 h-16 ml-12 mt-2" src="img/med/ointment  cream.png" alt=""></a>
              </div>

                <!-- Content for box 4 -->

              <div class="bg-white p-4 shadow-xl hover:shadow-2xl hover:bg-slate-100 rounded-xl h-32 w-56">
                <h1 class="text-center font-medium">Lotions</h1>
               <a href="#Lotions"> <img class="w-20 h-16 ml-12 mt-2" src="img/med/lotions.png" alt=""></a>
              </div>
            </div>
          </div>
        </section>


        <section class=" py-6">
          <div class="container mx-auto px-3 py-4 rounded-3xl  ">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">

              <!-- Content for box 1 -->
              <div class="bg-white p-4  rounded-xl h-32 w-56 shadow-xl    hover:shadow-2xl hover:bg-slate-100">
                <h1 class="text-center font-medium text-green-500">Gels</h1>
                <a href="#Gels"><img class="w-20 h-16 ml-12 mt-2" src="img/med/gel 2.png" alt=""></a>
              </div>

                <!-- Content for box 2 -->
              <div class="bg-white p-4 shadow-xl hover:shadow-2xl hover:bg-slate-100 rounded-xl h-32 w-56  ">
                <h1 class="text-center font-medium">Injections</h1>
                <a href=""><img class="w-20 h-16 ml-12 mt-2" src="img/med/injection.png" alt=""></a>
              </div>

                <!-- Content for box 3 -->
              <div class="bg-white p-4 shadow-xl hover:shadow-2xl hover:bg-slate-100 rounded-xl h-32 w-56">
                <h1 class="text-center font-medium">Inhalers and Nebulizers</h1>
                <a href=""><img class="w-20 h-16 ml-12 mt-2" src="img/med/inhaler.png" alt=""></a>
              </div>

                <!-- Content for box 4 -->
              <div class="bg-white p-4 shadow-xl hover:shadow-2xl hover:bg-slate-100 rounded-xl h-32 w-56">
                <h1 class="text-center font-medium">Eye and Ear Drops:</h1>
               <a href=""><img class="w-20 h-16 ml-12 mt-2" src="img/med/drops.png" alt=""></a> 
              </div>
             </div>
          </div>
        </section>
      </div>
               <!--CATEGORIES END-->


  </main>


    <!--footer-->
    <div class="footer">
    <footer class="bg-gradient-to-r from-blue-500 to-green-400 text-white">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <div>
              <h3 class="text-lg font-bold pt-52">Contact Us</h3>
              <ul class="mt-4">
                <li>Phone: +92 123 456 7890</li>
                <li>Email: info@lifeserve.com</li>
                <li>Address: University Road Opposite Honda North,Peshawar, Pakistan</li>
              </ul>
            </div>
            <div>
              <h3 class="text-lg font-bold pt-52">Explore</h3>
              <ul class="mt-4">
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About Us</a></li>
              </ul>
            </div>
            <div>
              <h3 class="text-lg font-bold pt-52">Customer Support</h3>
              <ul class="mt-4">
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Shipping Information</a></li>
                <li><a href="#">Return Policy</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>
              <div >
                <h3 class="text-lg font-bold pt-52"><a href="index.html">Follow Us</a></h3>
                <ul class="mt-4">
                  <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                  <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                </ul>
              </div>
            
          </div>
          <hr class="border-gray-700 mt-8">
          <div class="mt-6 text-center">
            <p>&copy; 2023 Life Serve Pharmacy. All rights reserved.</p>
          </div>
        </div>
      </footer>
    </div>
      
</body>
</html>