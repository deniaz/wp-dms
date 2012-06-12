<div id="screen-meta" class="metabox-prefs" style="display: block;">
    <div id="screen-options-wrap" class="hidden" style="display: block;">
        <form id="adv-settings" action="options.php" method="post">
            <h5>Available Post Types</h5>
            <em>Select which Builtin- and Custom Post Types should be available for DMS.</em>
            <div class="metabox-prefs">
                <label for="dms_use_page">
                    <input class="hide-postbox-tog" name="dms_use_page" type="checkbox" id="dms_use_page" <?php $opt = get_option('dms_use_page'); if ($opt === 'on') { echo "checked=\"checked\""; } ?>>
                    Pages
                </label>
                <label for="dms_use_post">
                    <input class="hide-postbox-tog" name="dms_use_post" type="checkbox" id="dms_use_post" <?php $opt = get_option('dms_use_post'); if ($opt === 'on') { echo "checked=\"checked\""; } ?>>
                    Posts
                </label>
                <?php
                    $types = DMS::getCustomPostTypes();

                    foreach ($types as $type)
                    {
                        echo "<label for=\"dms_use_{$type['name']}\">";
                        $value = get_option("dms_use_{$type['name']}");
                        if ($value === 'on')
                        {
                            echo "<input class=\"hide-postbox-tog\" name=\"dms_use_{$type['name']}\" type=\"checkbox\" id=\"dms_use_{$type['name']}\" checked=\"checked\">";
                        }
                        else
                        {
                            echo "<input class=\"hide-postbox-tog\" name=\"dms_use_{$type['name']}\" type=\"checkbox\" id=\"dms_use_{$type['name']}\">";
                        }
                        echo $type["label"];
                        echo "</label>";
                        
                        if ($type['has_archive'])
                        {
                            echo "<label for=\"dms_use_{$type['name']}_archive\">";
                            $value = get_option("dms_use_{$type['name']}_archive");
                            if ($value === 'on')
                            {
                                echo "<input class=\"hide-postbox-tog\" name=\"dms_use_{$type['name']}_archive\" type=\"checkbox\" id=\"dms_use_{$type['name']}_archive\" checked=\"checked\">";
                            }
                            else
                            {
                            echo "<input class=\"hide-postbox-tog\" name=\"dms_use_{$type['name']}_archive\" type=\"checkbox\" id=\"dms_use_{$type['name']}_archive\">";
                                }
                                echo $type["label"] . " <strong>Archive</strong>";
                                echo "</label>";
                        }
                    }
                ?>
                <br class="clear">
                
                <?php
                    settings_fields('dms_config');
                ?>
                
                <p class="submit">
                    <input type="submit" class="button-primary" value="Save" />
                </p>
            </div>
        </form>
    </div>
</div>
		
<div id="screen-meta-links">		
    <div id="screen-options-link-wrap" class="hide-if-no-js screen-meta-toggle">
        <a href="#screen-options-wrap" id="show-settings-link" class="show-settings screen-meta-active">Configure DMS</a>
    </div>
</div>
<!-- Actual Stuff -->
<div class="wrap">
    <?php echo screen_icon(); ?>
    <h2>Domain Map System Configuration</h2>
    <div class="updated">
        <p><strong>Warning!</strong></p>
        <p>Only change these settings if you're <em>absolutely</em> sure what you're doing. Changing these settings might break the internet. Seriously.</p>
    </div>
        <fieldset class="dms">
            <legend>
                DMS Map
            </legend>
            <table class="form-table" id="dms-map">
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
                                     <input type="text" class="regular-text dms-collect-key" value="<?php echo str_replace("_", ".", $key); ?>" placeholder="www.example.com"/>
                                     <?php 
                                         $options = DMS::getDMSOptions();
                                     ?>
                                     <select class="dms page_id" name="page_id" data-placeholder="The choice is yours.">
                                         <option></option>
                                         <?php
                                             foreach ($options as $key => $optgroup)
                                             {
                                                 echo "<optgroup label=\"{$key}\">";
                                                 foreach ($optgroup as $option)
                                                 {
                                                     if ((int) $option['id'] === (int) $value)
                                                     {
                                                         echo "<option selected=\"selected\" class=\"level-0\" value=\"{$option['id']}\">{$option['title']}</option>";
                                                     }
                                                     else
                                                     {
                                                         echo "<option class=\"level-0\" value=\"{$option['id']}\">{$option['title']}</option>";
                                                     }
                                                 }
                                                 echo "</optgroup>";
                                             }
                                         ?>
                                     </select>
                                     
                                     <button class="dms-delete-row" title="Delete">&times;</button>
                                 </td>
                             </tr>
                             <?php 
                         }
                    ?>
                    <tr>
                    <th></th>
                    <td>
                        <input type="text" class="regular-text dms-collect-key" placeholder="www.example.com" />
                        <?php 
                                         $options = DMS::getDMSOptions();
                                     ?>
                                     <select class="dms page_id" name="page_id" data-placeholder="The choice is yours.">
                                         <option></option>
                                         <?php
                                             foreach ($options as $key => $optgroup)
                                             {
                                                 echo "<optgroup label=\"{$key}\">";
                                                 foreach ($optgroup as $option)
                                                 {
                                                     echo "<option class=\"level-0\" value=\"{$option['id']}\">{$option['title']}</option>";
                                                 }
                                                 echo "</optgroup>";
                                             }
                                         ?>
                                     </select>
                        <button class="dms-delete-row" title="Delete">&times;</button>
                    </td>
                </tr>
                <tr id="dms-add-new-tr">
                    <th></th>
                    <td>
                        <strong><a class="dms-add-row" href="#">+ Add Domain Map Entry</a></strong>
                    </td>
                </tr>
            </table>
        </fieldset>
    <form method="post" action="options.php">
        <?php
            settings_fields('dms_storage');
        ?>
        <input type="hidden" id="dms_map" name="dms_map" value="<?php echo get_option('dms_map'); ?>" />
        <p class="submit">
            <input type="submit" class="button-primary" value="Save" id="dms-submit-config" />
        </p>
    </form>
</div>
