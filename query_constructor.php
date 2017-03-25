<?php

  
        
        function connect(){

	mysql_connect("localhost", "root", "");
        mysql_select_db("public_blog");
		
	}
        
         function selectPosts($option)
        {        
            connect();            
            
            $nect = '';
            
            if($option == 1)
            
            { $nect = 'SELECT blogposts.*, COUNT(id_post) AS post_count '
                    . 'from blogposts LEFT JOIN comments '
                    .'ON blogposts.id = comments.id_post '
                    . 'GROUP BY blogposts.id order by blogposts.post_date;'; }
            if($option == 2)
            { $nect = ' SELECT blogposts.*, COUNT(id_post) AS post_count
    FROM blogposts LEFT JOIN comments 
    ON blogposts.id = comments.id_post
    GROUP BY blogposts.id
    ORDER BY post_count DESC LIMIT 5;'; }
            
            $result = null;		
            
            $res = mysql_query($nect);
		
            if (!$res) {                
                
                die("mySQL error: ". mysql_error());
            }
            while ($row = mysql_fetch_assoc($res)) {
                $result[] = $row;
            }      
            
            return $result;
        }
        
         function selectOnePost($id)
        {
            
            connect();
            
            $result = null;
	                   
            $nect = 'SELECT * FROM blogposts where id='.$id.';';
            
            $res = mysql_query($nect);
            
            while ($row = mysql_fetch_assoc($res)) {
                $result[] = $row;
            }  
            
            $result = $result[0];
            
            return $result;
            
        }
        
        function selectComments($post_id)
        {
            connect();
            
            $result = null;
	                   
            $nect = 'SELECT * FROM comments where id_post='.$post_id.';';
            
            $res = mysql_query($nect);
            
            while ($row = mysql_fetch_assoc($res)) {
                $result[] = $row;
            }  
            
            return $result;
        }
        
        if(isset($_POST['addpost']))
        {
            insertToPosts();
        }
        
        if(isset($_POST['addcom']))
        {
            insertToComments($_GET['post_id']);
        }
        
	 function insertToPosts()
	{	              
	    connect();  
            
            $author = mysql_real_escape_string($_POST['author']);
            $text = mysql_real_escape_string($_POST['message']);
	          
            $nect = 'INSERT INTO blogposts values (null, "'.$author.'","'.$text.'", null);';
            
            $res = mysql_query($nect);
            
            header('Location: index.php');
             
	}
        
        function insertToComments($forpost)
	{	     
	    connect();
            
            $author = mysql_real_escape_string($_POST['author']);
            $text = mysql_real_escape_string($_POST['comment']);
	                   
            $nect = 'INSERT INTO comments values (null, "'.$forpost.'","'.$author.'","'.$text.'", null);';
            
            $res = mysql_query($nect);
            
            header("Location: one_post.php?post_id=$forpost");
	             
	}
        
    
