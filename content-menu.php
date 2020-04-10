<div class="super_nav">
	<ul>
		<li class="nav_where_to_stay">
			<a href="/lodging">Where to stay</a>
			<ul class="sub_menu wts">
				<li class="by_lodge">
					<div class="lodge_title">
						<h3>By Lodging type</h3>
					</div>
					<ul>
						<?php if(have_rows('view_by_lodging', 'options')) : ?>
							<?php while(have_rows('view_by_lodging', 'options')) : the_row(); ?>
								<li><a href="<?php the_sub_field('category_link', 'options'); ?>"><?php the_sub_field('category_title', 'options'); ?></a></li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
					<div class="nav_see_all">
						<a href="<?php the_field('wts_see_all_link', 'options'); ?>">See all</a>
					</div>
				</li>
				<li class="by_town">
					<div class="town_title">
						<h3>By Town</h3>
					</div>
					<ul>
						<?php if(have_rows('view_by_town_left', 'options')) : ?>
							<?php while(have_rows('view_by_town_left', 'options')) : the_row(); ?>
								<li><a href="<?php the_sub_field('town_link', 'options'); ?>"><?php the_sub_field('town_title', 'options'); ?></a></li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
					<ul>
						<?php if(have_rows('view_by_town_right', 'options')) : ?>
							<?php while(have_rows('view_by_town_right', 'options')) : the_row(); ?>
								<li><a href="<?php the_sub_field('town_link', 'options'); ?>"><?php the_sub_field('town_title', 'options'); ?></a></li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</li>
			</ul>
		</li>
		<li class="nav_things_to_do">
			<a href="/things">things to do</a>
			<ul class="sub_menu ttd">
				<li class="ttd_left">
					<ul>
						<?php if(have_rows('things_to_do_left', 'options')) : ?>
							<?php while(have_rows('things_to_do_left', 'options')) : the_row(); ?>
								<li><a href="<?php the_sub_field('activity_link', 'options'); ?>"><?php the_sub_field('activity_title', 'options'); ?></a></li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</li>
				<li class="ttd_right">
					<ul>
						<?php if(have_rows('things_to_do_right', 'options')) : ?>
							<?php while(have_rows('things_to_do_right', 'options')) : the_row(); ?>
								<li><a href="<?php the_sub_field('activity_link', 'options'); ?>"><?php the_sub_field('activity_title', 'options'); ?></a></li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
					<div class="nav_see_all">
						<a href="<?php the_field('ttd_see_all_link', 'options'); ?>">See all</a>
					</div>
				</li>
			</ul>
		</li>
		<li class="nav_deals">
			<a href="/deals">deals</a>
			<ul class="sub_menu deals_nav">
				<li>
					<ul>
						<?php if(have_rows('deals', 'options')) : ?>
							<?php while(have_rows('deals', 'options')) : the_row(); ?>
								<li><a href="<?php the_sub_field('deal_link', 'options'); ?>"><?php the_sub_field('deal_title', 'options'); ?></a></li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</li>
			</ul>
		</li>
		<li class="nav_chat">
			<a href="<?php the_field('chat_link', 'options'); ?>" target="_blank" id="header-chat-link">chat</a>
		</li>
		<li class="slide_menu">
			<a href="#">menu</a>
		</li>
	</ul>
</div>