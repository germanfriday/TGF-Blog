<?php

/*
$Id: barcode_reader_list.php 135237 2009-07-15 07:24:28Z jamesgpearce $

$URL: http://svn.wp-plugins.org/wordpress-mobile-pack/tags/1.1.1/plugins/wpmp_barcode/barcode_reader_list.php $

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

function wpmp_barcode_barcode_reader_list() {
  return array(
    "Active Print"  => "http://www.activeprint.org/glass.html",
    "BeeTagg"       => "http://www.beetagg.com/downloadreader/",
    "Google"        => "http://code.google.com/p/zxing",
    "i-nigma"       => "http://www.i-nigma.com/personal/GetReader.asp",
    "Kaywa"         => "http://reader.kaywa.com/getit",
    "Nokia"         => "http://mobilecodes.nokia.com/index.htm",
    "QuickMark"     => "http://www.quickmark.com.tw/En/basic/download.asp",
    "UpCode"        => "http://www.upcode.co.uk/page/1346211",
  );
}

?>
