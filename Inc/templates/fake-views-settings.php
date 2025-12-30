<div id="tab-1" class="tab-div active">
    <form method="post" action="options.php">
        <?php 
            settings_fields( 'fake_views_option_group' );
            do_settings_sections( 'options-general.php?page=fake_views_settings' );
            submit_button();
        ?>
    </form>
</div>