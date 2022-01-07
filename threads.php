<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Discuss!!! - Coding Forums</title>
    
    <style>
        #ques{
            min-height:433px;
        }
    </style>
</head>

<body>
    <?php include 'partials/_nav.php';?>
    <?php include 'partials/_dbconnect.php';?>
    <?php
        $id=$_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE category_id=$id";
        $result = mysqli_query($conn,$sql);
        
        while($row=mysqli_fetch_assoc($result)){
            $catname=$row['category_name'];
            $catdesc=$row['category_description'];
        }
    ?>

    <div class="container my-4" id="ques">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname;?> Forum</h1>
            <p class="lead"><?php echo $catdesc;?> </p>
            <hr class="my-4">
            <p>This is peer to peer forum for sharing knowledge with each other.</p>
            <a href="" class="btn btn-primary btn-lg" role="button">Learn More</a>
        </div>
    </div>
    <div class="container" id="ques">
        <h1 class="py-2">Browse Questions</h1>

        <?php
        $id=$_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id =$id";
        $result = mysqli_query($conn,$sql);
        
        while($row=mysqli_fetch_assoc($result)){
            $title=$row['thread_title'];
            $desc=$row['thread_desc'];
            $id=$row['sr.no'];
            echo'<div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="img/user.jpeg" width="50px" alt="..."></div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="mt-0"><a class="text-dark" href="thread.php">'.$title.'</h5></a>
                        '.$desc.'
                    </div>
                </div>';        
        }
        ?>


    </div>

    <?php include 'partials/_footer.php';?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>