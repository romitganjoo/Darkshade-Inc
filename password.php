<!DOCTYPE html>
<html>
    <head>

    <?php
        extract($_POST);

        if(!$USERNAME || !$PASSWORD) {
            fieldsBlank($USERNAME); //edit
            die();
        }

        // if(isset($NewUser)){
        //     if( !( $file = fopen("password.txt", "a"))){
        //         print("<title>Error</title></head><body> Could Not open password file</body></html>");
        //         die();
        //     }

        // fputs( $file, "$USERNAME, $PASSWORD\n");
        // userAdded($USERNAME);
        // }

        else{
            if(!($file= fopen("password.txt", "r"))){
                print("<title>Error</title></head><body> Could Not open password file</body></html>");
                die();
            }
        $userVerified = 0;

        while(!feof($file) && !$userVerified){
            $line = fgets($file,255);

            $line = chop($line);

            $field = explode(",", $line, 2);

            if ( $USERNAME = $field[0]) {
                $userVerified = 1;

                if (checkPassword($PASSWORD, $field) == true)
                    accessGranted($USERNAME);
                else
                    wrongPassword($PASSWORD); //edit
            }
        }
            fclose($file);
            
            if( !$userVerified)
                accessDenied($USERNAME); //edit
        }

        function checkPassword($userPassword, $filedata)
        {
        
            if ($userPassword == $filedata[1])
                return true;
            else
                return false;

        }
        
        function accessGranted($name)
        {
            print("<title> Thank you </title></head><body><strong>Permission has been granted, $name. <br /> Enjoy the site </strong>");
        }

        function wrongPassword($name)
        {
            print("<title> Thank you </title></head><body><strong>You entered an invalid password.<br /> Access Denied </strong>");
        }

        function accessDenied($name)
        {
            print("<title> Thank you </title></head><body><strong>You were denied to the server. <br /></strong>");

        }

        function fieldsBlank($name)
        {
            print("<title> Thank you </title></head><body><strong>Please Fill in all form fields<br /></strong>");
        }
    
    ?>
    </body>
</html>