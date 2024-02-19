<?php
namespace Theme;

class Admin {

    public function __construct() {
        add_action('admin_enqueue_scripts', [$this, 'load_media_uploader_scripts']);
        add_action('show_user_profile', [$this, 'add_custom_person_user_profile_fields']);
        add_action('edit_user_profile', [$this, 'add_custom_person_user_profile_fields']);
        add_action('personal_options_update', [$this, 'save_custom_person_user_profile_fields']);
        add_action('edit_user_profile_update', [$this, 'save_custom_person_user_profile_fields']);
    }

    public function load_media_uploader_scripts($hook) {
        if ($hook != 'profile.php' && $hook != 'user-edit.php') {
            return;
        }
        wp_enqueue_media();
    }

    public function add_custom_person_user_profile_fields($user) {
        ?>
        <table class="form-table" id="custom-image-table">
            <tr>
                <th>
                    <label for="custom_person_image"><?php _e("Custom Image", "blogdynamic"); ?></label>
                </th>
                <td>
                    <?php $custom_person_image = get_option('custom_person_image', ''); ?>
                    <input type="button" class="button" id="custom_person_image_button" value="<?php _e('Upload Image', 'blogdynamic'); ?>" />
                    <input type="button" class="button" id="custom_person_image_remove_button" value="<?php _e('Remove Image', 'blogdynamic'); ?>" style="<?php echo $custom_person_image ? '' : 'display:none;'; ?>" />
                    <input type="hidden" id="custom_person_image" name="custom_person_image" value="<?php echo esc_attr($custom_person_image); ?>" />
                    <div id="custom_person_image_preview"><?php if ($custom_person_image): ?><img src="<?php echo esc_attr($custom_person_image); ?>" style="max-width:100px;" /><?php endif; ?></div>
                </td>
            </tr>
        </table>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                // Move custom image field to the top
                var customImageTable = $('#custom-image-table');
                customImageTable.insertBefore($('.user-description-wrap').parent());
    
                // Image upload functionality
                $('#custom_person_image_button').click(function(e) {
                    e.preventDefault();
                    var imageUploader = wp.media({
                        'title': 'Upload Image',
                        'button': {
                            'text': 'Use this image'
                        },
                        'multiple': false
                    }).on('select', function() {
                        var attachment = imageUploader.state().get('selection').first().toJSON();
                        $('#custom_person_image').val(attachment.url);
                        $('#custom_person_image_preview').html('<img src="'+attachment.url+'" style="max-width:100px;" />');
                        $('#custom_person_image_remove_button').show();
                    }).open();
                });
    
                // Image remove functionality
                $('#custom_person_image_remove_button').click(function(e) {
                    e.preventDefault();
                    $('#custom_person_image').val('');
                    $('#custom_person_image_preview').html('');
                    $(this).hide();
                });
            });
        </script>
        <?php
    }

    public function save_custom_person_user_profile_fields($user_id) {
        if (!current_user_can('edit_user', $user_id)) {
            return false;
        }
        if(!array_key_exists('custom_person_image', $_POST) || empty($_POST['custom_person_image']))
        {
            delete_option('custom_person_image');
        } else {
            update_option('custom_person_image', $_POST['custom_person_image']);
        }
    }
}
