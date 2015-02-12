<?php $menu = $this->requestAction(array('controller' => 'Categories', 'action' => 'menu', 'admin' => false)); ?>

<ul class="nav">
  <?php foreach ($menu as $key => $m): ?>
    <?php if (empty($m['SubCategory'])): ?>
      <li><?= $this->Html->link($m['Category']['name'], $m['Category']['link']);?></li>
    <?php else: ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$m['Category']['name'];?><b class="caret"></b></a>
        <ul class="dropdown-menu">
        <li><?=$this->Html->link('Tous les articles',$m['Category']['link']);?></li>
        <li class="divider"></li>
        <?php foreach ($m['SubCategory'] as $k => $c): ?>
          <?php $c['link']['category'] = $m['Category']['slug']; ?>
          <li><?=$this->Html->link($c['name'],$c['link']);?></li>
        <?php endforeach ?>
      </ul>
      </li>
    <?php endif ?>

  <?php endforeach ?>
              
</ul>

<!--
   <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
  </li>
 <!-->
