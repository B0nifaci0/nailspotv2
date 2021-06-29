<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    <url>
        <loc>https://nailspot.com.mx/</loc>
    </url>
    <url>
        <loc>https://nailspot.com.mx/cursos</loc>
    </url>
    <url>
        <loc>https://nailspot.com.mx/competencias</loc>
    </url>
    <url>
        <loc>https://nailspot.com.mx/nosotros</loc>
    </url>
    <url>
        <loc>https://nailspot.com.mx/contacto</loc>
    </url>
    @foreach($courses as $course)
        <url>
            <loc>https://nailspot.com.mx/curso/{{ $course->slug }}</loc>
            @if ($course->seo)
            <video:video>
                <video:title>{{$course->seo->title}}</video:title>
                <video:description>{{$course->seo->description}}</video:description>
                <video:thumbnail_loc>{{$course->seo->video_thumbnail}}</video:thumbnail_loc>
                <video:player_loc>{{$course->iframe}}</video:player_loc>
            </video:video>
            @endif
        </url>
    @endforeach
</urlset>