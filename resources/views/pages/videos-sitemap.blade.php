<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    @foreach ($courses as $course)
    <url>
        <loc>{{Request::root().'/cursos/'.$course->slug}}</loc>
        <video:video>
            <video:title>{{$course->name}}</video:title>
            <video:description>{{strip_tags($course->description)}}</video:description>
            <video:thumbnail_loc>{{$course->getVideoThumbnail()}}</video:thumbnail_loc>
            <video:player_loc allow_embed="yes">{{$course->url}}</video:player_loc>
            <video:publication_date>{{$course->created_at}}</video:publication_date>
        </video:video>
    </url>
    @endforeach

</urlset>