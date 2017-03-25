<html>
    <head>
        <meta charset="UTF-8">
        <title>rePublic Blog</title>
        <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/plus.css">
    </head>
    <body>
        <a href='index.php'>To Index</a>
        <div class='container'>
            <h1>Da Post</h1>
            
        <?php
        require_once('query_constructor.php');
       
        $result = selectOnePost($_GET['post_id']);         
        ?>
                
        
        <div id="fullpost" class='row'>
            <div class='col-xs-12'>
            <h3>Author: <?php echo $result['autname']; ?></h3>
            <div class='fullpost_text'><?php echo $result['text']; ?></div>
            <p>Posted: <?php echo $result['post_date']; ?></p>    
            </div>
        </div>     
                       
        <?php $result = selectComments($_GET['post_id']); ?>
        <div id='comment_section' class='row'>
            <div class='col-md-10 col-md-offset-1'>
            <h2><?php echo count($result); ?> comments</h2>
            <hr>
            <?php
        if(count($result)>0){
        foreach($result as $res)
        {           
        ?>
        
        <div class="comment">
            <h4>Author: <?php echo $res['com_auth_name']; ?></h4>
            <p><?php echo $res['com_text']; ?></p>
            <p>Posted: <?php echo $res['com_date']; ?></p>            
        </div>    
            
        <?php
        }
        }
        ?>
            </div>
        </div>             
        
    <div id='addcomform' class='row'>
        <div class='col-md-8 col-md-offset-2'>
            <h2>Add Comment:</h2>
        <form action="" method="post">  
  <p><input type="text" placeholder="Author" name="author" maxlength="50" required></p>
  <p><textarea type="text" placeholder="Text" rows='10' name="comment" maxlength="200" required></textarea></p>  
  <p><input type="submit" name="addcom" class='btn btn-default'></p>
 </form>
       </div>
       </div>
    </div>
    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>