<?php
$archive_title = '';
if ( is_archive() ) {
	$archive_title = get_the_archive_title();
}
?>
<div class="card card--note">
<?php
    if ( $archive_title ) {
        echo '<h1 class="card__heading">'. $archive_title. '</h1>';
    }
?>
</div>