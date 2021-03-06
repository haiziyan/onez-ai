<?php

/* ========================================================================
 * $Id: add_input.php 2315 2016-09-07 08:37:22Z onez $
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
define('CUR_URL','/rules_group/index.php');

$groupid=(int)onez()->gp('groupid');
$group=onez('db')->open('rules_group')->one("groupid='$groupid'");

$deviceid=(int)onez()->gp('deviceid');
$device=onez('db')->open('devices')->one("deviceid='$deviceid'");

$item=array();
$G['title']='选择数据类型';

list($dtoken)=explode('|',$device['device_token']);


$record=onez('db')->open('devices')->record("1");
onez('admin')->header();
?>
<section class="content-header">
  <h1>
    <?=$G['title']?>
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="<?php echo onez()->href('/')?>">
        <i class="fa fa-dashboard">
        </i>
        管理首页
      </a>
    </li>
    <li>
      <a href="<?php echo onez()->href('/rules_group/index.php')?>">
        <?=$group['subject']?>
      </a>
    </li>
    <li>
      <a href="<?php echo onez()->href('/rules/index.php?groupid='.$groupid)?>">
        规则管理
      </a>
    </li>
    <li>
      <a href="<?php echo onez()->href('/rules/add_device.php?groupid='.$groupid.'&deviceid='.$deviceid)?>">
        选择终端(<?=$device['subject']?>)
      </a>
    </li>
    <li class="active">
      <?php echo $G['title'];?>
    </li>
  </ol>
</section>
<section class="content">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">
        假设数据类型是
      </h3>
      <div class="box-tools pull-right">
      </div>
    </div>
    <div class="box-body  table-responsive no-padding">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>
              数据类型
            </th>
            <th>
          </tr>
        </thead>
        <tbody>
          <?php
          $record=onez($dtoken)->input_types();
          foreach($record as $k=>$rs){?>
          <tr>
            <td>
              <?=$k+1?>、
              <a href="<?php echo onez()->href('/rules/add_design.php?groupid='.$groupid.'&deviceid='.$deviceid.'&input_type='.$rs['type'].'&input_typename='.urlencode($rs['name']))?>">
                <?php echo $rs['name'];?>
              </a>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?php
onez('admin')->footer();
?>