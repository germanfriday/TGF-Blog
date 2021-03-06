<?php

/*
$Id: mobile_interstitial.php 135237 2009-07-15 07:24:28Z jamesgpearce $

$URL: http://svn.wp-plugins.org/wordpress-mobile-pack/tags/1.1.1/plugins/wpmp_switcher/pages/mobile_interstitial.php $

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

  include_once('mobile.php');
  wpmp_ms_mobile_top("Select site");
?>

<p>You've requested the desktop site, but you appear to have a mobile browser.</p>
<p><?php print wpmp_switcher_link('mobile', "Revert to the mobile site"); ?></p>
<p><?php print wpmp_switcher_link('desktop', "Continue to our desktop site"); ?></p>

<?php
  wpmp_ms_mobile_bottom();
?>
