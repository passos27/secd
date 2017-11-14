
<section class="row container" style="margin-top: 100px;">
	<div class="col s12 m3">
		<div class="card white" style="padding: 2% 4%;">
			<h5>Filtrar detalhes <i class="material-icons right">filter_list</i></h5>
			<?php echo do_shortcode( '[searchandfilter fields="search,category,post_tag" types=",checkbox,checkbox" hierarchical=",1" headings="" submit_label="Filtrar dados" class="form-busca" headings=",Categoria,Professores"]' ); ?>

		</div>
	</div>


	<!-- coluna 02 -->
	<div class="col s12 m7">
		<div class="row">
			<div class="col s12">
				

				<?php 
				if ( have_posts() ) {
					// query_posts('showposts=100&post_type=palestra');
					while ( have_posts() ) {
						the_post(); 
						?>
						<div class="col s12 m6">
							<div class="card">
								<div class="card-image waves-effect waves-block waves-light">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="card-content">
									<div class="chip grey lighten-2"><?php the_category(','); ?></div>
									<h5 class="card-title grey-text text-darken-4"><?php the_title(); ?></h5>
									<p><!-- <a href="#">This is a link</a> --></p>
								</div>
								<div class="card-action">
									<div class="chip"><?php the_tags(' '); ?></div>
								</div>
							</div>

					    </div>



						<?php
						} // end while
					} // end if
					?>







</div>
</div>

</div>
<!-- coluna 02 -->

</section>

