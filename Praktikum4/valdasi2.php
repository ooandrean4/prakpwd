<html>
 
    <head>
        <style>
        .error {color: #FF0000;}
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
 
 <body>
    <?php
        // define variables and set to empty values
        $namaErr = $emailErr = $genderErr = $websiteErr = "";
        $nama = $email = $gender = $comment = $website = "";
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nama"])) {
                $namaErr = "Nama harus diisi";
             }else {
                $nama = test_input($_POST["nama"]);
            }
    
            if (empty($_POST["email"])) {
            $emailErr = "Email harus diisi";
            }else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Email tidak sesuai format"; 
                }
            }
            if (empty($_POST["website"])) {
                $website = "";
            }else {
                $website = test_input($_POST["website"]);
            }
            
            if (empty($_POST["comment"])) {
                $comment = "";
            }else {
                $comment = test_input($_POST["comment"]);
            }
            
            if (empty($_POST["gender"])) {
                $genderErr = "Gender harus dipilih";
            }else {
                $gender = test_input($_POST["gender"]);
            }
        }
    
        function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
            return $data;
        }
    ?>
        
        <div class="container">
        <h2>Posting Komentar </h2>
        <p><span class = "error">* Harus Diisi.</span></p>
        
        <form method = "post" action = "<?php 
                echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table>
                <tr>
                    <td>Nama:</td>
                    <td><input type = "text" name = "nama">
                    <span class = "error">* <?php echo $namaErr;?></span>
                    </td>
                </tr>
            
                <tr>
                    <td>E-mail: </td>
                    <td><input type = "text" name = "email">
                    <span class = "error">* <?php echo $emailErr;?></span>
                    </td>
                </tr>
            
                <tr>
                    <td>Website:</td>
                    <td> <input type = "text" name = "website">
                    <span class = "error"><?php echo $websiteErr;?></span>
                    </td>
                </tr>
            
                <tr>
                    <td>Komentar:</td>
                    <td> <textarea name = "comment" rows = "5" cols = "40"></textarea></td>
                </tr>
                
                <tr>
                    <td>Gender:</td>
                    <td>
                    <input type = "radio" name = "gender" value = "L">Laki-Laki
                    <input type = "radio" name = "gender" value = "P">Perempuan
                    <span class = "error">* <?php echo $genderErr;?></span>
                    </td>
                </tr>
                <td>
                <input type = "submit" name = "submit" value = "Submit"> 
                </td>
            </table>
        </form>
        </div>
   
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">Komentar</th>
                        <th scope="col">Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><?php  echo $nama; ?></td>
                        <td><?php  echo $email; ?></td>
                        <td><?php  echo $website; ?></td>
                        <td><?php  echo $gender; ?></td>
                        <td><?php  echo $comment; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        </body>
</html>