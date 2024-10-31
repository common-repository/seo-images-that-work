<div class="wrap digitaldali">
	<?php if($data['update']): ?>
	<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
		<p><strong>Settings save</strong></p>
		<button type="button" class="notice-dismiss">
			<span class="screen-reader-text">Hide</span>
		</button>
	</div>
	<?php endif; ?>
	<h2>SEO Images that work settings</h2>
	
	<h2 class="title">Choose template for alt and description img properties:</h2>
	<form method="post" class="form">
		<p class="form-section">
			<label>
				<input type="radio" name = "seo-image-type" value = "1" <?=( get_option( 'digitaldali__seo_images_type' ) == 1 )?'checked':'' ?> >
				<code>
					<span>{title}</span> - image <span>{image_title}</span> on <span>{site}</span>
				</code>
			</label>
		</p>
		<p class="form-section">
			<label>
				<input type="radio" name = "seo-image-type" value = "3" <?=( get_option( 'digitaldali__seo_images_type' ) == 3 )?'checked':'' ?> >
				<code>
					Image <span>{image_title}</span>
				</code>
			</label>
		</p>
		<p>Where:</p>
		<ul>
			<li><code><span class="tags">{title}</span></code> - Website title</li>
			<li><code><span class="tags">{image_title}</span></code> - Image filename</li>
			<li><code><span class="tags">{site}</span></code> - Website URL address</li>
		</ul>
		<div class="form-section">
			<button class="button button-primary">Save</button>
		</div>
		<?php wp_nonce_field('digitaldali-update-options'); ?>
	</form>
	<p style="margin-top: 50px;">Made as a 20% time project in <a href="http://digitaldali.pro?ref=seoimages" target="_blank">Digital Dali</a></p>
</div>