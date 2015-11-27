<?php
  function shaad_player($atts){
    // $args = shortcode_atts(
    //   array(
    //     'post_id' => ''
    //   ),
    //   $atts
    // );


    extract($atts);


    $elite_id = 1;
    $elite_players = get_option('elite_players');
    $elite_player = $elite_players[$elite_id];


    var_dump($elite_player);


    $elite_player['videos'][0]['title']       = $title;
    $elite_player['videos'][0]['permalink']   = $permalink;
    $elite_player['videos'][0]['mp4']         = $mp4;
    $elite_player['videos'][0]['preroll_mp4'] = $mp4;


    // $elite_player['videos'][0]['all']         = $all;


    // var_dump($mp4);
    // var_dump($title);
    // var_dump($description);
    var_dump($preroll_mp4);

    $elite_player['rootFolder'] = plugins_url()."/Elite-video-player/";
    $output = ('<div class="Elite_video_player" id="'.$elite_id.'" ><div id="elite_options" style="display:none;">'.json_encode($elite_player).'</div></div>');
    return $output;
  }
  add_shortcode('shaad_player', 'shaad_player');
