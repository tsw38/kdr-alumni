<?php
	/* Template Name: Homepage Template */
	get_header();
	$fields = get_fields();

	$featuredEvent 	= $fields['featured_event'];
	$news 			= $fields['beta_chapter_news'];
	$acknowledge 	= $fields['acknowledgements'];

	$eventData = getEventData($featuredEvent->ID);
	$calendar  = getAllEvents();

	$recentPosts = wp_get_recent_posts([
		'numberposts' => 10
	]);

	// remove all posts that are pages and that have the acknowledgement category
	function isPostType($post) {
		return get_the_category($post['ID'])[0]->slug !== 'acknowledgement' && $post['post_type'] == "post";		
	}

	$recentPosts = array_filter($recentPosts, "isPostType");

?>
	<div class="Hero">
		<div class="Countdown" style="background-image:url(<?php echo($eventData->image->url); ?>);">
			<div class="textContainer">
				<h2>Beta Chapter</h2>
				<h1>Kappa Delta Rho Alumni</h1>
				<div class="Divider"></div>
				<div class="description">
					<?php echo($eventData->description); ?>
				</div>
				<div class="timer hidden">
					<div id="days" class="digitWrapper">
						<span class="number">00</span>
						<span class="time">Days</span>
					</div>
					<div id="hours" class="digitWrapper">
						<span class="number">00</span>
						<span class="time">Hours</span>
					</div>
					<div id="minutes" class="digitWrapper">
						<span class="number">00</span>
						<span class="time">Minutes</span>
					</div>
					<div id="seconds" class="digitWrapper">
						<span class="number">00</span>
						<span class="time">Seconds</span>
					</div>
					<script>
						function updateCountdown() {
							setTimeout(() =>{
								var interval;

								interval = setInterval(() => {
									const event = moment('<?php echo($eventData->start_date); ?>');
									const now = moment();
									const diff = event.diff(now);

									if (diff <= 0) {
										clearInterval(interval);
									}

									const days    = moment.duration(diff).days();
									const hours   = moment.duration(diff).hours();
									const minutes = moment.duration(diff).minutes();
									const seconds = moment.duration(diff).seconds();

									document.querySelector('#days .number').innerHTML = days;
									document.querySelector('#hours .number').innerHTML = hours;
									document.querySelector('#minutes .number').innerHTML = minutes;
									document.querySelector('#seconds .number').innerHTML = seconds;

									if (Array.from(document.querySelector('.timer').classList).indexOf('hidden') >= 0) {
										document.querySelector('.timer').classList.remove('hidden');
									}

								}, 1000);
							}, 0);
						}

						updateCountdown();
					</script>
				</div>
			</div>
		</div>
		<div class="EventsAndNews">
			<div class="Events News">
				<h4>Stay Up To Date</h4>
				<h3>Beta Chapter News</h3>
				<div class="Divider"></div>
				<ul>
					<?php foreach($news as $article): ?>
						<li><a href="<?php echo($article->guid); ?>"><?php echo($article->post_title); ?></a></li>
					<?php endforeach; ?>
				</ul>
				
			</div>
			<div class="Events Acknowledgements">
				<h4>Acknowledgements</h4>
				<h3>Giving Back to the Chapter</h3>
				<div class="Divider"></div>
				<ul>
					<?php foreach($acknowledge as $article): ?>
						<li><a href="<?php echo($article->guid); ?>"><?php echo($article->post_title); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="Events Calendar">
				<div class="container">
					<h3>Calendar</h3>
					<div class="Divider"></div>
					<ul>
						<?php
							$numOfEvents = sizeof($calendar->events);

							for($index = 0; $index < 4; $index++){ 
								$event = $calendar->events[$index];

								if ($index >= $numOfEvents) break;
						?>	
							<li>
								<a href="<?php echo($event->url); ?>">
									<?php echo(date("m/d/Y",strtotime($event->start_date)) . '&nbsp;&nbsp;&mdash;&nbsp;&nbsp;' . $event->title); ?>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
				<div class="viewMore">
					<a href="/events">View More &gt;</a>
				</div>
			</div>
		</div>
	</div>
	<div class="Body">
		<div class="content">
			<?php
				foreach($recentPosts as $post):
					generateArticle($post);
				endforeach;
			?>
		</div>
		<?php get_sidebar(); ?>
	</div>

<?php
get_footer();
