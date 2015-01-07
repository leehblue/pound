<?php
class LB_View {

  public static function get($filename, $data=null) {
    ob_start();
    if(isset($data) && is_array($data)) {
      extract($data);
    }
    require $filename;
    $contents = ob_get_clean();
    return $contents;
  }

}
