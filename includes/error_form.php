<script>	
        <?php
        if ( isset($_SESSION['errormsg']) ) {
        ?>
                var field = document.getElementById('<?= $_SESSION['formfield'] ?>');
                field.placeholder = '<?= $_SESSION['errormsg'] ?>';
    
                field.setAttribute('style', 'color: red; border-color: red; background-color: #ef7e7e36;');
                field.focus(); //@todo: focus on the first 'mistake-field'!
        <?php
        } 
        ?>			
</script>