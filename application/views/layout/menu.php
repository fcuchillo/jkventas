  <aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url();?>assets/dist/img/jykale.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull info">
          <p><?php if(isset($_SESSION['session_user'])) { echo ($this->session->userdata['session_user']['nombre']);}?></p>
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>

    <ul class="sidebar-menu">
        <li class="header">MENU DE NAVEGACIÓN</li>

<?php
if(isset($menu_padre)){
    foreach ($menu_padre as $padre){
            echo '<li class="treeview ">';
            echo '<a href="#">';
            echo '<i class="fa fa-check-circle"></i> <span>'.$padre->titulo.'</span>';
            echo '<span class="pull-right-container">';
            echo '<i class="fa fa-angle-left pull-right"></i>';
            echo '</span>';
            echo '</a>';
            echo '<ul class="treeview-menu">';
            if(isset($menu_hijo)){
                    foreach($menu_hijo as $item){
                        if($padre->menu_id==$item->padre_id){
                            echo '<li class=""><a href="'.base_url().$item->link.'"><i class="fa fa-circle-o"></i>'.utf8_encode($item->titulo).'</a></li>';    
                        }
                    }     
                }
            echo '</ul>';
            echo '</li>';
    }
}
?>      
</ul>
    </section>

  </aside>
