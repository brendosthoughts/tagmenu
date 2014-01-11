<?php 
function print_tail($headerType, $toRoot){ ob_start(); ?>
		<script src="<?=$toRoot?>js/classie.js"></script>
		<script src="<?=$toRoot?>js/mlpushmenu.js"></script>
		<script src="<?=$toRoot?>js/uisearch.js"></script>
		<script src="<?=$toRoot?>js/nav-dropdown.js"></script>
		<script src="<?=$toRoot?>js/setup.js"></script>
		</body></html>
<?php
    return ob_end_flush();
} ?>
