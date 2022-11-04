<?php
include "header.php";
?>


    <style>
        .cards-mobile {
            width: 300px;
            background: rgb(1,162,255);
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

        .icon {
            border-radius: 50%;
            width: 100px;
        }

        .add-button{
          
            border: none;
            border-radius: 10px;
            height: 40px;
            width:100px;
        }


    </style>


</head>

<body>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center">

            <div
                class="cards-mobile col-lg-2 col-md-4 col-11 m-4   col-lg-2 col-md-4 col-11 m-4 d-flex flex-column align-items-center  ">
                <div class="forground d-flex flex-column align-items-center ">
                    <h2 class="mt-2">Asus</h2>
                    <img src="assets/accessories.jpg" alt="" srcset="" class="icon">

                    <h5 class="mt-2">
                      Keyboard
                    </h5>
                    <button class="add-button m-3 btn-primary">Request</button>
                </div>
            </div>
            
 
        </div>
    </div>

</body>

