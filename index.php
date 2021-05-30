<?php 
header ('Content-Type: image/png');

function renderFile($name = 'placeholder') {
  $file = __DIR__ . '/images/' . $name . '.png';
    if(!file_exists($file)) {
      renderFile('placeholder');      
    }
    echo file_get_contents($file);
    exit;
}

if(isset($_GET['email']) && $email = $_GET['email']) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    list($name, $domain) = explode('@', $email);
    renderFile($name);
  }  
}

renderFile();
