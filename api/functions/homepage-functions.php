<?php
//homepage order
function homepageOrder()
{
	$homepageOrder = array(
		"homepageOrdercustomhtml" => $GLOBALS['homepageOrdercustomhtml'],
		"homepageOrdercustomhtmlTwo" => $GLOBALS['homepageOrdercustomhtmlTwo'],
		"homepageOrdernzbget" => $GLOBALS['homepageOrdernzbget'],
		"homepageOrdersabnzbd" => $GLOBALS['homepageOrdersabnzbd'],
		"homepageOrderplexnowplaying" => $GLOBALS['homepageOrderplexnowplaying'],
		"homepageOrderplexrecent" => $GLOBALS['homepageOrderplexrecent'],
		"homepageOrderplexplaylist" => $GLOBALS['homepageOrderplexplaylist'],
		"homepageOrderembynowplaying" => $GLOBALS['homepageOrderembynowplaying'],
		"homepageOrderembyrecent" => $GLOBALS['homepageOrderembyrecent'],
		"homepageOrderombi" => $GLOBALS['homepageOrderombi'],
		"homepageOrdercalendar" => $GLOBALS['homepageOrdercalendar'],
		"homepageOrdertransmission" => $GLOBALS['homepageOrdertransmission'],
		"homepageOrderqBittorrent" => $GLOBALS['homepageOrderqBittorrent'],
		"homepageOrderdeluge" => $GLOBALS['homepageOrderdeluge'],
	);
	asort($homepageOrder);
	return $homepageOrder;
}

function buildHomepage()
{
	$homepageOrder = homepageOrder();
	$homepageBuilt = '';
	foreach ($homepageOrder as $key => $value) {
		$homepageBuilt .= buildHomepageItem($key);
	}
	return $homepageBuilt;
}

