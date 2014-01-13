<?php 
function print_tail($subTemplate, $toRoot){ ob_start(); ?>
		<script src="<?=$toRoot?>js/mlpushmenu.js"></script>
		<script src="<?=$toRoot?>js/uisearch.js"></script>
		<script src="<?=$toRoot?>js/nav-dropdown.js"></script>
                <script src="<?=$toRoot?>js/classie.js"></script>

        <?php if($subTemplate =="home.php"){ ?>
                <script src="<?=$toRoot?>js/homeSetup.js"></script>
        <?php }else if(($subTemplate == "category.php") || ($subTemplate == "subtag.php")){ ?>
                <script src="<?=$toRoot?>js/categorySetup.js"></script>
	<?php } ?>
		</body></html>
<?php
    return ob_end_flush();
} ?>
