<?php

/* ========================================================================
 * $Id: button.php 928 2016-09-17 22:32:49Z onez $
 * http://ai.onez.cn/
 * Email: www@onez.cn
 * QQ: 6200103
 * ========================================================================
 * Copyright 2016-2016 佳蓝科技.
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ======================================================================== */


!defined('IN_ONEZ') && exit('Access Denied');
class onezphp_admin_widgets_button extends onezphp_admin_widgets{
  function __construct(){
    
  }
  function code(){
    $type=$this->get('type','button');
    $class=$this->get('class');
    $style=$this->get('style');
    !$style && $style='btn-success';
    $name=$this->get('name','确定');
    
    $color=$this->get('color');
    if($color=='blue'){
      $style='btn-info';
    }elseif($color=='red'){
      $style='btn-danger';
    }elseif($color=='green'){
      $style='btn-success';
    }
    
    $event=$this->get('event');
    if($event){
      $attrs.=' onclick="'.$event.'"';
    }
    $myattrs=$this->get('attrs');
    if($myattrs){
      foreach($myattrs as $k=>$v){
        $attrs.=' '.$k.'="'.$v.'"';
      }
    }
    $this->html.='<button type="'.$type.'" class="btn '.$style.' '.$class.'"'.$attrs.'>'.$name.'</button>';
    return $this->html;
  }
}