function buildHomepageItem($homepageItem)
{
	$item = '<div id="' . $homepageItem . '">';
	switch ($homepageItem) {
		case 'homepageOrdercustomhtml':
			if ($GLOBALS['homepagCustomHTMLoneEnabled'] && qualifyRequest($GLOBALS['homepagCustomHTMLoneAuth'])) {
				$item .= ($GLOBALS['customHTMLone'] !== '') ? $GLOBALS['customHTMLone'] : '';
			}
			break;
		case 'homepageOrdercustomhtmlTwo':
			if ($GLOBALS['homepagCustomHTMLtwoEnabled'] && qualifyRequest($GLOBALS['homepagCustomHTMLtwoAuth'])) {
				$item .= ($GLOBALS['customHTMLtwo'] !== '') ? $GLOBALS['customHTMLtwo'] : '';
			}
			break;
		case 'homepageOrdernotice':
			break;
		case 'homepageOrdernoticeguest':
			break;
		case 'homepageOrderqBittorrent':
			if ($GLOBALS['homepageqBittorrentEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Download Queue...</h2></div>';
				$item .= '
                <script>
                // homepageOrderqBittorrent
                homepageDownloader("qBittorrent", "' . $GLOBALS['homepageDownloadRefresh'] . '");
                // End homepageOrderqBittorrent
                </script>
                ';
			}
			break;
		case 'homepageOrderdeluge':
			if ($GLOBALS['homepageDelugeEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Download Queue...</h2></div>';
				$item .= '
				<script>
				// Deluge
				homepageDownloader("deluge", "' . $GLOBALS['homepageDownloadRefresh'] . '");
				// End Deluge
				</script>
				';
			}
			break;
		case 'homepageOrdertransmission':
			if ($GLOBALS['homepageTransmissionEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Download Queue...</h2></div>';
				$item .= '
				<script>
				// Transmission
				homepageDownloader("transmission", "' . $GLOBALS['homepageDownloadRefresh'] . '");
				// End Transmission
				</script>
				';
			}
			break;
		case 'homepageOrdernzbget':
			if ($GLOBALS['homepageNzbgetEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Download Queue...</h2></div>';
				$item .= '
				<script>
				// NZBGet
				homepageDownloader("nzbget", "' . $GLOBALS['homepageDownloadRefresh'] . '");
				// End NZBGet
				</script>
				';
			}
			break;
		case 'homepageOrdersabnzbd':
			if ($GLOBALS['homepageSabnzbdEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Download Queue...</h2></div>';
				$item .= '
				<script>
				// SabNZBd
				homepageDownloader("sabnzbd", "' . $GLOBALS['homepageDownloadRefresh'] . '");
				// End SabNZBd
				</script>
				';
			}
			break;
		case 'homepageOrderplexnowplaying':
			if ($GLOBALS['homepagePlexStreams']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Now Playing...</h2></div>';
				$item .= '
				<script>
				// Plex Stream
				homepageStream("plex", "' . $GLOBALS['homepageStreamRefresh'] . '");
				// End Plex Stream
				</script>
				';
			}
			break;
		case 'homepageOrderplexrecent':
			if ($GLOBALS['homepagePlexRecent']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Recent...</h2></div>';
				$item .= '
				<script>
				// Plex Recent
				homepageRecent("plex", "' . $GLOBALS['homepageRecentRefresh'] . '");
				// End Plex Recent
				</script>
				';
			}
			break;
		case 'homepageOrderplexplaylist':
			if ($GLOBALS['homepagePlexPlaylist']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Playlists...</h2></div>';
				$item .= '
				<script>
				// Plex Playlist
				homepagePlaylist("plex");
				// End Plex Playlist
				</script>
				';
			}
			break;
		case 'homepageOrderembynowplaying':
			if ($GLOBALS['homepageEmbyStreams']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Now Playing...</h2></div>';
				$item .= '
				<script>
				// Emby Stream
				homepageStream("emby", "' . $GLOBALS['homepageStreamRefresh'] . '");
				// End Emby Stream
				</script>
				';
			}
			break;
		case 'homepageOrderembyrecent':
			if ($GLOBALS['homepageEmbyRecent']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Recent...</h2></div>';
				$item .= '
				<script>
				// Emby Recent
				homepageRecent("emby", "' . $GLOBALS['homepageRecentRefresh'] . '");
				// End Emby Recent
				</script>
				';
			}
			break;
		case 'homepageOrderombi':
			if ($GLOBALS['homepageOmbiEnabled']) {
				$item .= '<div class="white-box"><h2 class="text-center" lang="en">Loading Requests...</h2></div>';
				$item .= '
				<script>
				// Ombi Requests
				homepageRequests("' . $GLOBALS['ombiRefresh'] . '");
				// End Ombi Requests
				</script>
				';
			}
			break;
		case 'homepageOrdercalendar':
			if ($GLOBALS['homepageSonarrEnabled'] && qualifyRequest($GLOBALS['homepageSonarrAuth']) || ($GLOBALS['homepageRadarrEnabled'] && qualifyRequest($GLOBALS['homepageRadarrAuth'])) || ($GLOBALS['homepageSickrageEnabled'] && qualifyRequest($GLOBALS['homepageSickrageAuth'])) || ($GLOBALS['homepageCouchpotatoEnabled'] && qualifyRequest($GLOBALS['homepageCouchpotatoAuth']))) {
				$item .= '
				<div id="calendar" class="fc fc-ltr m-b-30"></div>
				<script>
				// Calendar
				homepageCalendar("' . $GLOBALS['calendarRefresh'] . '");
				// End Calendar
				</script>
				';
			}
			break;
		default:
			# code...
			break;
	}
	return $item . '</div>';
}

function getHomepageList()
{
	$groups = groupSelect();
	$mediaServers = array(
		array(
			'name' => 'N/A',
			'value' => ''
		),
		array(
			'name' => 'Plex',
			'value' => 'plex'
		),
		array(
			'name' => 'Emby [Not Available]',
			'value' => 'emby'
		)
	);
	$limit = array(
		array(
			'name' => '1 Item',
			'value' => '1'
		),
		array(
			'name' => '2 Items',
			'value' => '2'
		),
		array(
			'name' => '3 Items',
			'value' => '3'
		),
		array(
			'name' => '4 Items',
			'value' => '4'
		),
		array(
			'name' => '5 Items',
			'value' => '5'
		),
		array(
			'name' => '6 Items',
			'value' => '6'
		),
		array(
			'name' => '7 Items',
			'value' => '7'
		),
		array(
			'name' => '8 Items',
			'value' => '8'
		),
		array(
			'name' => 'Unlimited',
			'value' => '1000'
		),
	);
	$day = array(
		array(
			'name' => 'Sunday',
			'value' => '0'
		),
		array(
			'name' => 'Monday',
			'value' => '1'
		),
		array(
			'name' => 'Tueday',
			'value' => '2'
		),
		array(
			'name' => 'Wednesday',
			'value' => '3'
		),
		array(
			'name' => 'Thursday',
			'value' => '4'
		),
		array(
			'name' => 'Friday',
			'value' => '5'
		),
		array(
			'name' => 'Saturday',
			'value' => '6'
		)
	);
	$calendarDefault = array(
		array(
			'name' => 'Month',
			'value' => 'month'
		),
		array(
			'name' => 'Day',
			'value' => 'basicDay'
		),
		array(
			'name' => 'Week',
			'value' => 'basicWeek'
		),
		array(
			'name' => 'List',
			'value' => 'list'
		)
	);
	$timeFormat = array(
		array(
			'name' => '6p',
			'value' => 'h(:mm)t'
		),
		array(
			'name' => '6:00p',
			'value' => 'h:mmt'
		),
		array(
			'name' => '6:00',
			'value' => 'h:mm'
		),
		array(
			'name' => '18',
			'value' => 'H(:mm)'
		),
		array(
			'name' => '18:00',
			'value' => 'H:mm'
		)
	);
	$qBittorrentSortOptions = array(
		array(
			'name' => 'Hash',
			'value' => 'hash'
		),
		array(
			'name' => 'Name',
			'value' => 'name'
		),
		array(
			'name' => 'Size',
			'value' => 'size'
		),
		array(
			'name' => 'Progress',
			'value' => 'progress'
		),
		array(
			'name' => 'Download Speed',
			'value' => 'dlspeed'
		),
		array(
			'name' => 'Upload Speed',
			'value' => 'upspeed'
		),
		array(
			'name' => 'Priority',
			'value' => 'priority'
		),
		array(
			'name' => 'Number of Seeds',
			'value' => 'num_seeds'
		),
		array(
			'name' => 'Number of Seeds in Swarm',
			'value' => 'num_complete'
		),
		array(
			'name' => 'Number of Leechers',
			'value' => 'num_leechs'
		),
		array(
			'name' => 'Number of Leechers in Swarm',
			'value' => 'num_incomplete'
		),
		array(
			'name' => 'Ratio',
			'value' => 'ratio'
		),
		array(
			'name' => 'ETA',
			'value' => 'eta'
		),
		array(
			'name' => 'State',
			'value' => 'state'
		),
		array(
			'name' => 'Category',
			'value' => 'category'
		)
	);
	return array(array(
		'name' => 'Calendar',
		'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
		'image' => 'plugins/images/tabs/calendar.png',
		'category' => 'HOMEPAGE',
		'settings' => array(
			'Enable' => array(
				array(
					'type' => 'switch',
					'name' => 'homepageCalendarEnabled',
					'label' => 'Enable iCal',
					'value' => $GLOBALS['homepageCalendarEnabled']
				),
				array(
					'type' => 'select',
					'name' => 'homepageCalendarAuth',
					'label' => 'Minimum Authentication',
					'value' => $GLOBALS['homepageCalendarAuth'],
					'options' => $groups
				),
				array(
					'type' => 'input',
					'name' => 'calendariCal',
					'label' => 'iCal URL\'s',
					'value' => $GLOBALS['calendariCal'],
					'placeholder' => 'separate by comma\'s'
				),
			),
			'Misc Options' => array(
				array(
					'type' => 'number',
					'name' => 'calendarStart',
					'label' => '# of Days Before',
					'value' => $GLOBALS['calendarStart'],
					'placeholder' => ''
				),
				array(
					'type' => 'number',
					'name' => 'calendarEnd',
					'label' => '# of Days After',
					'value' => $GLOBALS['calendarEnd'],
					'placeholder' => ''
				),
				array(
					'type' => 'select',
					'name' => 'calendarFirstDay',
					'label' => 'Start Day',
					'value' => $GLOBALS['calendarFirstDay'],
					'options' => $day
				),
				array(
					'type' => 'select',
					'name' => 'calendarDefault',
					'label' => 'Default View',
					'value' => $GLOBALS['calendarDefault'],
					'options' => $calendarDefault
				),
				array(
					'type' => 'select',
					'name' => 'calendarTimeFormat',
					'label' => 'Time Format',
					'value' => $GLOBALS['calendarTimeFormat'],
					'options' => $timeFormat
				),
				array(
					'type' => 'select',
					'name' => 'calendarLimit',
					'label' => 'Items Per Day',
					'value' => $GLOBALS['calendarLimit'],
					'options' => $limit
				),
				array(
					'type' => 'select',
					'name' => 'calendarRefresh',
					'label' => 'Refresh Seconds',
					'value' => $GLOBALS['calendarRefresh'],
					'options' => optionTime()
				)
			),
		)
	),
		array(
			'name' => 'Plex',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/plex.png',
			'category' => 'Media Server',
			//'license' => $GLOBALS['license'],
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagePlexEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagePlexEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepagePlexAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepagePlexAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'plexURL',
						'label' => 'URL',
						'value' => $GLOBALS['plexURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'plexToken',
						'label' => 'Token',
						'value' => $GLOBALS['plexToken']
					),
					array(
						'type' => 'password-alt',
						'name' => 'plexID',
						'label' => 'Plex Machine',
						'value' => $GLOBALS['plexID']
					)
				),
				'Active Streams' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagePlexStreams',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagePlexStreams']
					),
					array(
						'type' => 'select',
						'name' => 'homepagePlexStreamsAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepagePlexStreamsAuth'],
						'options' => $groups
					),
					array(
						'type' => 'switch',
						'name' => 'homepageShowStreamNames',
						'label' => 'User Information',
						'value' => $GLOBALS['homepageShowStreamNames']
					),
					array(
						'type' => 'select',
						'name' => 'homepageShowStreamNamesAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepageShowStreamNamesAuth'],
						'options' => $groups
					),
					array(
						'type' => 'select',
						'name' => 'homepageStreamRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageStreamRefresh'],
						'options' => optionTime()
					),
				),
				'Recent Items' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagePlexRecent',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagePlexRecent']
					),
					array(
						'type' => 'select',
						'name' => 'homepagePlexRecentAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepagePlexRecentAuth'],
						'options' => $groups
					),
					array(
						'type' => 'number',
						'name' => 'homepageRecentLimit',
						'label' => 'Item Limit',
						'value' => $GLOBALS['homepageRecentLimit'],
					),
					array(
						'type' => 'select',
						'name' => 'homepageRecentRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageRecentRefresh'],
						'options' => optionTime()
					),
				),
				'Media Search' => array(
					array(
						'type' => 'switch',
						'name' => 'mediaSearch',
						'label' => 'Enable',
						'value' => $GLOBALS['mediaSearch']
					),
					array(
						'type' => 'select',
						'name' => 'mediaSearchAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['mediaSearchAuth'],
						'options' => $groups
					),
					array(
						'type' => 'select',
						'name' => 'mediaSearchType',
						'label' => 'Media Server',
						'value' => $GLOBALS['mediaSearchType'],
						'options' => $mediaServers
					),
				),
				'Playlists' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagePlexPlaylist',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagePlexPlaylist']
					),
					array(
						'type' => 'select',
						'name' => 'homepagePlexPlaylistAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepagePlexPlaylistAuth'],
						'options' => $groups
					),
				),
				'Misc Options' => array(
					array(
						'type' => 'input',
						'name' => 'plexTabName',
						'label' => 'Plex Tab Name',
						'value' => $GLOBALS['plexTabName'],
						'placeholder' => 'Only use if you have Plex in a reverse proxy'
					),
					array(
						'type' => 'input',
						'name' => 'plexTabURL',
						'label' => 'Plex Tab WAN URL',
						'value' => $GLOBALS['plexTabURL'],
						'placeholder' => 'http(s)://hostname:port'
					)
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'plex\')"'
					),
				)
			)
		),
		array(
			'name' => 'Emby',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/emby.png',
			'category' => 'Media Server',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageEmbyEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageEmbyEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageEmbyAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageEmbyAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'embyURL',
						'label' => 'URL',
						'value' => $GLOBALS['embyURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'embyToken',
						'label' => 'Token',
						'value' => $GLOBALS['embyToken']
					)
				),
				'Active Streams' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageEmbyStreams',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageEmbyStreams']
					),
					array(
						'type' => 'select',
						'name' => 'homepageEmbyStreamsAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepageEmbyStreamsAuth'],
						'options' => $groups
					),
					array(
						'type' => 'switch',
						'name' => 'homepageShowStreamNames',
						'label' => 'User Information',
						'value' => $GLOBALS['homepageShowStreamNames']
					),
					array(
						'type' => 'select',
						'name' => 'homepageShowStreamNamesAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepageShowStreamNamesAuth'],
						'options' => $groups
					),
					array(
						'type' => 'select',
						'name' => 'homepageStreamRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageStreamRefresh'],
						'options' => optionTime()
					),
				),
				'Recent Items' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageEmbyRecent',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageEmbyRecent']
					),
					array(
						'type' => 'select',
						'name' => 'homepageEmbyRecentAuth',
						'label' => 'Minimum Authorization',
						'value' => $GLOBALS['homepageEmbyRecentAuth'],
						'options' => $groups
					),
					array(
						'type' => 'number',
						'name' => 'homepageRecentLimit',
						'label' => 'Item Limit',
						'value' => $GLOBALS['homepageRecentLimit'],
					),
					array(
						'type' => 'select',
						'name' => 'homepageRecentRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageRecentRefresh'],
						'options' => optionTime()
					),
				),
				'Misc Options' => array(
					array(
						'type' => 'input',
						'name' => 'embyTabName',
						'label' => 'Emby Tab Name',
						'value' => $GLOBALS['embyTabName'],
						'placeholder' => 'Only use if you have Emby in a reverse proxy'
					),
					array(
						'type' => 'input',
						'name' => 'embyTabURL',
						'label' => 'Emby Tab WAN URL',
						'value' => $GLOBALS['embyTabURL'],
						'placeholder' => 'http(s)://hostname:port'
					)
				)
			)
		),
		array(
			'name' => 'SabNZBD',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/sabnzbd.png',
			'category' => 'Downloader',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageSabnzbdEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageSabnzbdEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageSabnzbdAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageSabnzbdAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'sabnzbdURL',
						'label' => 'URL',
						'value' => $GLOBALS['sabnzbdURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'sabnzbdToken',
						'label' => 'Token',
						'value' => $GLOBALS['sabnzbdToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'select',
						'name' => 'homepageDownloadRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageDownloadRefresh'],
						'options' => optionTime()
					)
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'sabnzbd\')"'
					),
				)
			)
		),
		array(
			'name' => 'NZBGet',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/nzbget.png',
			'category' => 'Downloader',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageNzbgetEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageNzbgetEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageNzbgetAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageNzbgetAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'nzbgetURL',
						'label' => 'URL',
						'value' => $GLOBALS['nzbgetURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'input',
						'name' => 'nzbgetUsername',
						'label' => 'Username',
						'value' => $GLOBALS['nzbgetUsername']
					),
					array(
						'type' => 'password',
						'name' => 'nzbgetPassword',
						'label' => 'Password',
						'value' => $GLOBALS['nzbgetPassword']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'select',
						'name' => 'homepageDownloadRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageDownloadRefresh'],
						'options' => optionTime()
					)
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'nzbget\')"'
					),
				)
			)
		),
		array(
			'name' => 'Transmission',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/transmission.png',
			'category' => 'Downloader',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageTransmissionEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageTransmissionEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageTransmissionAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageTransmissionAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'transmissionURL',
						'label' => 'URL',
						'value' => $GLOBALS['transmissionURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'input',
						'name' => 'transmissionUsername',
						'label' => 'Username',
						'value' => $GLOBALS['transmissionUsername']
					),
					array(
						'type' => 'password',
						'name' => 'transmissionPassword',
						'label' => 'Password',
						'value' => $GLOBALS['transmissionPassword']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'switch',
						'name' => 'transmissionHideSeeding',
						'label' => 'Hide Seeding',
						'value' => $GLOBALS['transmissionHideSeeding']
					), array(
						'type' => 'switch',
						'name' => 'transmissionHideCompleted',
						'label' => 'Hide Completed',
						'value' => $GLOBALS['transmissionHideCompleted']
					),
					array(
						'type' => 'select',
						'name' => 'homepageDownloadRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageDownloadRefresh'],
						'options' => optionTime()
					)
				)
			)
		),
		array(
			'name' => 'qBittorrent',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/qBittorrent.png',
			'category' => 'Downloader',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageqBittorrentEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageqBittorrentEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageqBittorrentAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageqBittorrentAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'qBittorrentURL',
						'label' => 'URL',
						'value' => $GLOBALS['qBittorrentURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'input',
						'name' => 'qBittorrentUsername',
						'label' => 'Username',
						'value' => $GLOBALS['qBittorrentUsername']
					),
					array(
						'type' => 'password',
						'name' => 'qBittorrentPassword',
						'label' => 'Password',
						'value' => $GLOBALS['qBittorrentPassword']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'switch',
						'name' => 'qBittorrentHideSeeding',
						'label' => 'Hide Seeding',
						'value' => $GLOBALS['qBittorrentHideSeeding']
					), array(
						'type' => 'switch',
						'name' => 'qBittorrentHideCompleted',
						'label' => 'Hide Completed',
						'value' => $GLOBALS['qBittorrentHideCompleted']
					),
					array(
						'type' => 'select',
						'name' => 'qBittorrentSortOrder',
						'label' => 'Order',
						'value' => $GLOBALS['qBittorrentSortOrder'],
						'options' => $qBittorrentSortOptions
					), array(
						'type' => 'switch',
						'name' => 'qBittorrentReverseSorting',
						'label' => 'Reverse Sorting',
						'value' => $GLOBALS['qBittorrentReverseSorting']
					),
					array(
						'type' => 'select',
						'name' => 'homepageDownloadRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageDownloadRefresh'],
						'options' => optionTime()
					)
				)
			)
		),
		array(
			'name' => 'Deluge',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/deluge.png',
			'category' => 'Downloader',
			'settings' => array(
				'custom' => '
				<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
								<span lang="en">Notice</span>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
									<ul class="list-icons">
                                        <li><i class="fa fa-chevron-right text-danger"></i> <a href="https://github.com/idlesign/deluge-webapi/raw/master/dist/WebAPI-0.2.1-py2.7.egg" target="_blank">Download Plugin</a></li>
                                        <li><i class="fa fa-chevron-right text-danger"></i> Open Deluge Web UI, go to "Preferences -> Plugins -> Install plugin" and choose egg file.</li>
                                        <li><i class="fa fa-chevron-right text-danger"></i> Activate WebAPI plugin </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				',
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageDelugeEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageDelugeEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageDelugeAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageDelugeAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'delugeURL',
						'label' => 'URL',
						'value' => $GLOBALS['delugeURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password',
						'name' => 'delugePassword',
						'label' => 'Password',
						'value' => $GLOBALS['delugePassword']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'switch',
						'name' => 'delugeHideSeeding',
						'label' => 'Hide Seeding',
						'value' => $GLOBALS['delugeHideSeeding']
					), array(
						'type' => 'switch',
						'name' => 'delugeHideCompleted',
						'label' => 'Hide Completed',
						'value' => $GLOBALS['delugeHideCompleted']
					),
					array(
						'type' => 'select',
						'name' => 'homepageDownloadRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['homepageDownloadRefresh'],
						'options' => optionTime()
					)
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'deluge\')"'
					),
				)
			)
		),
		array(
			'name' => 'Sonarr',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/sonarr.png',
			'category' => 'PVR',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageSonarrEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageSonarrEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageSonarrAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageSonarrAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'sonarrURL',
						'label' => 'URL',
						'value' => $GLOBALS['sonarrURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'sonarrToken',
						'label' => 'Token',
						'value' => $GLOBALS['sonarrToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'number',
						'name' => 'calendarStart',
						'label' => '# of Days Before',
						'value' => $GLOBALS['calendarStart'],
						'placeholder' => ''
					),
					array(
						'type' => 'number',
						'name' => 'calendarEnd',
						'label' => '# of Days After',
						'value' => $GLOBALS['calendarEnd'],
						'placeholder' => ''
					),
					array(
						'type' => 'select',
						'name' => 'calendarFirstDay',
						'label' => 'Start Day',
						'value' => $GLOBALS['calendarFirstDay'],
						'options' => $day
					),
					array(
						'type' => 'select',
						'name' => 'calendarDefault',
						'label' => 'Default View',
						'value' => $GLOBALS['calendarDefault'],
						'options' => $calendarDefault
					),
					array(
						'type' => 'select',
						'name' => 'calendarTimeFormat',
						'label' => 'Time Format',
						'value' => $GLOBALS['calendarTimeFormat'],
						'options' => $timeFormat
					),
					array(
						'type' => 'select',
						'name' => 'calendarLimit',
						'label' => 'Items Per Day',
						'value' => $GLOBALS['calendarLimit'],
						'options' => $limit
					),
					array(
						'type' => 'select',
						'name' => 'calendarRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['calendarRefresh'],
						'options' => optionTime()
					),
					array(
						'type' => 'switch',
						'name' => 'sonarrUnmonitored',
						'label' => 'Show Unmonitored',
						'value' => $GLOBALS['sonarrUnmonitored']
					)
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'sonarr\')"'
					),
				)
			)
		),
		array(
			'name' => 'Lidarr',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/lidarr.png',
			'category' => 'PMR',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageLidarrEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageLidarrEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageLidarrAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageLidarrAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'lidarrURL',
						'label' => 'URL',
						'value' => $GLOBALS['lidarrURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'lidarrToken',
						'label' => 'Token',
						'value' => $GLOBALS['lidarrToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'number',
						'name' => 'calendarStart',
						'label' => '# of Days Before',
						'value' => $GLOBALS['calendarStart'],
						'placeholder' => ''
					),
					array(
						'type' => 'number',
						'name' => 'calendarEnd',
						'label' => '# of Days After',
						'value' => $GLOBALS['calendarEnd'],
						'placeholder' => ''
					),
					array(
						'type' => 'select',
						'name' => 'calendarFirstDay',
						'label' => 'Start Day',
						'value' => $GLOBALS['calendarFirstDay'],
						'options' => $day
					),
					array(
						'type' => 'select',
						'name' => 'calendarDefault',
						'label' => 'Default View',
						'value' => $GLOBALS['calendarDefault'],
						'options' => $calendarDefault
					),
					array(
						'type' => 'select',
						'name' => 'calendarTimeFormat',
						'label' => 'Time Format',
						'value' => $GLOBALS['calendarTimeFormat'],
						'options' => $timeFormat
					),
					array(
						'type' => 'select',
						'name' => 'calendarLimit',
						'label' => 'Items Per Day',
						'value' => $GLOBALS['calendarLimit'],
						'options' => $limit
					),
					array(
						'type' => 'select',
						'name' => 'calendarRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['calendarRefresh'],
						'options' => optionTime()
					),
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'lidarr\')"'
					),
				)
			)
		),
		array(
			'name' => 'Radarr',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/radarr.png',
			'category' => 'PVR',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageRadarrEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageRadarrEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageRadarrAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageRadarrAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'radarrURL',
						'label' => 'URL',
						'value' => $GLOBALS['radarrURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'radarrToken',
						'label' => 'Token',
						'value' => $GLOBALS['radarrToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'number',
						'name' => 'calendarStart',
						'label' => '# of Days Before',
						'value' => $GLOBALS['calendarStart'],
						'placeholder' => ''
					),
					array(
						'type' => 'number',
						'name' => 'calendarEnd',
						'label' => '# of Days After',
						'value' => $GLOBALS['calendarEnd'],
						'placeholder' => ''
					),
					array(
						'type' => 'select',
						'name' => 'calendarFirstDay',
						'label' => 'Start Day',
						'value' => $GLOBALS['calendarFirstDay'],
						'options' => $day
					),
					array(
						'type' => 'select',
						'name' => 'calendarDefault',
						'label' => 'Default View',
						'value' => $GLOBALS['calendarDefault'],
						'options' => $calendarDefault
					),
					array(
						'type' => 'select',
						'name' => 'calendarTimeFormat',
						'label' => 'Time Format',
						'value' => $GLOBALS['calendarTimeFormat'],
						'options' => $timeFormat
					),
					array(
						'type' => 'select',
						'name' => 'calendarLimit',
						'label' => 'Items Per Day',
						'value' => $GLOBALS['calendarLimit'],
						'options' => $limit
					),
					array(
						'type' => 'select',
						'name' => 'calendarRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['calendarRefresh'],
						'options' => optionTime()
					)
				),
				'Test Connection' => array(
					array(
						'type' => 'blank',
						'label' => 'Please Save before Testing'
					),
					array(
						'type' => 'button',
						'label' => '',
						'icon' => 'fa fa-flask',
						'class' => 'pull-right',
						'text' => 'Test Connection',
						'attr' => 'onclick="testAPIConnection(\'radarr\')"'
					),
				)
			)
		),
		array(
			'name' => 'CouchPotato',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/couchpotato.png',
			'category' => 'PVR',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageCouchpotatoEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageCouchpotatoEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageCouchpotatoAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageCouchpotatoAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'couchpotatoURL',
						'label' => 'URL',
						'value' => $GLOBALS['couchpotatoURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'couchpotatoToken',
						'label' => 'Token',
						'value' => $GLOBALS['couchpotatoToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'select',
						'name' => 'calendarFirstDay',
						'label' => 'Start Day',
						'value' => $GLOBALS['calendarFirstDay'],
						'options' => $day
					),
					array(
						'type' => 'select',
						'name' => 'calendarDefault',
						'label' => 'Default View',
						'value' => $GLOBALS['calendarDefault'],
						'options' => $calendarDefault
					),
					array(
						'type' => 'select',
						'name' => 'calendarTimeFormat',
						'label' => 'Time Format',
						'value' => $GLOBALS['calendarTimeFormat'],
						'options' => $timeFormat
					),
					array(
						'type' => 'select',
						'name' => 'calendarLimit',
						'label' => 'Items Per Day',
						'value' => $GLOBALS['calendarLimit'],
						'options' => $limit
					),
					array(
						'type' => 'select',
						'name' => 'calendarRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['calendarRefresh'],
						'options' => optionTime()
					)
				)
			)
		),
		array(
			'name' => 'SickRage',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/sickrage.png',
			'category' => 'PVR',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageSickrageEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageSickrageEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageSickrageAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageSickrageAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'sickrageURL',
						'label' => 'URL',
						'value' => $GLOBALS['sickrageURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'sickrageToken',
						'label' => 'Token',
						'value' => $GLOBALS['sickrageToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'select',
						'name' => 'calendarFirstDay',
						'label' => 'Start Day',
						'value' => $GLOBALS['calendarFirstDay'],
						'options' => $day
					),
					array(
						'type' => 'select',
						'name' => 'calendarDefault',
						'label' => 'Default View',
						'value' => $GLOBALS['calendarDefault'],
						'options' => $calendarDefault
					),
					array(
						'type' => 'select',
						'name' => 'calendarTimeFormat',
						'label' => 'Time Format',
						'value' => $GLOBALS['calendarTimeFormat'],
						'options' => $timeFormat
					),
					array(
						'type' => 'select',
						'name' => 'calendarLimit',
						'label' => 'Items Per Day',
						'value' => $GLOBALS['calendarLimit'],
						'options' => $limit
					),
					array(
						'type' => 'select',
						'name' => 'calendarRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['calendarRefresh'],
						'options' => optionTime()
					)
				)
			)
		),
		array(
			'name' => 'Ombi',
			'enabled' => (strpos('personal', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/ombi.png',
			'category' => 'Requests',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepageOmbiEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepageOmbiEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepageOmbiAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepageOmbiAuth'],
						'options' => $groups
					)
				),
				'Connection' => array(
					array(
						'type' => 'input',
						'name' => 'ombiURL',
						'label' => 'URL',
						'value' => $GLOBALS['ombiURL'],
						'placeholder' => 'http(s)://hostname:port'
					),
					array(
						'type' => 'password-alt',
						'name' => 'ombiToken',
						'label' => 'Token',
						'value' => $GLOBALS['ombiToken']
					)
				),
				'Misc Options' => array(
					array(
						'type' => 'select',
						'name' => 'homepageOmbiRequestAuth',
						'label' => 'Minimum Group to Request',
						'value' => $GLOBALS['homepageOmbiRequestAuth'],
						'options' => $groups
					),
					array(
						'type' => 'switch',
						'name' => 'ombiLimitUser',
						'label' => 'Limit to User',
						'value' => $GLOBALS['ombiLimitUser']
					),
					array(
						'type' => 'select',
						'name' => 'ombiRefresh',
						'label' => 'Refresh Seconds',
						'value' => $GLOBALS['ombiRefresh'],
						'options' => optionTime()
					)
				)
			)
		),
		array(
			'name' => 'CustomHTML-1',
			'enabled' => (strpos('personal,business', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/custom1.png',
			'category' => 'Custom',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagCustomHTMLoneEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagCustomHTMLoneEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepagCustomHTMLoneAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepagCustomHTMLoneAuth'],
						'options' => $groups
					)
				),
				'Code' => array(
					array(
						'type' => 'textbox',
						'name' => 'customHTMLone',
						'class' => 'hidden customHTMLoneTextarea',
						'label' => '',
						'value' => $GLOBALS['customHTMLone'],
					),
					array(
						'type' => 'html',
						'override' => 12,
						'label' => 'Custom HTML/JavaScript',
						'html' => '<button type="button" class="hidden savecustomHTMLoneTextarea btn btn-info btn-circle pull-right m-r-5 m-l-10"><i class="fa fa-save"></i> </button><div id="customHTMLoneEditor" style="height:300px">' . htmlentities($GLOBALS['customHTMLone']) . '</div>'
					),
				)
			)
		),
		array(
			'name' => 'CustomHTML-2',
			'enabled' => (strpos('personal,business', $GLOBALS['license']) !== false) ? true : false,
			'image' => 'plugins/images/tabs/custom2.png',
			'category' => 'Custom',
			'settings' => array(
				'Enable' => array(
					array(
						'type' => 'switch',
						'name' => 'homepagCustomHTMLtwoEnabled',
						'label' => 'Enable',
						'value' => $GLOBALS['homepagCustomHTMLtwoEnabled']
					),
					array(
						'type' => 'select',
						'name' => 'homepagCustomHTMLtwoAuth',
						'label' => 'Minimum Authentication',
						'value' => $GLOBALS['homepagCustomHTMLtwoAuth'],
						'options' => $groups
					)
				),
				'Code' => array(
					array(
						'type' => 'textbox',
						'name' => 'customHTMLtwo',
						'class' => 'hidden customHTMLtwoTextarea',
						'label' => '',
						'value' => $GLOBALS['customHTMLtwo'],
					),
					array(
						'type' => 'html',
						'override' => 12,
						'label' => 'Custom HTML/JavaScript',
						'html' => '<button type="button" class="hidden savecustomHTMLtwoTextarea btn btn-info btn-circle pull-right m-r-5 m-l-10"><i class="fa fa-save"></i> </button><div id="customHTMLtwoEditor" style="height:300px">' . htmlentities($GLOBALS['customHTMLtwo']) . '</div>'
					),
				)
			)
		)
	);
}

