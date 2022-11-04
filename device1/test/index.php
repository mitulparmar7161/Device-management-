<?php
include "header.php";
?>


    <style>


        .cards-mobile{
            width: 300px;
            height: auto;
             background: linear-gradient(146deg, rgb(52, 1, 255) 0%, rgb(255, 1, 170) 85%);
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 25px;

        }

         .cards-desktop{
            width: 300px;
            height: 200px;
            background: linear-gradient(146deg, rgb(52, 1, 255) 0%, rgb(255, 1, 170) 85%);
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 25px;

        }
         .cards-accessories{
        
            width: 300px;
            height: 200px;
            background: linear-gradient(146deg, rgb(52, 1, 255) 0%, rgb(255, 1, 170) 85%);
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 25px;

        }
        .forground {
            color: rgb(255, 255, 255);
            width: 300px;
            height: 100%;
            border-radius: 25px;
}
        .icon{
            border-radius: 50%;
            width: 100px;
        }
        a{
            text-decoration:none;
        }

    </style>


</head>
<body>
    
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        
        <div class="cards-mobile col-lg-2 col-md-4 col-11 m-4   col-lg-2 col-md-4 col-11 m-4 d-flex flex-column align-items-center  "><a href="mobile.php">
            <div class="forground d-flex flex-column align-items-center ">
                <h2 class="mt-2">Mobile</h2> 
                <img src="assets/mobile.png" alt="" srcset="" class="icon">
            
                <h5 class="mt-2 mb-4">
                    This is Mobile Device
                </h5>
            </div></a>
        </div>
        <div class="cards-desktop col-lg-2 col-md-4 col-11 m-4  d-flex flex-column align-items-center    "><a href="computer.php">
            <div class="forground d-flex flex-column align-items-center ">
                <h2 class="mt-2">Computer</h2> 
                <img src="assets/desktop.jpg" alt="" srcset="" class="icon">
     
                <h5 class="mt-2 mb-4">
                    This is Computer Device
                </h5>
            </div></a>
        </div>
        <div class="cards-accessories col-lg-2 col-md-4 col-11 m-4  d-flex flex-column align-items-center    "><a href="accessories.php">
            <div class="forground d-flex flex-column align-items-center ">
                <h2 class="mt-2">Accessories</h2>
                <img src="assets/accessories.jpg" alt="" sizes="" srcset="" class="icon">
                
                <h5 class="mt-2 mb-4">
                    This is Accessories Device
                </h5>
            </div>
        </div></a>

        
    </div>
</div>

</body>
