<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
  <meta charset="utf-8">
  <meta name="x-apple-disable-message-reformatting">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
</head>

<body style="margin: 0; width: 100%; padding: 0; word-break: break-word; -webkit-font-smoothing: antialiased; font-family: ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif; background: rgb(91,33,182); background: linear-gradient(90deg, rgba(91,33,182,1) 0%, rgba(91,33,182,1) 35%, rgba(219,39,119,1) 100%);">
  <div role="article" aria-roledescription="email" aria-label="" lang="en">
    <div style="min-height: 36px;  text-align: center;">
      <a href="{{Request::root()}}"><img src="{{asset('img/nail.png')}}" alt="Nailspot Logo" style="width: 25%; max-width:25%; vertical-align: middle; line-height: 100%; border: 0; padding:1.2rem;"></a>
    </div>
      <div style="margin-left: auto; margin-right: auto; margin-top: 20px; margin-bottom: 20px; display: grid; width: 66.666667%; grid-template-columns: repeat(1, minmax(0, 1fr)); border-radius: 6px; background-color: #3730a3; padding: 20px; text-align: justify; color: #ffffff; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);">
        @yield('content')
      </div>
    <footer style="padding-top: 8px; padding-bottom: 6px; color: #e0e7ff;">
      <div style=" color:#ffffff;  margin-left: auto; margin-right: auto; display: grid; width: 83%; grid-template-columns: repeat(2, minmax(0, 1fr));">
        <div style="margin-left: 2px; padding-top: 20px;">
          <div style="margin-left: auto; margin-right: auto; margin-bottom: 6px;">
            <div style="text-align:center">
                <a href="{{asset('docs/Terminos_&_Condiciones_NAILSPOT.pdf')}}" target="blank" style="display: block; padding-bottom: 2px; font-size: 14px; font-weight: 600; color: #e0e7ff; text-decoration: none;">Terminos &amp; Condiciones</a>
            </div>
        </div>
        </div>
      </div>
      <hr style="width: 50%; background-color: #b2b6be; height: 1px; border:none">
      <div style="text-align: center;">
        <div style="padding-top: 0.25rem; padding-bottom: 0.25rem; font-size: 14px; font-weight: 600; color: #e0e7ff;">
          Copyright © 2021 Nailspot by
          <a href="https://www.digital-pineapple.com.mx/" class="hover-text-gray-900" style="color: #e0e7ff; text-decoration: none;">Digital Pineapple</a>.
      </div>
      </div>
    </footer>
  </div>
</body>
</html>
