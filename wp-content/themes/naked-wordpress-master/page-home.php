<?php 
/**
 * 	Template Name: Home Page
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it 

$args = [
	'post_type' => 'people'
];

$args2 = [
	'post_type' => 'cats'
];

$people = New wp_query($args);
$cats = New wp_query($args2);

?>
	<div class="bg-white">
  <div class="relative isolate px-6 pt-14 lg:px-8">
    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
      <div class="hidden sm:mb-8 sm:flex sm:justify-center">
        <div class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
          Announcing our next round of funding. <a href="#" class="font-semibold text-indigo-600"><span class="absolute inset-0" aria-hidden="true"></span>Read more <span aria-hidden="true">&rarr;</span></a>
        </div>
      </div>
      <div class="text-center">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Data to enrich your online business</h1>
        <p class="mt-6 text-lg leading-8 text-gray-600">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
          <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
          <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>
        </div>
      </div>
    </div>
    <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
      <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
  </div>

  <div class="bg-white py-10 sm:py-32">
    <div class="mx-auto grid max-w-7xl gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-3">
    <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">

		<?php if ( $people->have_posts() ) : ?>
			<?php while ( $people->have_posts() ) : $people->the_post(); ?>
				<li>
					<a href="<?php echo esc_url(get_permalink()); ?>">
						<div class="flex items-center gap-x-6">
						<?php the_post_thumbnail ( 'medium', array ('class' => 'h-16 w-16 rounded-full')); ?>
						<div>
							
								<h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">
										<?php echo get_the_title(); ?>
									</h3>
									<p class="text-sm font-semibold leading-6 text-indigo-600"><?php echo get_the_content() ?></p>
								</div>
							</div>
					</a>
				</li>

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>
		<?php else : ?>
			<article class="post error">
				<h1 class="404">Nothing posted yet</h1>
			</article>
		<?php endif; ?>
      <!-- More people... -->
    </ul>
    </div>
  </div>

  <div class="bg-white py-10 sm:py-32">
    <div class="mx-auto grid max-w-7xl gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-3">
    <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">

		<?php if ( $cats->have_posts() ) : ?>
			<?php while ( $cats->have_posts() ) : $cats->the_post(); ?>
				<li>
					<a href="<?php echo esc_url(get_permalink()); ?>">
							
								<h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">
										<?php echo get_the_title(); ?>
									</h3>
									<p class="text-sm font-semibold leading-6 text-indigo-600"><?php echo get_the_content() ?></p>
								</div>
							</div>
					</a>
				</li>

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>
		<?php else : ?>
			<article class="post error">
				<h1 class="404">Nothing posted yet</h1>
			</article>
		<?php endif; ?>
      <!-- More people... -->
    </ul>
    </div>
  </div>

  <?php echo do_shortcode('[cta]'); ?>
    
  <h1 class="text-4xl">List of Todos</h1>
  <?php echo do_shortcode('[display_todos]'); ?>

  <div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-32 lg:px-8">
    <div class="relative isolate overflow-hidden bg-gray-900 px-6 pt-16 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
      <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0" aria-hidden="true">
        <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
        <defs>
          <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
            <stop stop-color="#7775D6" />
            <stop offset="1" stop-color="#E935C1" />
          </radialGradient>
        </defs>
      </svg>
      <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Boost your productivity.<br>Start using our app today.</h2>
        <p class="mt-6 text-lg leading-8 text-gray-300">Ac euismod vel sit maecenas id pellentesque eu sed consectetur. Malesuada adipiscing sagittis vel nulla.</p>
        <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
          <a href="#" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get started</a>
          <a href="#" class="text-sm font-semibold leading-6 text-white">Learn more <span aria-hidden="true">→</span></a>
        </div>
      </div>
      <div class="relative mt-16 h-80 lg:mt-8">
        <img class="absolute left-0 top-0 w-[57rem] max-w-none rounded-md bg-white/5 ring-1 ring-white/10" src="https://tailwindui.com/img/component-images/dark-project-app-screenshot.png" alt="App screenshot" width="1824" height="1080">
      </div>
    </div>
  </div>
</div>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>