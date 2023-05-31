<?php
    include('./feedback_script.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!--======= poppins font =================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0px;
            padding: 0px;
            font-family: poppins;
        }
        a{
            text-decoration: none;
        }
        #testimonials{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
        }
        .testimonial-heading{
            letter-spacing: 1px;
            margin: 30px 0px;
            padding: 10px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .testimonial-heading h1{
            font-size: 2.2rem;
            font-weight: 500;
            background-color: #202020;
            color: #ffffff;
            padding: 10px 20px;
        }
        .testimonial-heading span{
            font-size: 1.3rem;
            color: #252525;
            margin-bottom: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .testimonial-box-container{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            width: 100%;
        }
        .testimonial-box{
            width: 500px;
            box-shadow: 3px 3px 30px rgba(0,0,0,0.1);
            background-color: #ffffff;
            padding: 50px;
            margin: 0;
            cursor: pointer;
        }
        .profile-img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }
        .profile-img img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        .profile{
            display: flex;
            align-items: center;
        }
        .name-user{
            display: flex;
            flex-direction: column;
        }
        .name-user strong{
            color: #3d3d3d;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }
        .name-user span{
            color: #979797;
            font-size: 0.8rem;
        }
        .reviews{
            color: #f9d71c;
        }
        .box-top{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .client-comment p{
            font-size: 0.9rem;
            color: #4b4b4b;
        }
        .testimonial-box:hover{
            transform:translateY(-10px);
            transition: all ease 0.3s;
        }

        @media(max-width:1060px){
            .testimonial-box{
                width:45%;
                padding: 10px;
            }
        }
        @media(max-width:790px){
            .testimonial-box{
            width: 100%; 
            }
            .testimonial-heading h1{
                font-size: 1.4rem;
            }
        }
        @media(max-width:340px){
            .box-top{
                flex-wrap:wrap;
                margin-bottom: 10px;
            }
            .reviews{
                margin-top: 10px;
            }
        }
                .bt-sub{
                    padding: 10px 0 0 100px;
                }
                .fb-form{
                    margin: 10px;
                }
       
    </style>
</head>
<body> 
 <!-- ========================================= Back Arrow to order food ================================================== -->
    <div><a href="../order_food/orderfood.php?order_id=<?php echo $order_id ?>"><img src="../svg/front/back_logo.svg"alt=""></a></div>  
        <!--==================================== Heading =====================================================-->
        <div class="testimonial-heading">
            <span>Comments</span>
            <h1>Clients Says</h1>
        </div>

        <table>
            <tbody>
                
                   <?php
                if(count($fetchData)>0){
                    $no=1;
                    foreach($fetchData as $data){   
                ?>
                <tr>
                    <!--================= Testimonials Box Container ======================-->
                    <div class="testimonial-boc-container" style="width=300px; height=190px;">
                        <!--======= Box 1 =============-->
                        <div class="testimonial-box">
                            <!--======Top==============-->
                            <div class="box-top">
                                <!--==== Profile ======-->
                                <div class="profile">
                                    <!--====== img =========-->
                                    <div class="profile-img">
                                        <img src="../image/profile.jpg">
                                    </div>
                                    <!--===== Date and Time ======-->
                                    <div class="name-user">          
                                        <strong>Date : <?php echo $data['feedback_date']; ?></strong>
                                    </div>
                                </div>
                                
                            </div>
                            <!--======== Feedback showing ========-->
                            <div class="client-comment">
                                <textarea readonly rows="4" cols="45" style="border:none;"><?php echo $data['feedback']; ?></textarea>
                            </div> 
                        </div>
                    </div> 
                    </tr>
            
            <?php
                $no++;
                    }
                }else{
            ?>
                <tr>
                    <td colspan="7">ไม่พบข้อมูล</td>
                </tr>      
                <?php
                    }
                ?>
            </tbody>
        </table>
        
     <!-- =================================== Comment form || Button Submit ================================================ -->
           <form  method="post" >
                 <div class="fb-form">
                     <textarea id="feedback_input"  name="feedback_input" rows="4" cols="45" maxlength="180"></textarea>
                     <input type="hidden" name="feedback_order_id" value="<?php echo $order_id ?>">  
                 </div>
                 
                 <div class="bt-sub">
                     <button type="submit" class="btn btn-success"name="create" >Submit Feedback</button>   
                 </div>     
            </form> 
        
             
       
             
        

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!--================= Font Awesome ===============-->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</body>
</html>