<?php 
    if (count($errors) > 0) { 
?>
        <div class="message_error">
            <?php 
                foreach ($errors as $e) {
                    echo $e . "<br>";
            ?>
            <?php 
                } 
            ?>
        </div>
<?php 
    } 
?>
