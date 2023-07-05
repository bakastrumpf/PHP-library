<link rel="stylesheet" type="text/css" href="styles/styles-index.css">
<link rel="stylesheet" type="text/css" href="styles/styles-header.css">
<link rel="stylesheet" type="text/css" href="styles/styles-footer.css">
<link rel="stylesheet" type="text/css" href="styles/styles-contact.css">

<?php include('header.php'); ?>

<script src="contact-script.js"></script>

<div id="centar">
    <div id="contactForm">
        <form name="form" method="get" action="">
            <label for="ime">Your name:</label>
            <br>
            <input type="text" id="name" name="name" placeholder="your full name">
            <br>
            <br>
            <label for="email">Email address:</label>
            <br>
            <input type="text" id="email" name="email" placeholder="real email address">
            <br>
            <br>
            <label for="comment">Your message:</label>
            <br>
            <textarea id="comment" name="comment" rows="15" cols="75" placeholder="Your message"></textarea>
            <br>
            <br>
            <input onclick="checkData()" type="button" name="form" id="btnForm" value="SUBMIT">
        </form>
        <div id="message"></div>
    </div>
</div>

<?php include('footer.php'); ?>