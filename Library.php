<?php

    //create connection to database
    function createConnection(){
        
        // initialization variable
        $server         = 'localhost';
        $username       = 'harmonia_haris';
        $password       = 'Suikoden108SoD';
        $database       = 'harmonia_moodle';
        
        // create connection accessing database
        $connection = new mysqli($server, $username, $password, $database);
        
        // condition when connection error
        if ($connection->connect_errno) {
            
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        
        //condition when connection is not error
        }else{
      
            // return the connection
            return $connection;
        }
    }

    // function for accessing query in database
    function query($connection, $sql){
        
        // accessing query
    	$result  = $connection->query($sql);
	   
	   // return result
	    return $result;

    }

    // function for accessing query sent
    function sent($groupID){

        //creating connection to database            	
        $connection = createConnection();

        //the query.....
        $sql =  "SELECT   
                    mdl_user.id AS UserID, 
                    count(mdl_forum_discussions.id) AS Sent
                FROM
                    mdl_groups 
                INNER JOIN 
                    mdl_course
                ON
                    mdl_groups.courseid = mdl_course.id
                INNER JOIN
                    mdl_groups_members
                ON
                    mdl_groups_members.groupid = mdl_groups.id
                INNER JOIN
                    mdl_user
                ON
                    mdl_groups_members.userid = mdl_user.id
                INNER JOIN 
                    mdl_role_assignments
                ON
                    mdl_role_assignments.userid = mdl_user.id
                INNER JOIN
                    mdl_forum_discussions
                ON
                    mdl_forum_discussions.course = mdl_course.id
                AND
                    mdl_forum_discussions.groupid = mdl_groups.id
                AND
                    mdl_forum_discussions.userid = mdl_user.id
                WHERE
                    mdl_role_assignments.roleid != 3
                AND
                    mdl_course.id = 8
                AND 
                    mdl_groups.id = {$groupID}
                GROUP BY
                    mdl_forum_discussions.userid
                ORDER BY 
                    mdl_forum_discussions.id DESC";

        // access the query....
        $result = query($connection, $sql);

        //return the result...
        return $result;
    }

    // function for accessing query replied
    function replied($groupID){

        //creating connection to database            	
        $connection = createConnection();

        //the query.....
        $sql =  "SELECT   
                    mdl_user.id AS UserID, 
                    Post.postCount AS Replied
                FROM
                    mdl_groups 
                INNER JOIN 
                    mdl_course
                ON
                    mdl_groups.courseid = mdl_course.id
                INNER JOIN
                    mdl_groups_members
                ON
                    mdl_groups_members.groupid = mdl_groups.id
                INNER JOIN
                    mdl_user
                ON
                    mdl_groups_members.userid = mdl_user.id
                INNER JOIN 
                    mdl_role_assignments
                ON
                    mdl_role_assignments.userid = mdl_user.id
                INNER JOIN
                    mdl_forum_discussions
                ON
                    mdl_forum_discussions.course = mdl_course.id
                AND
                    mdl_forum_discussions.groupid = mdl_groups.id
                AND
                    mdl_forum_discussions.userid = mdl_user.id
                INNER JOIN
                	(SELECT
                		userid,
                		count(*) AS postCount
                	FROM
                		mdl_forum_posts
                	WHERE
                		parent != 0
                	GROUP BY
                		userid) Post
                ON
                	Post.userid = mdl_user.id
                WHERE
                    mdl_role_assignments.roleid != 3
                AND
                    mdl_course.id = 8
                AND 
                    mdl_groups.id = {$groupID}
                GROUP BY
                    mdl_forum_discussions.userid
                ORDER BY 
                    Post.postCount DESC";

        // access the query....
        $result = query($connection, $sql);

        //return the result...
        return $result;
    }

    // function for getting Username
    function getUserName($userID){
        
        //creating connection to database            	
        $connection = createConnection();

        $sql = "SELECT 
                    firstname, lastname
                FROM
                    mdl_user
                WHERE
                    id = {$userID}";
                    
        // access the query....
        $result = query($connection, $sql);

        while ($row = $result->fetch_assoc()) {
            
            $name =  $row['firstname']." ".$row['lastname'];
        }  

        //return the result...
        return $name;
        
    }    

    // Create tree
	function createTree(&$list, $parent){

        $tree = array();

        foreach ($parent as $k=>$l){

            if(isset($list[$l['id']])){

                $l['children'] = createTree($list, $list[$l['id']]);
            }

            $tree[] = $l;
        } 

        return $tree;
    }

    // Count rating from branch
    function countRating($branch, $connection){

        global $ratings;
        
        // Get parent
        $sql="SELECT * FROM `mdl_forum_posts` WHERE `id` =" . $branch['parent'] . "";
    	$query=mysqli_query($connection, $sql);
    	$data=mysqli_fetch_assoc($query);
    	
        $rating = 0;
        if ($data['userid']){
            if (strpos($branch['message'], "<p>*") !== false){
                $index = 3;
                while ($branch['message'][$index] === "*"){
                    $rating += 1;
                    $index += 1;
                }
            }
            
            if (array_key_exists($data['userid'], $ratings)){
                $ratings[$data['userid']] += $rating;
            }else{
                $ratings[$data['userid']] = $rating;
            }
        }
    }
    
    // This is where magic happens
    function createCustomLinkArray($tree, $userTemp, $connection){
        global $result, $ratings;
        
        foreach($tree as $index=>$branch){
            if (isset($tree[$index]["children"])){
                // Push result and rating
                array_push($userTemp, $tree[$index]['userid']);
                countRating($tree[$index], $connection);
                
                // Recursion
                createCustomLinkArray($tree[$index]["children"], $userTemp, $connection);
            }else{
                // Push result and rating
                array_push($userTemp, $tree[$index]['userid']);
                countRating($tree[$index], $connection);
                
                // Push result to global variable
                array_push($result, $userTemp);
                
                // foreach($userTemp as $post){
                //     $sql="SELECT `firstname`, `lastname` FROM `mdl_user` WHERE `id` =" . $post['userid'] . "";
    
                // 	$query=mysqli_query($connection, $sql);
                // 	$data=mysqli_fetch_assoc($query);
                // 	print_r($data);
                // }
            }
            
            // Pop temp result
            array_pop($userTemp);
        }
    }
    
    
    
    
    
    // }

    // collaboration();


    // getUserName(219);
?>