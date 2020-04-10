<div class="weather-wrapper">
	<?php if( isset($weather->data['current'])) { ?>
		<div class="temperatures">
			<div class="current-temperature">
				<span><?php echo $weather->data['current']['temp']; ?><sup>&deg;</sup></span>
				<i class="<?php echo $weather->data['current']['icon']; ?>"></i>
			</div>

			<div class="mountains_temperature">
				<?php $mountain_report = get_resort_forecast( get_field( 'weather_resort_id', 'options' ) ); ?>
				<ul>
					<li><span class="mtn_single_temperature"><?php echo round( $mountain_report->tempTop ); ?><sup>&deg;</sup></span> <span class="mtn_single_temperature light">Mtn Bases</span></li>
					<li><span class="mtn_single_temperature"><?php echo round( $mountain_report->tempBottom ); ?><sup>&deg;</sup></span> <span class="mtn_single_temperature light">Mid-Mtns</span></li>
					<li><span class="mtn_single_temperature"><?php echo $mountain_report->windspeed; ?><sup>&deg;</sup></span> <span class="mtn_single_temperature light">Peaks</span></li>
				</ul>
			</div>
		</div>	
	<?php } ?>
	<?php if($weather->forecast_days != "hide") { ?>
		<h4>6-Day Forecast</h4>
		<div class="awesome-weather-forecast awe_days_<?php echo $weather->forecast_days ?> awecf">
			<div class="awesome-weather-wrapper">
				<?php foreach( $weather_forecast as $forecast ) { ?>
					<div class="awesome-weather-forecast-day">
						<div class="awesome-weather-forecast-day-abbr"><?php echo $forecast->day_of_week; ?></div>
						<div class="awesome-weather-forecast-day-temp"><?php echo $forecast->temp; ?><sup>&deg;</sup></div>
						<?php if($weather->show_icons) { ?><i class="<?php echo $forecast->icon; ?>"></i><?php } ?>	
					</div>
				<?php } ?>
			</div>
		</div>	
	<?php } ?>
</div>