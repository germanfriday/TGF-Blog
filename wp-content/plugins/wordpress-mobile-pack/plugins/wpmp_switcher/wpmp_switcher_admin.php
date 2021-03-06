<?php

/*
$Id: wpmp_switcher_admin.php 135237 2009-07-15 07:24:28Z jamesgpearce $

$URL: http://svn.wp-plugins.org/wordpress-mobile-pack/tags/1.1.1/plugins/wpmp_switcher/wpmp_switcher_admin.php $

Copyright (c) 2009 mTLD Top Level Domain Limited

Online support: http://mobiforge.com/forum/dotmobi/wordpress

This file is part of the WordPress Mobile Pack.

The WordPress Mobile Pack is Licensed under the Apache License, Version 2.0
(the "License"); you may not use this file except in compliance with the
License.

You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software distributed
under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
CONDITIONS OF ANY KIND, either express or implied. See the License for the
specific language governing permissions and limitations under the License.
*/

?>

<div class="wrap">
  <h2>
    <?php _e('Mobile Switcher') ?>
    <p style='font-size:small;font-style:italic;margin:0'>
      <?php _e('Part of the WordPress Mobile Pack'); ?>
    </p>
  </h2>
  <form method="post" action="">
    <table class="form-table">
      <tr>
        <th><?php _e('Switcher mode'); ?></th>
        <td>
          <?php print wpmp_switcher_option('wpmp_switcher_mode', 'wpmpSwitcherMode();'); ?>
          <br />
          <?php _e('The switcher can detect whether the user is using a mobile device or has requested a mobile domain. It will switch theme accordingly.'); ?>
        </td>
      </tr>
      <tr class='wpmp_theme'>
        <th><?php _e('Mobile theme'); ?></th>
        <td>
          <?php print wpmp_switcher_option('wpmp_switcher_mobile_theme'); ?>
          <br />
          <?php _e('The theme that will be sent to a mobile user. Desktop users will receive '); ?>
          <a href='/wp-admin/themes.php' target='_blank'><?php print wpmp_switcher_desktop_theme(); ?></a>
        </td>
      </tr>
      <tr class='wpmp_browser'>
        <th><?php _e('Browser detection'); ?></th>
        <td><?php print wpmp_switcher_option('wpmp_switcher_detection'); ?></td>
      </tr>
      <tr class='wpmp_domain'>
        <th><?php _e('Desktop domains'); ?></th>
        <td>
          <?php print wpmp_switcher_option('wpmp_switcher_desktop_domains'); ?>
          <br />
          <?php _e('Use comma-separated domain names. eg:'); ?> <b>mysite.com, downloads.mysite.com</b>
          <br />
          <?php _e('Desktop users who mistakenly access a mobile domain will be given the option to return to the first domain in this list.'); ?>
        </td>
      </tr>
      <tr class='wpmp_domain'>
        <th><?php _e('Mobile domains'); ?></th>
        <td>
          <?php print wpmp_switcher_option('wpmp_switcher_mobile_domains'); ?>
          <br />
          <?php _e('Use comma-separated domain fragments. eg:'); ?> <b>mysite.mobi, m.mysite.com</b>
          <?php
            if (strpos(get_option('wpmp_switcher_mode'), 'domain')!==false && wpmp_switcher_domains('desktop', true) == wpmp_switcher_domains('mobile', true)) {
              print "<br /><strong style='color:#770000'>Warning</strong>: your primary desktop and mobile domains are the same. The switcher will default to 'browser detection' mode unless one is changed.";
            }
          ?>
          <br/>
          <?php _e('Mobile users who mistakenly access a desktop domain will be given the option to return to the first domain in this list.'); ?>
          <br/>
          <?php _e('<b>NB</b>: The plugin does not <i>create</i> these domains. You must be sure their DNS entries already resolve and are served by this web server.'); ?>
        </td>
      </tr>
      <tr class='wpmp_links'>
        <th><?php _e('Footer links'); ?></th>
        <td>
          <?php print wpmp_switcher_option('wpmp_switcher_footer_links'); ?>
          <br />
          <?php _e('Places a link in the theme footer to allow users to override the detection.'); ?>
          <?php _e('You can also enable the widget that contains this link.'); ?>
          <?php _e('Both the footer link and the widget will only appear when a switcher mode is enabled.'); ?>
        </td>
      </tr>
    </table>
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Changes'); ?>" />
    </p>
  </form>
</div>

<script>
  var wpmp_pale = 0.3;
  var wpmp_speed = 'slow';
  function wpmpSwitcherMode(speed) {
    if (speed==null) {speed=wpmp_speed;}
    var value = jQuery("#wpmp_switcher_mode").val();
    var browser = value.indexOf("browser")>-1;
    var domain = value.indexOf("domain")>-1;
    jQuery(".wpmp_browser").children().fadeTo(speed, browser ? 1 : wpmp_pale);
    jQuery(".wpmp_domain").children().fadeTo(speed, domain ? 1 : wpmp_pale);
    jQuery(".wpmp_theme").children().fadeTo(speed, (domain||browser) ? 1 : wpmp_pale);
    jQuery(".wpmp_links").children().fadeTo(speed, (domain) ? 1 : wpmp_pale);
    wpmpSwitcherDetection(speed);
  }
  wpmpSwitcherMode(-1);
</script>
