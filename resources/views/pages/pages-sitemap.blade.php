<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
	<url>
		<loc>{{Request::root()}}</loc>
		<image:image>
			<image:loc>{{asset('img/foto_renato.jpg')}}/img/foto_renato.jpg</image:loc>
		</image:image>
		<image:image>
			<image:loc>{{asset('img/foto_yohana.jpg')}}</image:loc>
		</image:image>
		<image:image>
			<image:loc>{{asset('img/foto_aron.jpg')}}</image:loc>
		</image:image>
	</url>
    <url>
        <loc>{{Request::root()}}/cursos</loc>
        <image:image>
			<image:loc>{{asset('img/slider-renato.png')}}</image:loc>
		</image:image>
    </url>
    <url>
        <loc>{{Request::root()}}/competencias</loc>
        <image:image>
			<image:loc>{{ asset('img/slider-renato.png') }}</image:loc>
		</image:image>
        <image:image>
			<image:loc>{{ asset('img/slider-yohana.jpg') }}</image:loc>
		</image:image>
        <image:image>
			<image:loc>{{ asset('img/slider-aron.png') }}</image:loc>
		</image:image>
    </url>
	<url>
		<loc>{{Request::root()}}/nosotros</loc>
		<image:image>
			<image:loc>{{ asset('img/todos.jpg') }}</image:loc>
		</image:image>
	</url>
	<url>
		<loc>{{Request::root()}}/contacto</loc>
	</url>
</urlset>
