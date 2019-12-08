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
?>