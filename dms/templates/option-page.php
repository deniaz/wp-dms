<div class="wrap">
    <?php echo screen_icon(); ?>
    <h2>Domain Map System Configuration</h2>
    <div class="updated">
        <p><strong>Warning!</strong></p>
        <p>Only change these settings when you're <em>absolutely</em> sure what you're doing. Changing these settings might break the internet. Seriously.</p>
    </div>
        <fieldset style="border: 1px solid #ddd; padding-bottom: 20px; margin-top: 20px;">
            <legend style="margin-left: 5px; padding: 0 5px; color: #09C; text-transform: uppercase; font-weight: bold;">
                DMS Map
            </legend>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label>Domains</label>
                    </th>
                </tr>
                    <?php
                         $string = get_option('dms_map');
                         parse_str($string, $map);
         
                         foreach ($map as $key => $value)
                         {
                             ?>
                             <tr>
                                 <th></th>
                                 <td>
                                     <input type="text" class="regular-text dms-collect-key" value="<?php echo str_replace("_", ".", $key); ?>" />
                                     <?php
                                         $args    = array(
                                             'selected' => (int) $value,
                                             'show_option_none' => '- Select -'
                                         );

                                         wp_dropdown_pages($args);
                                     ?>
                                     <button class="dms-delete-row" title="Delete" style="padding: 0; cursor: pointer; background: transparent; border: 0; font-size: 16px; font-weight: bold; line-height: 18px; color: #000; text-shadow: 0 1px 0 #fff; opacity: 0.3;">&times;</button>
                                 </td>
                             </tr>
                             <?php 
                         }
                    ?>
                    <tr id="dms-new-domain">
                    <th></th>
                    <td>
                        <input type="text" class="regular-text dms-collect-key" placeholder="www.example.com" />
                        <?php
                            $args    = array(
                                'selected' => 0,
                                'show_option_none' => '- Select -'
                            );
                            wp_dropdown_pages($args); 
                        ?>
                        <button class="dms-delete-row" title="Delete" style="padding: 0; cursor: pointer; background: transparent; border: 0; font-size: 16px; font-weight: bold; line-height: 18px; color: #000; text-shadow: 0 1px 0 #fff; opacity: 0.3;">&times;</button>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <strong><a class="dms-add-row" href="#">+ Add Domain Map Entry</a></strong>
                    </td>
                </tr>
            </table>
        </fieldset>
    <form method="post" action="options.php">
        <?php
            settings_fields('dms_config');
        ?>
        <input type="hidden" id="dms_map" name="dms_map" value="<?php echo get_option('dms_map'); ?>" />
        <p class="submit">
            <input type="submit" class="button-primary" value="Save" id="dms-submit-config" />
        </p>
    </form>
    <pre>
    <?php
        $jsFile = plugins_url('../collector.js', dirname(__FILE__)) . '/collector.js'; 
    ?>
    </pre>
    <script type="text/javascript" src="<?php echo $jsFile; ?>"></script>
</div>
