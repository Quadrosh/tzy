<li class="dropdown <?php if ($item['id'] == $this->currentItem ) {echo 'active';}
?>"><a <?= $item['id'] != $this->currentItem?'href="/'.$item['link'].'"':'' ?>  <?php
    if (isset($item['childs'])){
        $menulevel++;
        $ifactive = null;
//        if ($menulevel == 1 AND $this->currentItem >1 AND $this->currentItem !=3) {
//            $ifactive = ' active';
//        }
        if ($menulevel == 1) {
            echo 'class="dropdown-toggle' .$ifactive.'" data-toggle="dropdown"';
        }
    } ?>><?= $tab . $item['name'] ?></a><?php
    if (isset($item['childs'])&&$menulevel == 1) {
        echo '<ul class="dropdown-menu">'.$this->getMenuHtml($item['childs'],$tab.'',$menulevel).'</ul></li>';
    }
    if (isset($item['childs'])&&$menulevel > 1) {
        echo'</li>'. $this->getMenuHtml($item['childs'],$tab.'- ',$menulevel);
};
    if (!isset($item['childs']) OR (isset($item['childs'])&&$menulevel = 0)) {
        echo '</li>';
    }

    if ($menulevel == 0 and $item['id']!=3){
        echo '<li class="delimiter"></li>';
    } ?>



