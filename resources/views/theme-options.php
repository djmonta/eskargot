<div class="wrap">

  <h2>テーマ設定</h2>

  <form method="post" action="options.php">
    <?php settings_fields( 'eskargot-option-group' ); do_settings_sections( 'eskargot-option-group' ); ?>

    <table class="form-table">
      <tr>
        <th scope="row"><label for="facebook">Facebook</label></th>
        <td><input type="text" name="facebook" id="facebook" class="regular-text" value="<?php echo esc_attr( get_option('facebook') ); ?>">
          Facebook URL
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="twitter">Twitter</label></th>
        <td><input type="text" name="twitter" id="twitter" class="regular-text" value="<?php echo esc_attr( get_option('twitter') ); ?>">
          Twitter URL
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="instagram">Instagram</label></th>
        <td><input type="text" name="instagram" id="instagram" class="regular-text" value="<?php echo esc_attr( get_option('instagram') ); ?>">
          Instagram URL
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="youtube">YouTube</label></th>
        <td><input type="text" name="youtube" id="youtube" class="regular-text" value="<?php echo esc_attr( get_option('youtube') ); ?>">
          YouTube URL
        </td>
      </tr>

      <tr>
        <th scope="row"><label for="front_page_content">GOODS</label></th>
        <td>
          <input type="text" name="goods" id="goods" class="regular-text" value="<?php echo esc_attr( get_option('goods') ); ?>">
          GOODSサイトのURLを入力してください。
        </td>
      </tr>
      <tr>
        <th scope="row">&nbsp;</th>
        <td>&nbsp;</td>
      </tr>
  </table>

  <?php submit_button(); ?>

  </form>

</div>
