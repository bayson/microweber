<? 
/*
//

example params - all are optional: 
ul_class="features_nav_big"
thumbnail="true"

*/

?>

<div class="pages-tree">
  <?php

 

if($params['from'] != false){
	$from  =$params['from'];
	
} else {
 $from  =option_get('from', $params['module_id']);
}


if(intval( $from) == 0){
	$par =  $this->content_model->getParentPagesIdsForPageIdAndCache($page['id']);
$last =  end($par); // last

if($last == 0){
$from = 	$page['id'];
} else {
	$from = 	$last;
}

}





	?>
  <ul class="<? print $params['ul_class'] ?> first_item">
  
   <?
	if($params['thumbnail']): ?>     <!--<li class="first_li"><a  <? if($from == PAGE_ID): ?> class="active" <? endif; ?>  href="<? print page_link($from);?>"><img src='<? print thumbnail($from, 'original');?>' ><? print page_title($from);?></a></li>-->

  
    <? else :  ?>
 <!--     <li class="first_li"><a href="<? print page_link($from);?>"><? print page_title($from);?></a></li>-->
      <li class="first_li"><a  <? if($from == PAGE_ID): ?> class="active" <? endif; ?>  href="<? print page_link($from);?>"><? print page_title($from);?></a></li>
    <? endif; ?>
    <?
	if($params['thumbnail']){
 $this->content_model->content_helpers_getPagesAsUlTree($from , "<a href='{link}'   {removed_ids_code}  {active_code}  value='{id}' ><img src='{tn}' ><span>{content_title}</span></a>", array(PAGE_ID), 'class="active"', array($form_values['id']) , 'class="hidden"' , false, false, $params['ul_class'], 1 );
 
	} else {
		
		 $this->content_model->content_helpers_getPagesAsUlTree($from , "<a href='{link}'   {removed_ids_code}  {active_code}  value='{id}' ><span>{content_title}</span></a>", array(PAGE_ID), 'class="active"', array($form_values['id']) , 'class="hidden"' , false, false, $params['ul_class'],1 );
	}

 ?>
  </ul>
</div>