function buildHomepageSettings()
{
	$homepageOrder = homepageOrder();
	$homepageList = '<h4>Drag Homepage Items to Order Them</h4><div id="homepage-items-sort" class="external-events">';
	$inputList = '<form id="homepage-values" class="row">';
	foreach ($homepageOrder as $key => $val) {
		switch ($key) {
			case 'homepageOrdercustomhtml':
				$class = 'bg-info';
				$image = 'plugins/images/tabs/custom1.png';
				if (!$GLOBALS['homepagCustomHTMLoneEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrdercustomhtmlTwo':
				$class = 'bg-info';
				$image = 'plugins/images/tabs/custom2.png';
				if (!$GLOBALS['homepagCustomHTMLtwoEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrdertransmission':
				$class = 'bg-transmission';
				$image = 'plugins/images/tabs/transmission.png';
				if (!$GLOBALS['homepageTransmissionEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrdernzbget':
				$class = 'bg-nzbget';
				$image = 'plugins/images/tabs/nzbget.png';
				if (!$GLOBALS['homepageNzbgetEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrdersabnzbd':
				$class = 'bg-sab';
				$image = 'plugins/images/tabs/sabnzbd.png';
				if (!$GLOBALS['homepageSabnzbdEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderdeluge':
				$class = 'bg-deluge';
				$image = 'plugins/images/tabs/deluge.png';
				if (!$GLOBALS['homepageDelugeEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderqBittorrent':
				$class = 'bg-qbit';
				$image = 'plugins/images/tabs/qBittorrent.png';
				if (!$GLOBALS['homepageqBittorrentEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderplexnowplaying':
			case 'homepageOrderplexrecent':
			case 'homepageOrderplexplaylist':
				$class = 'bg-plex';
				$image = 'plugins/images/tabs/plex.png';
				if (!$GLOBALS['homepagePlexEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderembynowplaying':
			case 'homepageOrderembyrecent':
				$class = 'bg-emby';
				$image = 'plugins/images/tabs/emby.png';
				if (!$GLOBALS['homepageEmbyEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrderombi':
				$class = 'bg-inverse';
				$image = 'plugins/images/tabs/ombi.png';
				if (!$GLOBALS['homepageOmbiEnabled']) {
					$class .= ' faded';
				}
				break;
			case 'homepageOrdercalendar':
				$class = 'bg-primary';
				$image = 'plugins/images/tabs/calendar.png';
				if (!$GLOBALS['homepageSonarrEnabled'] && !$GLOBALS['homepageRadarrEnabled'] && !$GLOBALS['homepageSickrageEnabled'] && !$GLOBALS['homepageCouchpotatoEnabled']) {
					$class .= ' faded';
				}
				break;
			default:
				$class = 'blue-bg';
				$image = '';
				break;
		}
		$homepageList .= '
		<div class="col-md-3 col-xs-12 sort-homepage m-t-10 hvr-grow">
			<div class="homepage-drag fc-event ' . $class . ' lazyload"  data-src="' . $image . '">
				<span class="ordinal-position text-uppercase badge bg-org homepage-number" data-link="' . $key . '" style="float:left;width: 30px;">' . $val . '</span>
				<span class="homepage-text">&nbsp; ' . strtoupper(substr($key, 13)) . '</span>

			</div>
		</div>
		';
		$inputList .= '<input type="hidden" name="' . $key . '">';
	}
	$homepageList .= '</div>';
	$inputList .= '</form>';
	return $homepageList . $inputList;
}