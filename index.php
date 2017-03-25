<html>
    <head>
        <meta charset="UTF-8">
        <title>rePublic Blog</title>        
        <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/plus.css">
    </head>
    <body>
        
        
        
        <div class='container'>
            <h1>rePublic Blog</h1>
        <?php
        require_once('query_constructor.php');
       
        $result = selectPosts(2); 
        ?>
        <div class='row'>
            <div class='col-xs-12'>
                <h2>Most Popular:</h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
        <?php
        foreach($result as $res)
        {           
        ?>
        <div class="item">
            <!--<img style='width:100%' src='orange.png'>-->
            <h3>Author: <?php echo $res['autname']; ?></h3>
            <p><?php echo substr($res['text'], 0, 99).'...'; ?></p>
        </div>     
        
        
        <?php
        }
        ?>
            </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
            </div>
        </div>
        
        <?php
        $result = selectPosts(1);       
        ?>
        <div id='allposts' class='row'>
            
        <?php
        foreach($result as $res)
        {           
        ?>
        
        <div class="prepost col-md-6">
            <h3>Author: <?php echo $res['autname']; ?></h3>
            <p><?php echo substr($res['text'], 0, 99).'...'; ?></p>
            <p>Posted: <?php echo $res['post_date']; ?></p>
            <p>Comments: <?php echo $res['post_count']; ?></p>
            <p><a href='one_post.php?post_id=<?php echo $res['id']; ?>'>Read more</a></p>
        </div>    
            
        <?php
        }
        ?>
        </div>
            
    <div id='addpostform' class='row'>
        <div class='col-md-8 col-md-offset-2'>
            <h2>Add Post:</h2>
        <form action="" method="post">  
  <p><input type="text" name="author" placeholder="Author" maxlength="50" required></p>
  <p><textarea type="text" name="message" placeholder="Text" rows='10' maxlength="3000" required></textarea></p>  
  <p><input type="submit" name="addpost" class='btn btn-default'></p>
 </form>
    </div>
        </div>    
    </div>
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        
       $('#myCarousel .item:nth-child(1)').addClass('active'); 
        
    });
    </script>
    </body>
</html>