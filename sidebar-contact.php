<aside class="sidebar">
	<?php if( have_rows('contacts') ): ?>
		<div class="contacts">
	    <?php while ( have_rows('contacts') ) : the_row(); ?>
			<div class="contact">
				<h3><?php the_sub_field('contact_title'); ?></h3>
				<?php if(get_sub_field('address')) : ?>
					<p class="address"><?php the_sub_field('address'); ?></p>
				<?php endif; ?>
				<?php if(get_sub_field('phone_number')) : ?>
					<a class="phone_number" href="tel:<?php the_sub_field('phone_number'); ?>"><?php the_sub_field('phone_number'); ?></a>
				<?php endif; ?>
				<?php if(get_sub_field('phone_number_two')) : ?>
					<a class="phone_number" href="tel:<?php the_sub_field('phone_number_two'); ?>"><?php the_sub_field('phone_number_two'); ?></a>
				<?php endif; ?>
				<?php if(get_sub_field('fax_number')) : ?>
					<p class="fax_number"><?php the_sub_field('fax_number'); ?></p>
				<?php endif; ?>
				<?php if(get_sub_field('email_address')) : ?>
					<a class="email_address" href="mailto:<?php the_sub_field('email_address'); ?>"><?php the_sub_field('email_address'); ?></a>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>
</aside>