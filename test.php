
<?php
$receiver = "qoooppadsl@gmail.com";
$subject = "Email Test via PHP using Localhost";
$body = "Hi, there...This is a test email send from Localhost.";
$sender = "From:helloqooopp@gmail.com";
if(mail($receiver, $subject, $body, $sender)){
    echo "Email sent successfully to $receiver";
}else{
    echo "Sorry, failed while sending mail!";
}
?>

<style>
.shape-ex4{
    width: 150px;
    height: 40px;
    display: block;
    text-align: center;
    cursor: pointer;
    line-height: 40px;
    color: #000;
    background-color: transparent;
    border: 1px solid #000;
    position: relative;
    transition: all .3s linear;
}
.shape-ex4 > p{
    position: relative;
    z-index: 1;
}
.shape-ex4::before{
    content: "";
    width: 0%;
    height: 100%;
    display: block;
    background-color: #000;
    position: absolute;
    top: 0;
    right: 0;
    transition: all .3s ease;
}
.shape-ex4:hover{
    color: #fff;
}
.shape-ex4:hover::before{
    width: 100%;
}

</style>