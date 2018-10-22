<!--single product list start-->
<div data-order="{DATA_ROW}" class="product-list-desc">
	<div class="col-sm-4 col-md-4">
		<div class="single-product">
			<div class="product-img">
				<a class="b-s-p-img" href="javascript:void(0)">
					<img class="primary-img" src="{DATA_IMG_PRIMARY}" alt="" width="{DATA_IMG_WIDTH}" height="{DATA_IMG_HEIGHT}">
					<img class="hover-img" src="{DATA_IMG_HOVER}" alt="" width="{DATA_IMG_WIDTH}" height="{DATA_IMG_HEIGHT}">
				</a>
			</div>
		</div>    
	</div>
	<div class="col-sm-4 col-md-8">
		<div class="product-content">
			<h2 class="product-name"><a href="#">{DATA_TITULO}</a></h2>
			<div class="pro-rating">
				{DATA_VALORIZACION}
			</div>
			<div class="price-box">
				<span class="new-price">{DATA_PRECIO}</span>
			</div>
			<!-- <div>
				hola mundo
			</div> -->
			<div class="product-desc">
				<p>{DATA_DESCRIPCION}</p>
			</div>
			<div class="p-actions">
				<div class="action-buttons">
					<div class="add-to-cart">
						<a href="{DATA_URL}"><i class="fa fa-eye"></i>&nbsp;Ver Detalles</a>
					</div>
					<div class="add-to-links">
						<div class="add-to-wishlist">
							<a data-fav="{DATA_FAV}" data-fav-action="{DATA_FAV_ACTION}" data-toggle="tooltip" data-original-title="Agregar a Favoritos" href="#" title="Agregar a favoritos" class="add-fav">
								<i class="fa fa-star"></i>
							</a>
							<a title="Vista R&aacute;pida" data-toggle="tooltip" href="#" data-original-title="Vista R&aacute;pida"><i class="fa fa-search-plus"></i></a>
						</div>
					</div>
				</div>
			</div>										
		</div>
	</div>   
</div>
<!--single product list end-->