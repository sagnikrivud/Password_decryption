 <?php 
  
// Store a string into the variable which 
// need to be Encrypted 
$simple_string = "sagnik"; 
// $simple_string = 'SELECT * FROM TABLE WHERE ID = ';
// $mysql         = mysqli_query($simple_string); @sagnik
// mysql_row      = mysql_fetch_assoc($mysql); @sagnik
//here in $simple_string  we can call the sql query on this and fetch the password row like this mysql_row['passoword']; and decrypt.
  
// Display the original string 
echo "Original String: " . $simple_string . "\n"; 
  
// Store cipher method 
$ciphering = "BF-CBC"; 
  
// Use OpenSSl encryption method @sagnik
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 
  
// Use random_bytes() function which gives 
// randomly 16 digit values 
$encryption_iv = random_bytes($iv_length); 
  
// Alternatively, we can use any 16 digit 
// characters or numeric for iv 
$encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
  
// Encryption of string process starts 
$encryption = openssl_encrypt($simple_string, $ciphering, 
        $encryption_key, $options, $encryption_iv); 
  
// Display the encrypted string 
echo "Encrypted String: " . $encryption . "\n"; 
  
// Decryption of string process starts 
// Used random_bytes() which gives randomly 
// 16 digit values 
$decryption_iv = random_bytes($iv_length); 
  
// Store the decryption key 
//Computes a digest hash value for the given data using a given method, and returns a raw or binhex encoded string. 
$decryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
  
// Descrypt the string 
$decryption = openssl_decrypt ($encryption, $ciphering, 
            $decryption_key, $options, $encryption_iv); 
  
// Display the decrypted string 
echo "Decrypted String: " . $decryption; 
  
?> 

<!-- hash decryption -->

<?php

$encryption = '$2y$10$xCvDVbwDKvU78F24UhccAe/tDhKR6cl1jGRhOCG1fZfZ9eMg9s/5e';

// if (password_verify('sagnik', $s)) {
//     //echo 'Password is valid!';
// } else {
//     //echo 'Invalid password.';
// }

// $d = password_verify($s);
// echo $d;

// $d = php_uname($s);
// echo $d;
$ciphering = "BF-CBC"; 
//echo $ciphering;
$iv_length = openssl_cipher_iv_length($ciphering);
//echo $iv_length;  //perfect
$encryption_iv = random_bytes($iv_length); 
//echo $encryption_iv;
$decryption_key = openssl_digest(php_uname(), 'HASH', TRUE); 
//echo $decryption_key;
$options = 0;
$r = openssl_decrypt($encryption,$ciphering,$decryption_key,$options,$encryption_iv);
//echo $r;

?>