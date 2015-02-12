<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

<head>
   
  <?php echo $this->Html->charset(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo $title_for_layout.' - Mairie de Jacou'?>
  </title>
  <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css('normalize.css');
    echo $this->Html->css('foundation.css');
    echo $this->Html->css('app');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    
  ?>
  <?= $this->Html->script('vendor/modernizr.js'); ?>
  <?= $this->Html->script('vendor/jquery.js'); ?>
  <?= $this->Html->script('foundation.min.js'); ?>
  <?= $this->Html->script('updateCategory'); ?>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


</head>

<body>

  <header>
      <div class="row">
        <div class="small-12 columns">
          <div class="header-text">
          <a href ="./">Voir le site</a>
          </div>
          <div class="header-tools">
            <a href="#">Des outils...( à Voir )</a>
          </div>
        </div>
      </div>
  </header>
    <div class="row">
       
        <div class="large-3 columns dashboard">
        <nav>
       
        <ul class="ul-block">
          <div class="small-12 columns li-block active">
              <li><a href="#">Accueil</a></li>
           </div>

           <div class="small-12 columns li-block">
              <li>
                <?= $this->Html->link("Gestion des articles",array('controller' => 'posts','action' => 'index','admin' => true)); ?>
              </li>
           </div>

          <div class="small-12 columns  li-block">
              <li><?= 
                   $this->Html->link("Gestion des menus",array('controller' => 'categories','action' => 'index','admin' => true));
                  ?>
              </li>
           </div>
           <div class="small-12 columns  li-block">
              <li><?= 
                   $this->Html->link("Gestion des sous-menu",array('controller' => 'subCategories','action' => 'index','admin' => true));
                  ?>
              </li>
           </div>
        </ul>  
        
      </nav>
    </div> 

  
      <div class="small-9 columns">
        <div id="content">
        <?php echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>

          <?= $this->fetch('script'); ?>
      </div>
      </div>

  </div>

  <?= $this->fetch('script'); ?>
  <script>
    $(document).foundation();
  </script>
</body>
</html>