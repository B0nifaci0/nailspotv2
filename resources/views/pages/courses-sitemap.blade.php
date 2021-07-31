<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($courses as $course)
        <url>
            <loc>{{Request::root().'/curso/'.$course->slug }}</loc>
            <priority>0.8</priority>
            <lastmod>{{$course->updated_at}}</lastmod>
        </url>
    @endforeach
</urlset>