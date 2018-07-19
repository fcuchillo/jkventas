  <aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url();?>assets/dist/img/endes_logo.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php  if(isset($_SESSION['session_user'])) { echo ($this->session->userdata['session_user']['nombre']);}?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

    <ul class="sidebar-menu">
        <li class="header">MENU DE NAVEGACIÓN</li>

<?php
//  if(isset($modulos))
//  {
//    foreach($modulos as  $itemmodulo)
//     {
//        if($itemmodulo->NOMBRE=='REGISTRO')
//        {
            echo '<li class="treeview ">';
            echo '<a href="#">';
            echo '<i class="fa fa-check-circle"></i> <span>ADMIN</span>';
            echo '<span class="pull-right-container">';
            echo '<i class="fa fa-angle-left pull-right"></i>';
            echo '</span>';
            echo '</a>';
            echo '<ul class="treeview-menu">';
              if(isset($menu))
                {
                    foreach($menu as $item)
                    {
//                        if($itemmodulo->MODULO_ID==$item->MODULO_ID && $itemmodulo->NOMBRE=='REGISTRO')
//                        {
                           echo '<li class=""><a href="'.base_url().$item->link.'"><i class="fa fa-circle-o"></i>'.utf8_encode($item->titulo).'</a></li>';    
//                        }
                    }     
                }

            echo '</ul>';
            echo '</li>';
//        }

//        if($itemmodulo->NOMBRE=='ENCUESTA')
//        {
//            echo '<li class="treeview ">';
//            echo '<a href="#">';
//            echo '<i class="fa fa-check-circle"></i> <span>'.$itemmodulo->NOMBRE.'</span>';
//            echo '<span class="pull-right-container">';
//            echo '<i class="fa fa-angle-left pull-right"></i>';
//            echo '</span>';
//            echo '</a>';
//            echo '<ul class="treeview-menu">';
//              if(isset($menu))
//                {
//                    foreach($menu as $item)
//                    {
//                        if($itemmodulo->MODULO_ID==$item->MODULO_ID && $itemmodulo->NOMBRE=='ENCUESTA')
//                        {
//                           echo '<li class=""><a href="'.base_url().$item->URI.'"><i class="fa fa-circle-o"></i>'.utf8_encode($item->MENU).'</a></li>';    
//                        }
//                    }     
//                }
//
//            echo '</ul>';
//            echo '</li>';
//        }
//     }
//  }
?>      
</ul>
    </section>

  </aside>
