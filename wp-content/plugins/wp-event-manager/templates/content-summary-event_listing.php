<!-- Box Layout --><a href="<?php the_permalink(); ?>" class="col-md-4"> <div class="event-summary-shortcode">     <div class="event-img"><?php  display_event_banner(); ?></div>               <div class="event-title">        <?php the_title(); ?>    </div>    <div class="event-start-date"><?php $timestamp = strtotime(get_event_start_date()); if($timestamp!= null): echo date("M j, Y",$timestamp); endif;?></div>       <div class="event-location">     <?php if(get_event_location()=='Anywhere'): echo 'Online Event'; else:  display_event_location(false); endif; ?>    </div>    <div class="box-footer">      <?php if ( get_option( 'event_manager_enable_event_types' ) ) {  ?>        <div class="event-type"> <div><?php display_event_type(); ?></div> </div>          <?php } ?>           <div class="event-ticket"><?php echo '#'.get_event_ticket_option(); ?></div>    </div>  </div> </a> <!-- Box Layout end-->