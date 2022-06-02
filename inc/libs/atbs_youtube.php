<?php
if (!class_exists('ATBS_Youtube')) {
    class ATBS_Youtube {
        static function atbs_get_playlist( $yt_list_url ) {

            $yt_list_ID = self::atbs_get_playlist_ID($yt_list_url);
            $info   = self::atbs_fetch_playlist_info( $yt_list_ID, 25 );
			$videos = self::atbs_get_playlist_videos_info( $yt_list_ID, 25 );

            if ( is_array( $videos ) ) {
				$videos = array_filter( $videos );
			}
			if ( is_array( $info ) ) {
				$info = array_filter( $info );
			}

            return compact( 'info', 'videos' );
        }

        static function atbs_get_playlist_ID( $youtube_url ) {

    		$youtube_url = str_replace( '&amp;', '&', $youtube_url );
    		if ( preg_match( '#^(?: https? \: )? (?: //)? w* \.? youtube \.com [^\?]+ \? (.+)$#ix', $youtube_url, $matched ) ) {
    			parse_str( $matched[1], $q );
    			if ( ! empty( $q['list'] ) ) {
    				return $q['list'];
    			}
    		}

    	}
        static function atbs_fetch_data( $url, $args = array() ) {

    		$defaults = array(
    			'timeout' => 30,
    		);
    		$args     = wp_parse_args( $args, $defaults );

    		$raw_response = wp_remote_get( $url, $args );

    		if ( ! is_wp_error( $raw_response ) && 200 == wp_remote_retrieve_response_code( $raw_response ) ) {

    			return wp_remote_retrieve_body( $raw_response );
    		}

    		return FALSE;
    	}

        static function atbs_fetch_playlist_info( $playlist_ID, $settings = array() ) {

    		if ( empty( $playlist_ID ) ) {
    			return FALSE;
    		}
    		$cache_group = 'pinfo';

    		// First, Check Cache

    		if ( $cached = ATBS_Cache::atbs_get_cache( $playlist_ID, $cache_group ) ) {

    			return $cached;
    		}

    		//Fetch Data if Cache not exists

    		$playlist_info = self::atbs_get_playlist_info( $playlist_ID, $settings );

    		//Cache Fetched Data on success
    		if ( $playlist_info !== FALSE ) {

    			ATBS_Cache::atbs_set_cache( $playlist_ID, $playlist_info, $cache_group );
    		}

    		return $playlist_info;
    	}
        static function atbs_fetch_json_data( $url, $args = array() ) {
    		$data = self::atbs_fetch_data( $url, $args );
    		if ( $data ) {
    			return json_decode( $data );
    		}

    		return FALSE;
    	}
        static function atbs_get_playlist_info( $play_list_id ) {
            $youtubeKey = 'AIzaSyBAwpfyAadivJ6EimaAOLh-F1gBeuwyVoY';
    		$url = 'https://www.googleapis.com/youtube/v3/playlists?part=snippet&id=' . $play_list_id . '&key='.$youtubeKey;

    		$data = self::atbs_fetch_json_data( $url );

    		if ( is_object( $data ) && ! empty( $data->items ) ) {

    			return $data->items[0]->snippet;;
    		}

    		return FALSE;
    	}

        static function atbs_sanitize_videos_list( $videos ) {

    		if ( is_string( $videos ) ) {
    			$videos = implode( ',', $videos );
    		}

    		$videos = array_map( 'trim', (array) $videos ); // bug fix
    		$videos = array_filter( $videos );

    		return $videos;

    	}

        static function atbs_get_youtube_videos_info( $videos ) {

    		$results            = array();
    		$videos_per_request = 50;


    		foreach ( array_chunk( $videos, $videos_per_request ) as $_videos ) {

    			$videos_id = implode( ',', $_videos );
                $youtubeKey = 'AIzaSyBAwpfyAadivJ6EimaAOLh-F1gBeuwyVoY';
    			$url       = 'https://www.googleapis.com/youtube/v3/videos?id=' . $videos_id . '&part=id,snippet,contentDetails&key='.$youtubeKey;
    			$data      = self::atbs_fetch_json_data( $url );

    			if ( is_object( $data ) && ! empty( $data->items ) ) {
    				foreach ( $data->items as $item ) {
    					$idx = &$item->id;

    					$results[ $idx ] = array(
    						'title'      => $item->snippet->title,
    						//			'description' => $item->snippet->description,
    						'thumbnails' => $item->snippet->thumbnails,
    						//			'video_id'   => $item->id,
    						'duration'   => $item->contentDetails->duration,
    					);
    				}

    			}
    		}

    		return $results ? $results : FALSE;
    	}

        static function atbs_get_videos_info( $videos ) {

    		$videos      = self::atbs_sanitize_videos_list( $videos );
    		$cache_name  = md5( serialize( $videos ) );
    		$cache_group = 'vinfo';

    		// First, Check Cache
    		if ( $cached = ATBS_Cache::atbs_get_cache( $cache_name, $cache_group ) ) {
    			return $cached;
    		}

    		//Fetch Data if Cache not exists
    		$videos_info = self::atbs_get_youtube_videos_info( $videos );

    		//Cache Fetched Data on success
    		if ( $videos_info !== FALSE ) {
    			ATBS_Cache::atbs_set_cache( $cache_name, $videos_info, $cache_group );
    		}

    		return $videos_info;
    	}

        static function atbs_get_playlist_videos_info( $play_list_id, $limit = 50 ) {

            $youtubeKey = 'AIzaSyBAwpfyAadivJ6EimaAOLh-F1gBeuwyVoY';
    		$q_limit = min( 50, $limit ); // valid range is [0 50]

    		$url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=' . $q_limit . '&playlistId=' . $play_list_id . '&key='.$youtubeKey;

    		$data = self::atbs_fetch_json_data( $url );

    		if ( empty( $data->items ) || ! is_array( $data->items ) ) {
    			return FALSE;
    		}


    		$fetced_items    = 0;
    		$playlist_videos = array();
    		do {
    			$page_token = isset( $data->nextPageToken ) ? $data->nextPageToken : FALSE;
    			foreach ( $data->items as $item ) {
    				$playlist_videos[] = $item->snippet->resourceId->videoId;
    				$fetced_items ++;
    			}

    		} while ( $fetced_items < $limit && $page_token && ( $data = self::atbs_fetch_json_data( $url . '&pageToken=' . $page_token ) ) );

    		return self::atbs_get_videos_info( $playlist_videos );
    	}

        static function atbs_get_date_interval( $iso_8601_date ) {

    		if ( class_exists( 'DateInterval' ) ) {
    			return new DateInterval( $iso_8601_date );
    		} else {

    			$date_time = explode( 'T', $iso_8601_date );
    			$return    = array(
    				'y' => 0,
    				'm' => 0,
    				'd' => 0,
    				'h' => 0,
    				'i' => 0,
    				's' => 0,
    			);


    			$formats = array(
    				//date format
    				array(
    					'y' => 'y',
    					'm' => 'm',
    					'd' => 'd',
    				),
    				//time format
    				array(
    					'h' => 'h',
    					'm' => 'i',
    					's' => 's'
    				)
    			);

    			foreach ( $date_time as $format_id => $iso_8601 ) {

    				if ( preg_match_all( '#(\d+)([a-z]{1})*#i', $iso_8601, $match ) ) {
    					$length = count( $match[1] );

    					for ( $i = 0; $i < $length; $i ++ ) {
    						$number = intval( $match[1][ $i ] );
    						$char   = strtolower( $match[2][ $i ] );

    						if ( isset( $formats[ $format_id ][ $char ] ) ) {
    							$idx = &$formats[ $format_id ][ $char ];

    							$return[ $idx ] = $number;
    						}

    					}


    				}
    			}

    			return (object) $return;
    		}
    	}
        static function atbs_format_second_duration( $seconds ) {
    		$duration = (int) $seconds;
    		if ( $duration ) {

    			$hours = floor( $seconds / 3600 );
    			$mins  = floor( $seconds / 60 % 60 );
    			$secs  = floor( $seconds % 60 );

    			if ( $hours ) {

    				return sprintf( '%02d:%02d:%02d', $hours, $mins, $secs );
    			} else {

    				return sprintf( '%02d:%02d', $mins, $secs );
    			}
    		}

    		return FALSE;
    	}
        static function atbs_get_video_duration( $duration ) {

    		if ( is_int( $duration ) ) {
    			return self::atbs_format_second_duration( $duration );
    		}

    		$duration = trim( $duration );
    		if ( ! isset( $duration[0] ) || ( $duration[0] !== 'P' && $duration[0] !== 'p' ) ) {
    			return FALSE;
    		}

    		$duration = self::atbs_get_date_interval( $duration );
    		if ( $duration->h ) {

    			return sprintf( '%02d:%02d:%02d', $duration->h, $duration->i, $duration->s );
    		} else {

    			return sprintf( '%02d:%02d', $duration->i, $duration->s );
    		}
    	}
        static function atbs_get_video_thumbnail( $video_thumbnails ) {

    		if ( ! is_object( $video_thumbnails ) ) {
    			return FALSE;
    		}

    		foreach ( array( 'default', 'medium', 'small' ) as $size ) {
    			if ( property_exists( $video_thumbnails, $size ) ) {

    				$thumb_obj = (object) $video_thumbnails->$size;
    				if ( ! empty( $thumb_obj->url ) ) {
    					return $thumb_obj->url;
    				}
    			}
    		}

    	}

        static function atbs_youtube_playlist_render($playlist, $bk_color_opt, $layout) {
            $block_str = '';

            $bk_col_iframe = 'col-md-8';
            $bk_col_list = 'col-md-4';

            if($layout == 'layout-1') {
                $bk_col_iframe = 'col-md-8';
                $bk_col_list = 'col-md-4';
            }else if($layout == 'layout-2') {
                $bk_col_iframe = 'col-md-12';
                $bk_col_list = 'col-md-12';
            }else if($layout == 'layout-3') {
                $bk_col_iframe = 'col-md-12';
                $bk_col_list = 'col-md-12';
            }

            $block_str .= '<div class="bk-playlist-module-wrap">';

            $frame_url_js = 'https://www.youtube.com/embed/{video-id}?autoplay=1';

            $frame_url = 'https://www.youtube.com/embed/{video-id}?autoplay=0';

            $_video_cus = '&showinfo=0';

            $first_video_ID = key( $playlist['videos']);

            $block_str .= '<div class="bk-playlist-wrap row">';
            $block_str .= '<div class="bk-currently-playing '.$bk_col_iframe.'">';
            $block_str .= '<div class="bk-current-iframe" data-frame-url="'.esc_attr( $frame_url_js ).$_video_cus.'">
            			<iframe type="text/html" width="100%" height="100%"
            			        src="'.esc_attr( str_replace( "{video-id}", $first_video_ID, $frame_url ) ).$_video_cus.'"
            			        allowfullscreen="allowfullscreen"
            			        mozallowfullscreen="mozallowfullscreen"
            			        msallowfullscreen="msallowfullscreen"
            			        oallowfullscreen="oallowfullscreen"
            			        webkitallowfullscreen="webkitallowfullscreen"
            			        frameborder="0"></iframe>
            		</div>';
           	$block_str .= '</div>';
            $block_str .= '<div class="bk-playlist-videos '.$bk_col_list.'">';

            $block_str .= '<div class="bk-current-video-description '.$bk_color_opt['title_bg_class'].'">';

            $block_str .= '<div class="bk-current-video-title '.$bk_color_opt['title_color_class'].'">';

			$block_str .=  $playlist['videos'][$first_video_ID]['title'];

        	$block_str .= '</div>';

            $block_str .= '<div class="bk-current-video-time '.$bk_color_opt['title_color_class'].'">';
            $block_str .= self::atbs_get_video_duration( $playlist['videos'][$first_video_ID]['duration'] );
            $block_str .= '</div>';

			$block_str .= '</div>';


     		$block_str .= '<div class="bk-playlist-items">';
            $block_str .= '<ul class="clearfix">';
			$video_counter = 0;
			foreach ( $playlist['videos'] as $video_ID => $video_info ) :
				$block_str .= '<li class="bk-playlist-item';
                if ( ! $video_counter )
				$block_str .= ' bk-playing';
                $block_str .= '">';
				$block_str .= '<a href="#" class="bk-video-select clearfix" data-video-id="'.$video_ID.'">';
				$block_str .= '<div class="bk-video-thumb">';
				if ( $thumbnail = self::atbs_get_video_thumbnail( $video_info['thumbnails'] ) ):
					$block_str .= '<img src="'.esc_attr( $thumbnail ).'"
								     alt="'.esc_attr( $video_info['title'] ).'">';
				endif;
				$block_str .= '</div>';
				$block_str .= '<div class="bk-video-description">';
				$block_str .= '<div class="bk-video-title">'.$video_info['title'].'</div>';
				$block_str .= '<div class="bk-video-time">'.self::atbs_get_video_duration( $video_info['duration'] ).'</div>';
				$block_str .= '</div>';
				$block_str .= '</a>';
				$block_str .= '</li>';
                $video_counter ++;
			endforeach;
            $block_str .= '</ul>';
            $block_str .= '</div>';
            $block_str .= '</div>';
            $block_str .= '</div>';

            $block_str .= '</div><!-- Close render wrap -->';

            return $block_str;
        }
    }
}