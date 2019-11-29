<?php
    
    //create connection to database
    function createConnection(){
        
        // initialization variable
        $server         = 'localhost';
        $username       = 'harmonia_haris';
        $password       = 'Suikoden108SoD';
        $database   = 'harmonia_moodle';
        
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
    
     // function for accessing query in database
    function query2($connection, $sql){
        
        // accessing query
    	$result  = $connection->query($sql);
    	
    	$data = array();
        
          while ($row = $result->fetch_assoc()) {
        
            array_push($data, $row);
          }
	   
	   // return result
	    return $data;

    }
    
    //function for selection query for showing data
    function selectionQuery($selection){
        
        $sql = NULL;
        
        //condition for showing data Send & Reply 
        if($selection == "Send & Reply"){
            
            $sql    = "SELECT 
                	mdl_course.fullname AS courseName,
                	mdl_groups.id AS groupID, 
                	mdl_groups.name AS groupName,  
                	mdl_user.id AS membersUserID, 
                	mdl_user.firstname AS memberFirstname, 
                	mdl_user.lastname AS memberLastname,
                	count(mdl_forum_discussions.id) AS Sent,
                	Post.postCount AS Reply
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
                # AND 
                # 	mdl_groups.id = 46
                GROUP BY
                	mdl_forum_discussions.userid
                ORDER BY 
                	mdl_groups.id,
                	mdl_forum_discussions.name ASC";
        
        //condition for showing data Tree
        }else if($selection == "Tree"){
            
            $sql = "SELECT 
                        mdl_course.fullname AS courseName,
                        mdl_groups.name AS groupName,  
                        mdl_user.id AS membersUserID, 
                        mdl_user.firstname AS memberFirstname, 
                        mdl_user.lastname AS memberLastname,
                		mdl_forum_posts.id AS childId,
                		mdl_forum_posts.parent AS parentId,
                        --mdl_forum_posts.message AS Message
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
                        mdl_forum_posts
                    ON
                        mdl_forum_posts.userid = mdl_user.id
                    WHERE
                        mdl_role_assignments.roleid != 3
                    AND
                        mdl_course.id = 8
                    # AND 
                    # 	mdl_groups.id = 46
                    GROUP BY
                        mdl_forum_discussions.userid,
                        mdl_forum_posts.message
                    ORDER BY 
                        mdl_groups.id,
                        mdl_forum_discussions.name ASC";
            
        }
        
        return $sql;
    }
    
    //function for showing data
    function showData($data){
        
        // initialization array
        $result['Arsitektur Komputer'] = array();
        
	   $groupID = NULL;
	   $groupName = NULL;
	   
	   $temp = array();
	   
	    while ($row = $data->fetch_assoc()) {
        
            echo $row["courseName"]." ".
             $row["groupID"]." ".
             $row["groupName"]." ".
             $row["membersUserID"]." ".
             $row["memberFirstname"]." ".
             $row["memberLastname"]." ".
             $row["Sent"]." ".
             $row["Reply"]."<br/>";
             
            if($groupID == NULL){
                 
                $groupID = $row['groupID'];
                $groupName = $row["groupName"];
                
                array_push($temp, $row);
                
            }else if($groupID == $row['groupID']){
                 
                array_push($temp, $row);
                
            }else{
                
                // array_push($temp, $row);
                $groupNameArray[$groupName] = $temp;
                
                // unset($temp);
                $temp = array();
                array_push($temp, $row);
                 
                $groupID = $row['groupID'];
                $groupName = $row["groupName"];
            }
        }
        
        $groupNameArray[$groupName] = $temp;

	    $result['Arsitektur Komputer'] = $groupNameArray;
	    
	    return $result;
	    
    }
    
    function buildTree(array $elements, $parentId) {
        
        $branch = array();
    
        foreach ($elements as $element) {
            if ($element['parentId'] == $parentId) {
                $children = buildTree($elements, $element['parent']);
                if (isset($children)) {
                    $element['chilId'] = $children;
                
                    echo $element['parentId']."<br/>";
                }
                $branch[] = $element;
            }
        }
    
        return $branch;
    }
    
    
    ini_set('memory_limit', '1000M');
    
    //creating connection to database            	
    $connection = createConnection();
    
    //select Send & Reply Query
    // $sql = selectionQuery("Send & Reply");
    $sql = selectionQuery("Tree");
    
    //accessing data from database
    $result   = query2($connection, $sql);
    
    //show data
    // $data = showData($result);
    $counter = 0;
    
    // $data = array();
    $data = buildTree($result, 0);
    
    // foreach($result as $row){
        
    //     // echo "<pre>";
    //     //     print_r($row);
    //     // echo "</pre>";
    
    //     $data = buildTree($data, $row['parentId']);
    // // //     // $counter++;
    // }
    

    echo "<pre>";
        print_r($data);
        // print_r($result);
    echo "</pre>";
    
    $connection->close();
?>